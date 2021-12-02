<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\UserNotificationsModel;

class Users extends BaseController
{
	protected $user_model = null;
	protected $user_notifications = null;

	function __construct()
	{

		$this->user_model = new UsersModel();
		$this->session 	= \Config\Services::session();

	}

	//--------------------------------------------------------------------------------------------//
	// Home page for the User

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];

		$context['user'] = $this->user_model->getUsersAllData();
		return view('users_list', $context);
	}

	// Home page for The User Ends
	//---------------------------------------------------------------------------------------------//


	//---------------------------------------------------------------------------------------------//
	//Create Users page Starts

	public function create($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'uername' => user()->username,
			//'validation'  => $this->validation,
		];
		$context['users'] = $this->user_model->getDataById($id);
		//$context['uid'] = $id;
		return view('user_create', $context);
	}

	// Create Users Page Ends
	// -----------------------------------------------------------------------------------------------//


	//----------------------------------------------------------------------------------------------//
	// Store User Data starts

	public function update_user($id = null)
	{

		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username' => user()->username,
		];
		$context['user'] = $this->user_model->getUserDataById($id);
		$context['uid'] = $id;
		return view('user_update', $context);
	}


	// View user Page Ends
	// --------------------------------------------------------------------------------------------//



	// -------------------------------------------------------------------------------------------//
	//Store user Data Starts

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
			]
		);

		if(!$check){
			return view('user_create', ['validation' => $this->validator]);
		}
		else {
			$contact_signature = $this->request->getFile('contact_signature');
      $uploadPath = 'assets/uploads/';

			if($contact_signature->isValid() && !$contact_signature->hasMoved()) {
				$contact_signature_name = $contact_signature->getName();
				$contact_signature_type = $contact_signature->getClientMimeType();
				$contact_signature_newname = 's'.time().$contact_signature_name;
				$contact_signature->move(FCPATH . $uploadPath, $contact_signature_newname);
			}

			$account_signature = $this->request->getFile('account_signature');

      if($account_signature->isValid() && !$account_signature->hasMoved()){
				$account_signature_name = $account_signature->getName();
				$account_signature_type = $account_signature->getClientMimeType();
				$account_signature_newname = 'a'.time().$account_signature_name;
				$account_signature->move(FCPATH . $uploadPath, $account_signature_newname);
			}

			$data = [
				'user_name' => $this->request->getVar('user_name'),
				'locale' => $this->request->getVar('locale'),
				'email' => $this->request->getVar('email'),
				'mobile' => $this->request->getVar('mobile'),
				'land_line' => $this->request->getVar('land_line'),
				'fax' => $this->request->getVar('fax'),
				'contact_signature' => empty($contact_signature_newname) ? $this->request->getVar('contact_signature_hidden') : $contact_signature_newname,
				'contact_signature_type' => $contact_signature_type,
        'account_signature' => empty($account_signature_newname) ? $this->request->getVar('account_signature_hidden') : $account_signature_newname,
				'account_signature_type' => $account_signature_type,
				'account_username' => $this->request->getVar('account_username'),
				'account_locale' => $this->request->getVar('account_locale'),
				'account_email' => $this->request->getVar('account_email'),
				'account_mobile' => $this->request->getVar('account_mobile'),
				'account_landline' => $this->request->getVar('account_landline'),
        'account_fax' => $this->request->getVar('account_fax'),
 		    'notifications' => json_encode($this->request->getVar('usernotifications')),
				'permissions' => json_encode($this->request->getVar('permissions')),
			];

		$id = $this->request->getVar('id');
			if(!empty($id)) {
				$result = $this->user_model->insertUsersData($data, $id);
				if ($result) {
					unset($_SESSION['currentTab']);
					$_SESSION['currentTab'] = '#userContact';
					$url = base_url() . '/users' . '/#userContact';
					return redirect()->to($url);
				}
			}

			else {
				$result = $this->user_model->insertUsersData($data);
				if ($result) {

				$_SESSION['message'] = 'success';
					unset($_SESSION['currentTab']);
					$_SESSION['currentTab'] = '#userContact';
					$url = base_url() . '/users' . '/#userContact';
					echo "<pre>";
					print_r($_SESSION);
					return redirect()->to($url);
				}
				else{
					$_SESSION['message'] = 'error';
				}
			}
			return $this->response->redirect(site_url('users'));
		}
	}

	//Store user Data Ends
	//----------------------------------------------------------------------------------------------//


	// image store start--
	//----------------------------------------------------------------------------------------------//
	// public function img_store()
	// {
	// 	$validation = \Config\Services::validation();
	// 	$img = $this->request->getFile('file');
	// 	print_r($img);
	// 	die();
	// 	$uploadPath = 'assets/uploads/';
	// 	if ($img->isValid() && !$img->hasMoved()) {
	// 		$fileNewName = $img->getRandomName();
	// 		$img->move(FCPATH . $uploadPath, $fileNewName);
	// 		//$img = $img->getName();
	// 		$imgName = $img->getRandomName();
	// 		$imgType->getClientMimeType();
	// 		$data['file'] =  $imgName;
	// 		$data['file_type'] = $imgType;

	// 		if (empty($validation)) {
	// 			$result = $this->user_model->insertImage($data);
	// 			echo $result;
	// 		}
	// 	}
	// }

	// image store end--
	//----------------------------------------------------------------------------------------------//


	// ----------------------------------------------------------------------------------------------//
	// Delete Garage By Id Starts


	public function delete($id = null)
	{
		$result = $this->user_model->deletUserById($id);
		if($result){
			$_SESSION['message'] = 'dsuccess';
		}
		else{
      $_SESSION['message'] = 'derror';
		}
		return $this->response->redirect(site_url('Users'));
	}

	//delete user Data Ends
  //----------------------------------------------------------------------------------------------//


}
