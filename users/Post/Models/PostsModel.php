<?php namespace Users\Post\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
        protected $table      = 'posts';
        protected $primaryKey = 'id';

        protected $returnType = 'array';
        protected $useSoftDeletes = false;

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $validationMessages = [];
        protected $skipValidation     = false;

        protected $allowedFields = ['title', 'user_id', 'description', 'image'];
        protected $validationRules = [
                'title' => 'required|min_length[3]|max_length[100]',
                'description' => 'max_length[255]',
                'user_id'=>'required',
        ];

        public function getHomePosts($limit = 10, $offset = 0)
        {
            $results = $this->orderBy('id', 'desc')->findAll($limit, $offset);
            return $results;
        }
        
}

?>