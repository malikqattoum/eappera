<?php namespace Users\Post\Controllers;
use Users\Post\Models\PostsModel;
use CodeIgniter\Controller;

class Posts extends Controller
{
    use \CodeIgniter\API\ResponseTrait;
    public function __construct()
    {
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
        $model = new PostsModel();
        if($this->request->getPost())
        {
            $data = [
                'title' => $this->request->getVar('title'),
                'description'  => $this->request->getVar('description'),
                'user_id'  => $this->request->getVar('user_id'),
            ];
            $file = $this->request->getFile('image');
            if(!empty($file) && $file->getError() != 4)
            {
                if (! $file->isValid())
                {
                    
                    return $this->respond(['validation'=>$file->getErrorString().'('.$file->getError().')', 'csrfToken'=>csrf_hash()]);
                }
                
                $newName = $file->getRandomName();
                $path = ROOTPATH.'public\uploads';
                $file->move($path, $newName);
                $data['image'] = $newName;
            }
            
            if ($model->save($data) === false)
            {
                return $this->respond(['validation'=>$model->errors(), 'csrfToken'=>csrf_hash()]);
            }
            else
            {
                return $this->respond(['post'=>
                        [   
                            'success'=>true,
                            'message'=>'New post has been added successfully',
                            'data'=>$data,
                        ], 
                        'csrfToken'=>csrf_hash()
                    ]);
            }
        }
        else
            return $this->respond([]);
        
    }

    public function getHomePosts()
    {
        $postsModel = new PostsModel;
        $posts = [];
        $data = $this->request->getGet();
        $path = base_url().'/uploads/';
        if($data)
        {
            $posts = $postsModel->getHomePosts($data['limit'], $data['offset']);
            return $this->respond(['result'=>$posts, 'imagePath'=>$path]);
        }
        else
            return $this->respond([]);
    }

    

}
