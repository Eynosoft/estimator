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
		$this->user_notifications = new UserNotificationsModel();
		$this->session = \Config\Services::session();
		$this->session->start();
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
		];
		$context['users'] = $this->user_model->getDataById($id);
		$context['uid'] = $id;
		return view('user_create', $context);
	}

// Create Users Page Ends 
// -----------------------------------------------------------------------------------------------// 



//----------------------------------------------------------------------------------------------//
// Store User Data starts

	public function store()
	{
		$img = $this->request->getFile('file');
		if ($img->isValid() && !$img->hasMoved()) {
			$img->move(FCPATH. 'assets/uploads');
		}

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
			$result = $this->user_model->insertUsersData($data,$id);
			if($result)
			{
				unset($_SESSION['currentTab']);
				$_SESSION['currentTab'] = '#userContact';
				$url = base_url().'/users/update/' . $result . '/#userContact';	
				return redirect()->to($url);
			}
		}

		else {
			$result = $this->user_model->insertUsersData($data);
			if($result)
			{
				unset($_SESSION['currentTab']);
				$_SESSION['currentTab'] = '#userContact';
				$url = base_url().'/users/create/' . $result . '/#userContact';	
				return redirect()->to($url);
			}
		}
		return $this->response->redirect(site_url('Users'));
	}

//Store user Data Ends 
//----------------------------------------------------------------------------------------------//



//---------------------------------------------------------------------------------------------//
//Store Notification data starts

public function storeNotifications($id = null){

   $data['uid'] = $this->request->getVar('uid');
	 $data['notifications'] = json_encode($this->request->getVar('usernotifications'));
	 $result = $this->user_notifications->insertNotification($data);
	 if($result) {
		$_SESSION['message'] = 'success';
	} else {
		$_SESSION['message'] = 'error';
	}
	unset($_SESSION['currentTab']);
	$_SESSION['currentTab'] = '#userAccount';
	$url = base_url().'/users/create/'.$data['uid'].'/#userAccount';
	return redirect()->to($url);
	
}

// Store Notifications Data ends 
//---------------------------------------------------------------------------------------------//

}
