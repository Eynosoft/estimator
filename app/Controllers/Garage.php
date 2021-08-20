<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GarageModel;
use App\Models\GarageNotificationsModel;
use App\Models\garageDocTypeModel;
use App\Models\GarageNotesModel;

class Garage extends BaseController
{
	protected $garage_model = null;
	protected $garage_notification = null;
	protected $garageDoctype = null;
	protected $garageNotes = null;
	protected $session;

	function __construct()
	{
		$this->garage_model = new GarageModel();
		$this->garage_notification = new GarageNotificationsModel();
		$this->garageDoctype = new GarageDocTypeModel();
		$this->garageNotes = new GarageNotesModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}


//----------------------------------------------------------------------------------------------//
//Garage Home Page Method Starts 

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['garage'] = $this->garage_model->getGarageAllData();
		return view('garages_list', $context);
	}

// Garage Home Page Method Ends 
//-----------------------------------------------------------------------------------------------//



// ----------------------------------------------------------------------------------------------//
// Create Garage Starts

	public function create($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];

		$context['garage'] = $this->garage_model->getAllDataById($id);
		$context['gid'] = $id;
		return view('garage_create', $context);
	}

// Create Garage Ends
//-----------------------------------------------------------------------------------------------//


// ----------------------------------------------------------------------------------------------//
// Update Garage Starts

	public function update($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['garage'] = $this->garage_model->getGarageDataById($id);
		$context['garage_notification'] = $this->garage_notification->getGarageNotificationById($id);
		$context['garage_doctype'] = $this->garageDoctype->getGarageDocDatabyId($id);
		$context['garage_notes'] = $this->garageNotes->getGarageNotesDatabyId($id);
		return view('garage_edit', $context);
	}

// Update Garage Ends
// ----------------------------------------------------------------------------------------------//


// ---------------------------------------------------------------------------------------------//
// View Garage Page Starts

	public function view($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['garage'] = $this->garage_model->getGarageDataById($id);
		return view('view_garage', $context);
	}

// View Garage Page Ends
// --------------------------------------------------------------------------------------------//



// -------------------------------------------------------------------------------------------//
// Store Garage Data Starts

	public function store()
	{
		$validation = \Config\Services::validation();
		$check = $this->validate(
			[
				'garage_name' => 'required',
				'owner_name' => 'required',
				'repair_rate' => 'required',
				'reports_password' => 'required',
				'email' => 'required',
				'mobile' => 'required',
				'landline' => 'required',
				'fax' => 'required'
			]
		);

		$data = [
			'garage_name' => $this->request->getVar('garage_name'),
			'owner_name' => $this->request->getVar('owner_name'),
			'repair_rate' => $this->request->getVar('repair_rate'),
			'reports_password' => $this->request->getVar('reports_password'),
			'email' => $this->request->getVar('email'),
			'mobile' => $this->request->getVar('mobile'),
			'landline' => $this->request->getVar('landline'),
			'fax' => $this->request->getVar('fax'),
			'notes' => $this->request->getVar('notes'),
			'active' => $this->request->getVar('active')
		];
		if (!$check) {
			return view('garage_create', ['validation' => $this->validator]);
		} else {
			$result = $this->garage_model->insertgarage($data);
			unset($_SESSION['currentTab']);
			$_SESSION['currentTab'] = '#garageNotifications';
			$url = base_url() . '/garage/create/' . $result . '/#garageNotifications';
			return redirect()->to($url);
		}
	}

// Store Garage Data Ends
//----------------------------------------------------------------------------------------------//


//--------------------------------------------------------------------------------------------//
// Update Garage data Starts

	public function updateGarage()
	{
		$id = $this->request->getVar('id');
		$data = [
			'garage_name' => $this->request->getVar('garage_name'),
			'owner_name' => $this->request->getVar('owner_name'),
			'repair_rate' => $this->request->getVar('repair_rate'),
			'reports_password' => $this->request->getVar('reports_password'),
			'email' => $this->request->getVar('email'),
			'mobile' => $this->request->getVar('mobile'),
			'landline' => $this->request->getVar('landline'),
			'fax' => $this->request->getVar('fax'),
			'notes' => $this->request->getVar('notes'),
			'active' => $this->request->getVar('active')
		];

		if (!empty($id)) {
			$result = $this->garage_model->insertgarage($data, $id);
			unset($_SESSION['currentTab']);
			$_SESSION['currentTab'] = '#garageContactedit';
			$url = base_url() . '/garage/update/' . $id . '/#garageContactedit';
			return redirect()->to($url);
		}
	}

