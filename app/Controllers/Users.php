<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Users extends BaseController
{
	public function index()
	{
	   if(!logged_in())
		 {
			 return redirect()->to(base_url(route_to('/')));
		 }

		 $context = [
      
			'username' => user()->username,

		 ];
    
		 $userModel = new usersModel();
		 $context['user'] = $userModel->orderBy('id', 'DESC')->findAll();
		return view('users_list',$context);

	}
	
	public function create()
	{
		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username' => user()->username,
		];

    return view('user_create',$context);
	}

	public function store()
	{
		helper(['form','url']);
		$validation = \Config\Services::validation();
		$check = $this->validate(
			[
       'user_name' => 'required',
			 'locale' => 'required',
			 'file' => 'required',
			 'email' => 'required',
			 'mobile' => 'required',
			 'land_line' => 'required',
			 'fax' => 'required',
			]);

			if(!$check)
			{
			  return view('user_create', ['validation'=>$this->validator]);
			} else{	
     $userModel = new UsersModel();
		 $id = $this->request->getVar('id');
	
		 $data = [
			 'user_name' => $this->request->getVar('user_name'), 
			 'locale' => $this->request->getVar('locale'),
       'email' => $this->request->getVar('email'),
			 'mobile' => $this->request->getVar('mobile'),
			 'land_line' => $this->request->getVar('land_line'),
			 'fax' => $this->request->getvar('fax'),
		 ];

		 if(!empty($id)){
			$userModel->update($id, $data);
			//$_SESSION['message'] = 'success';
		 //	$this->session->set('message','success');	
		 }
		 
		else {
			$userModel->insert($data);
			//$_SESSION['message'] = 'success';
		//	$this->session->set('message','success');
		   }

	return $this->response->redirect(site_url('Users'));
		
	}

}

}