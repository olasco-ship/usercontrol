<?php
namespace App\Controllers;
use App\Models\AdminModel;

class Admins extends BaseController
{
	public function admin(){

		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			
			//let's try something
			$rules = ['username' => 'required|min_length[4]|max_length[255]',
					  'email' => 'required|min_length[4]|max_length[50]|valid_email|is_unique[user.email]',
					  'password' => 'required|min_length[4]|max_length[255]',
					  'confirm_password' => 'matches[password]',
		];
		if (!$this->validate($rules)) {

			// do something
			$data['validation'] = $this->validator;
		}else{

			$model = new AdminModel();
			// save data
			$model->save([
				        'username' => $this->request->getPost('username'),
						'email' => $this->request->getPost('email'),
						'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			]);
			$session = session();
			$session->setFlashdata('success', 'Successfully Registered');
			return redirect()->to('/');

		}
		}


		echo view('templates/header');
		echo view('admin');
		echo view('templates/footer');

	}

	public function login(){
	$data = [];
	helper(['form']);

	if ($this->request->getMethod() === 'post') {
			
			//let's try something
			$rules = [
					  'email' => 'required|min_length[4]|max_length[50]|valid_email',
					  'password' => 'required|min_length[8]|max_length[255]|validateUser[email, password]',

		];
		$errors = [
					'password'=> ['Email or Password don\'t match'
					]
		];
		if (!$this->validate($rules, $errors)) {

			// do something
			$data['validation'] = $this->validator;
		}else{

			$model = new AdminModel();
			$user = $model->where('email', $this->request->getPost('email'))
							->first();
			$this->setUserSession($user);
			return redirect()->to('/');

			

		}
		}

	echo view('templates/header');
	echo view('login');
	echo view('templates/footer');
}
	private function setUserSession(){

		$data = [

			'id'=> $user['id'],
			'username'=> $user['username'],
			'email'=> $user['email'],
			'isLoggedIn'=> true,
		];
		session()->set($data);
		return true;

	}
}