// Update Garage Data ends
// ----------------------------------------------------------------------------------------------//



// ----------------------------------------------------------------------------------------------//
// Delete Garage By Id Starts

	public function delete($id = null)
	{
		$result = $this->garage_model->deletGarageById($id);
		return $this->response->redirect(site_url('Garage'));
	}

// Delete Garage By Id Ends 
//-----------------------------------------------------------------------------------------------//


// ---------------------------------------------------------------------------------------------//
// Get garages data 
	public function getGarages()
	{
		$request = service('request');
		$postData = $request->getPost();
		$response = array();
		// Read new token and assign in $response['token']
		$response['token'] = csrf_hash();
		$data = array();
		if (isset($postData['search'])) {
			$search = $postData['search'];
			$garagelist = $this->garage_model->getGarageDropdownData($search);
			foreach($garagelist as $garage) {
				$data[] = array(
					"value" => $garage['id'],
					"label" => $garage['garage_name'],
				);
			}
		}
		$response['data'] = $data;
		return $this->response->setJSON($response);
	}

// Get Garage data ends 
//----------------------------------------------------------------------------------------------//


//---------------------------------------------------------------------------------------------// 
// Store Notifications for the garage starts

	public function storeNotifications()
	{
		$data['notifications'] = json_encode($this->request->getVar('notifications'));
		$data['gid'] = $this->request->getVar('gid');
		$result = $this->garage_notification->insertNofication($data);

		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#garageSettings';
		$url = base_url() . '/garage/create/' . $data['gid'] . '/#garageSettings';
		return redirect()->to($url);
	}

//Store Notifications For the Garage Ends
//---------------------------------------------------------------------------------------------//


//---------------------------------------------------------------------------------------------//
// Update Garage Notification Starts

	public function updateNotification($id = null)
	{
		$data['notifications'] = json_encode($this->request->getVar('notifications'));
		$result = $this->garage_notification->updateNotificationdata($data, $id);
		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#garageNotificationsedit';
		$url = base_url() . '/garage/update/' . $id . '/#garageNotificationsedit';
		return redirect()->to($url);
	}

// Update Garage Notfication Ends
//---------------------------------------------------------------------------------------------//



//----------------------------------------------------------------------------------------------//
// Store Garage Documents Starts

	public function storeDocsType()
	{
		$data['doc_type'] = json_encode($this->request->getVar('files'));
		$data['gid'] = $this->request->getVar('gid');
		$result = $this->garageDoctype->insertGarageDoc($data);
		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#garageNotes';
		$url = base_url() . '/garage/create/' . $data['gid'] . '/#garageNotes';
		return redirect()->to($url);
	}

// Store Garage Documents Ends
//----------------------------------------------------------------------------------------------//


//---------------------------------------------------------------------------------------------//
//Update Docs Type into the garage Starts

	public function updateDoc($id)
	{
		$data['doc_type'] = json_encode($this->request->getVar('files'));
		$result = $this->garageDoctype->updateDocdata($data, $id);
		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#garagecusSettingsedit';
		$url = base_url() . '/garage/update/' . $id . '/#garagecusSettingsedit';
		return redirect()->to($url);
	}

//Update docs type into the garage Ends
//-----------------------------------------------------------------------------------------------//


//----------------------------------------------------------------------------------------------//
//Store Garage Notes Starts

	public function storeGarageNotes()
	{
		$data['gid'] = $this->request->getVar('gid');
		$data['notes'] = $this->request->getVar('notes');
		$result = $this->garageNotes->insertGarageNotes($data);

		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#garageNotes';
		$url = base_url() . '/garage/create/' . $data['gid'] . '/#garageNotes';
		return redirect()->to($url);
	}

// Store Garage Notes Ends
//---------------------------------------------------------------------------------------------//


//---------------------------------------------------------------------------------------------//
//Update Notes of the garage Starts

	public function updateNotes($id = null)
	{
		$data['notes'] = $this->request->getVar('notes');
		$result = $this->garageNotes->updateNotesData($data, $id);

		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}

		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#garageNotes';
		$url = base_url() . '/garage/update/' . $id . '/#garageNotesedit';
		return redirect()->to($url);
	}

// Update notes of the garage ends
//----------------------------------------------------------------------------------------------//

}
