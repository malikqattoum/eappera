<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		helper(['form', 'url']);
		$session = \Config\Services::session();
		$model = new \Users\User\Models\UsersModel;
		$allUsers = $model->getAllUsers();
		return view('homeView', ['allUsers'=>$allUsers]);
	}

}
