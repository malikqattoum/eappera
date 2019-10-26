<?php namespace Users\User\Controllers;
use Users\User\Models\UsersModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    protected $sessionMessage;
    use \CodeIgniter\API\ResponseTrait;
    public function __construct()
    {
        $this->sessionMessage = \Config\Services::session();
        helper(['form', 'url']);
    }
	public function index()
	{
        $model = new UsersModel();
        $allUsers = $model->getAllUsers();
		return view('Users\User\Views\users\viewUsers', ['allUsers'=>$allUsers]);
    }

    public function add()
    {
        $model = new UsersModel();
        if($this->request->getPost())
        {
            $password = $this->request->getVar('password');
            $data = [
                'first_name' => $this->request->getVar('first_name'),
                'last_name'  => $this->request->getVar('last_name'),
                'password'  => (!empty($password))?password_hash($password, PASSWORD_DEFAULT):'',
                'email'  => $this->request->getVar('email'),
            ];

            if ($model->save($data) === false)
            {
                echo view('Users\User\Views\users\addUser', ['validationErrors'=>$model->errors()]);
            }
            else
            {
                $this->sessionMessage->setFlashdata('addedUser', 'The user has been added successfully');
                return redirect()->to('/users');
            }
        }
        else
            return view('Users\User\Views\users\addUser');
        
    }

    public function edit($userId)
    {
        $model = new UsersModel();
        $userData = $model->getUser($userId);

        if($this->request->getPost())
        {
            $password = $this->request->getVar('password');
            $data = [
                'first_name' => $this->request->getVar('first_name'),
                'last_name'  => $this->request->getVar('last_name'),
                'password'  => (!empty($password))?password_hash($password, PASSWORD_DEFAULT):'',
                'email'  => $this->request->getVar('email'),
            ];
            if ($model->updateUser($userId, $data) === false)
            {
                echo view('Users\User\Views\users\editUser', ['validationErrors'=>$model->errors(), 'userData'=>$userData]);
            }
            else
            {
                $this->sessionMessage->setFlashdata('updatedUser', 'The user has been updated successfully');
                return redirect()->to('/users');
            }
        }
        else
            return view('Users\User\Views\users\editUser', ['userData'=>$userData]);
        
    }

    public function delete($userId)
    {
        $model = new UsersModel;
        if($model->deleteUser($userId))
            $this->sessionMessage->setFlashdata('deletedUser', 'The user has been deleted successfully');
        else
            $this->sessionMessage->setFlashdata('deleteError', 'An error appeared while deleting the user');
        
        return redirect()->to('/users');
    }

    public function login()
    {
        return view('Users\User\Views\auth\login');
    }

    // http://localhost:8080/users/api/login
    public function loginApi()
    {
        $model = new UsersModel;
        $data = $this->request->getPost();
        if($data)
        {
            if(! $this->validate([
                'email' => 'required|valid_email|max_length[255]',
                'password' => 'required|min_length[3]|max_length[255]',
            ]))
            {
                return $this->respond(['validation'=>$this->validator->getErrors(), 'csrfToken'=>csrf_hash()]);
            }
            else
            {
                $loginResult = $model->userLogin($data);
                if(!empty($loginResult['data']))
                {
                    $session = \Config\Services::session();
                    $session->set([
                                'user_id'=>$loginResult['data']['id'],
                                'email'=>$loginResult['data']['email'],
                                'first_name'=>$loginResult['data']['first_name'],
                                'last_name'=>$loginResult['data']['last_name']
                            ]);
                }
                return $this->respond(['result'=>$loginResult, 'csrfToken'=>csrf_hash()]);
            }
        }
        else
            return $this->respond();
    }

    public function logout()
    {
        \Config\Services::session()->destroy();
        return redirect()->to('/');
    }

}
