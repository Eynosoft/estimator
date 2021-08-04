<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UsersModel;

class Users extends BaseController
{
	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];

		$userModel = new usersModel();
		$context['user'] = $userModel->orderBy('id', 'DESC')->findAll();
		return view('users_list', $context);

	}

	public function create($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'uername' => user()->username,
		];
		$userModel = new UsersModel();
		$context['users'] = $userModel->where('id', $id)->findAll();
		return view('user_create', $context);
	}

	public function store()
	{
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$check = $this->validate(
			[
				'user_name' => 'required',
				'locale' => 'required',
				'email' => 'required',
				'mobile' => 'required',
				'land_line' => 'required',
				'fax' => 'required',
				'file' => [
					'uploaded[file]',
					'mime_in[file,image/jpg,image/jpeg,image/png]',
					'max_size[file,1024]',
				]
			]
		);

		if (!$check) {
			return view('user_create', ['validation' => $this->validator]);
		}

		$userModel = new UsersModel();
		$img = $this->request->getFile('file');
		$img->move(FCPATH . 'assets/uploads');

		$data = [
			'user_name' => $this->request->getVar('user_name'),
			'locale' => $this->request->getVar('locale'),
			'email' => $this->request->getVar('email'),
			'mobile' => $this->request->getVar('mobile'),
			'land_line' => $this->request->getVar('land_line'),
			'fax' => $this->request->getvar('fax'),
			'file' =>  $img->getName(),
			'file_type'  => $img->getClientMimeType()
		];

		$id = $this->request->getVar('id');
		if (!empty($id)) {
			$userModel->update($id, $data);
			// $_SESSION['message'] = 'success';
			// $this->session->set('message','success');	
		} else {
			$userModel->insert($data);
			// $_SESSION['message'] = 'success';
			// $this->session->set('message','success');
		}
		return $this->response->redirect(site_url('Users'));
	}

}
