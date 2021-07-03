<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
	public function index()
	{
		$model = new UsersModel();
		//checkLoggedIn();
		$data['user_data'] = $model->orderBy('id', 'DESC')->paginate(10);
		$data['pagination_link'] = $model->pager;
		helper(['form']);

		echo view("templates/header", $data);
		echo view("register");
		echo view("templates/footer");
	}


	public function register(){
			$data = [];
			helper(['form']);
		if ($this->request->getMethod() === 'post') {
			
			//let's try something
			$rules = ['firstname' => 'required|min_length[4]|max_length[20]',
					  'lastname' => 'required|min_length[4]|max_length[20]',
					  'email' => 'required|min_length[4]|max_length[50]|valid_email|is_unique[user.email]',
					  'role' => 'required|min_length[4]|max_length[20]',
					  'password' => 'required|min_length[4]|max_length[20]',
					  'confirm_password' => 'matches[password]',


		];
		if (!$this->validate($rules)) {

			// do something
			$data['validation'] = $this->validator;
		}else{

			$model = new UsersModel();

			$model->save([
				        'firstname' => $this->request->getPost('firstname'),
						'lastname' => $this->request->getPost('lastname'),
						'email' => $this->request->getPost('email'),
						'role' => $this->request->getPost('role'),
						'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
			]);
			$session = session();
			$session->setFlashdata('success', 'Successfully Registered');
			return redirect()->to('/ ');

		}
		}
		echo view("templates/header", $data);
		echo view("register");
		echo view("templates/footer");

		
}


		public function checkLoggedIn(){

			if (session('loggedin') == 'true') {

				return true;
			}


		}

			
public function edit(){
	$model = new UsersModel();
	$data = [];
		helper(['form']);
		if ($this->request->getMethod() == 'post') {
			$rules = ['firstname' => 'required|min_length[4]|max_length[20]',
					  'lastname' => 'required|min_length[4]|max_length[20]',
					  'role' => 'required|min_length[4]|max_length[20]',
						];

				if ($this->request->getPost('password') != '') {
					$rules['password'] = 'required|min_length[4]|max_length[20]';
					  $rules['confirm_password'] = 'matches[password]';
				}
		if (!$this->validate($rules)) {

			// do something
			$data['validation'] = $this->validator;
		}else{

			//$model = new UsersModel();
			$newData = [
						'id' => session()->get('id'),
						'firstname' => $this->request->getPost('firstname'),
						'lastname' => $this->request->getPost('lastname'),
						'role' => $this->request->getPost('role'),
					];
						if ($this->request->getPost('password') != '') {
						$newData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
				
			}
			$model->save($newData);	        
			$session->setFlashdata('success', 'Successfully Updated');
			return redirect()->to('Users/register ');

		}
		}
		//$model = new UsersModel();
		$data['user'] = $model->where('id', session()->get('id'))->first();
	echo view('templates/header', $data);
	echo view('edit');
	echo view('templates/footer');

}
}





