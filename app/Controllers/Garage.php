<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GarageModel;


class Garage extends BaseController
{
	protected $garage_model = null;
	protected $session;

	function __construct()
	{
		$this->garage_model = new GarageModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}


//----------------------------------------------------------------------------------------------//
// Garage Home Page Method Starts

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
		if(!logged_in()) {
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
		if(!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['garage'] = $this->garage_model->getGarageDataById($id);
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
		$context['requests'] = $this->garage_model->getRequestById($id);
		$context['estimations'] = $this->garage_model->getEstimationRequestById($id);
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
				'email' => 'required',
				'mobile' => 'required',
				'landline' => 'required',
				'fax' => 'required',
				'locale' => 'required',
				'city' => 'required',
				'address' => 'required',
				'status' => 'required',
			]
		);

		$data = [
			'garage_name' => $this->request->getVar('garage_name'),
			'owner_name' => $this->request->getVar('owner_name'),
			'repair_rate' => $this->request->getVar('repair_rate'),
			'email' => $this->request->getVar('email'),
			'mobile' => $this->request->getVar('mobile'),
			'landline' => $this->request->getVar('landline'),
			'fax' => $this->request->getVar('fax'),
			'locale' => $this->request->getVar('locale'),
			'city' => $this->request->getVar('city'),
			'address' => $this->request->getVar('address'),
			'notifications' => json_encode($this->request->getVar('notifications')),
      'doc_type' => json_encode($this->request->getVar('doc_type')),
			'notes' => $this->request->getVar('notes'),
			'status' => $this->request->getVar('status'),
		];

	  if(!$check) {
			return view('garage_create', ['validation' => $this->validator]);
		}  else {

			$result = $this->garage_model->insertgarage($data);

			if($result > 0) {
				$_SESSION['message'] = 'success';
			} else {
				$_SESSION['message'] = 'error';
			}

			$url = base_url() . '/garage';
			return redirect()->to($url);
		}

	}


// Store Garage Data Ends
// ----------------------------------------------------------------------------------------------//

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
			'status' => $this->request->getVar('status'),
			'locale' => $this->request->getVar('locale'),
			'city' => $this->request->getVar('city'),
			'address' => $this->request->getVar('address'),
			'notifications' => json_encode($this->request->getVar('notifications')),
      'doc_type' => json_encode($this->request->getVar('doc_type')),
		];

  if(!empty($id)) {

			$result = $this->garage_model->insertgarage($data, $id);

			if($result){
      $_SESSION['message'] = 'usuccess';
			}

			else{
				$_SESSION['message'] = 'uerror';
			}

			$url = base_url() . '/garage/view' .'/'.$id;
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
	if($result){
		$_SESSION['message'] = 'dsuccess';
	}
	else{
		$_SESSION['message'] ='derror';
	}
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

public function ajaxSearch()
{
	$search_data = $this->request->getVar('q');
	$result = $this->garage_model->getGarageByAjax($search_data);
	echo $result;
}


}
