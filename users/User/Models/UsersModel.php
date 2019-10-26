<?php namespace Users\User\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
        protected $table      = 'users';
        protected $primaryKey = 'id';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationMessages = [];
        protected $skipValidation     = false;

        protected $allowedFields = ['first_name', 'last_name', 'email', 'password'];
        protected $validationRules = [
                'first_name' => 'required|min_length[3]|max_length[255]',
                'last_name' => 'required|min_length[3]|max_length[255]',
                'email' => 'required|valid_email|max_length[255]',
                'password' => 'required|min_length[3]|max_length[255]',
        ];

        public function getAllUsers()
        {
                return $this->findAll();
        }

        public function getUser($id)
        {
                return $this->find($id);
        }

        public function updateUser($id, $data)
        {
                $this->set($data);
                $this->where('id', $id);
                return $this->update();
        }

        public function deleteUser($id)
        {
                $this->where('id', $id);
                return $this->delete();
        }

        public function userLogin($data)
        {       
                $loginData = $this->where('email',trim($data['email']))
                                ->first();
                $result = [];
                $passwordVerify = password_verify(trim($data['password']),$loginData['password']);
                if(empty($loginData) || !$passwordVerify)
                {
                        $result['success'] = false;
                        $result['message'] = "Invalid Email or Password";
                        $result['data'] = [];
                }
                elseif($passwordVerify)
                {
                        $result['success'] = true;
                        $result['message'] = "You have Logged in Successfully";
                        $result['data'] = $loginData; 
                }
                return $result;
        }
}

?>