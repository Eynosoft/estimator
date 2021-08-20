<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\CustomerDocModel;
use App\Models\CustomernotificationModel;
class Customer extends BaseController
{
	protected $customer_model = null;
	protected $customerdoc_model = null;
	protected $customer_notification = null;
	protected $session;


	function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->customer_model = new CustomerModel();
		$this->customerdoc_model = new CustomerDocModel();
		$this->customer_notification = new CustomernotificationModel();
	}


	// ---------------------------------------------------------------------------------------------//
	// Home Page Controller for the customer

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
		$context['customer'] = $this->customer_model->getAllCustomerData();
		return view('customers_list', $context);
	}

	// Home Page Controller ends 
	// ----------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	// Create Controller for the customer Starts

	public function create($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username'  => user()->username,
		];

		$customerModel = new CustomerModel();
		$context['customer'] = $customerModel->where('id', $id)->findAll();
		$context['customer_id'] = $id;
		return view('customer_create', $context);
	}

	// Create Controller for the customer Ends
	//-----------------------------------------------------------------------------------------------//


	// ----------------------------------------------------------------------------------------------//
	// Get customer Data by id starts

	public function edit($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
		$context['customer'] = $this->customer_model->getCustomersDataById($id);
		$context['customer_notification'] = $this->customer_notification->getCustomerNotificationDataById($id);
		$context['customer_doc'] = $this->customerdoc_model->getcustomerDocDatabyId($id);
		return view('customer_edit', $context);
	}

	// Get Cystomer Data by id Ends
	//-----------------------------------------------------------------------------------------------//


	//-----------------------------------------------------------------------------------------------//
	// Store Customer data Starts

	public function store()
	{
		helper(['form', 'url']);
		$validation = \Config\Services::validation();
		$check = $this->validate(
			[
				'client_name' => 'required',
				'locale' => 'required',
				'report_pass' => 'required',
				'emails' => 'required',
				'mobile' => 'required',
				'land_line' => 'required',
				'faxes' => 'required'
			]
		);

		$data = [
			'client_name' => $this->request->getVar('client_name'),
			'locale' => $this->request->getVar('locale'),
			'report_password' => $this->request->getVar('report_pass'),
			'emails' => $this->request->getVar('emails'),
			'mobile' => $this->request->getVar('mobile'),
			'land_line' => $this->request->getVar('land_line'),
			'fax' => $this->request->getVar('faxes'),
		];

		if (!$check) {
			return view('customer_create', ['validation' => $this->validator]);
		} else {
			$result = $this->customer_model->insertcustomer($data);
			unset($_SESSION['currentTab']);
			$_SESSION['currentTab'] = '#cusNotifications';
			$url = base_url() . '/customer/create/' . $result . '/#cusNotifications';
			return redirect()->to($url);
		}
	}

	// Store the customer Ends 
	// ---------------------------------------------------------------------------------------------//


	//-----------------------------------------------------------------------------------------------//
	// Update Customer data Starts

	public function updateCustomer()
	{
		$id = $this->request->getVar('id');
		$data = [
			'client_name' => $this->request->getVar('client_name'),
			'locale' => $this->request->getVar('locale'),
			'report_password' => $this->request->getVar('report_pass'),
			'emails' => $this->request->getVar('emails'),
			'mobile' => $this->request->getVar('mobile'),
			'land_line' => $this->request->getVar('land_line'),
			'fax' => $this->request->getVar('faxes'),
		];

		if (!empty($id)) {
			$result = $this->customer_model->insertcustomer($data, $id);
			unset($_SESSION['currentTab']);
			$_SESSION['currentTab'] = '#cusContact';
			$url = base_url() . '/customer/edit/' . $id . '/#cusContact';
			return redirect()->to($url);
		}
	}

	// Update Customer data Ends 
	// ---------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	//Delete Customer Data starts 

	public function delete($id = null)
	{
		$result = $this->customer_model->deleteCustomer($id);
		if ($result) {
			$_SESSION['message'] = 'dsuccess';
		} else {
			$_SESSION['message'] = 'derror';
		}
		return $this->response->redirect(site_url('Customer'));
	}

	// Delete Customer Data Ends
	// ---------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	// Method for the store the document Starts

	public function storeDoc()
	{
		$data['customer_id'] = $this->request->getVar('customer_id');
		$data['doc_type'] = json_encode($this->request->getVar('files'));
		//json_encode($data['doc_type']);
		$result = $this->customerdoc_model->insertcustomerDoc($data);
		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#cusSettings';
		$url = base_url() . '/customer/create/' . $data['customer_id'] . '#cusSettings';
		return redirect()->to($url);
	}

	// Method for Store the document Ends
	// ---------------------------------------------------------------------------------------------//


	//----------------------------------------------------------------------------------------------//
	//  Method for Store the notification Starts

	public function storeNotification()
	{
		$data['notifications'] = json_encode($this->request->getVar('notification'));
		$data['customer_id'] = $this->request->getVar('customer_id');
		$result = $this->customer_notification->insertNofication($data);
		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#cusSettings';
		$url = base_url() . '/customer/create/' . $data['customer_id'] . '#cusSettings';
		return redirect()->to($url);
	}

	// Method for store the Notification Ends
	//----------------------------------------------------------------------------------------------//


  //----------------------------------------------------------------------------------------------//
	// Update Customer Notification starts

	public function updateNotification($id = null)
	{
		$customer_id = $id;
		$data['notifications'] = json_encode($this->request->getVar('notification'));
		$result = $this->customer_notification->updateNotificationdata($data, $customer_id);
		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#cusNotifications';
		$url = base_url() . '/customer/edit/' . $customer_id . '/#cusNotifications';
		return redirect()->to($url);
	}

	// Update customer Notification Ends
	//----------------------------------------------------------------------------------------------// 


//----------------------------------------------------------------------------------------------//
// Update Customer Document starts

	public function updateDoc($id = null)
	{
		$customer_id = $id;
		$data['doc_type'] = json_encode($this->request->getVar('files'));
		$result = $this->customerdoc_model->updateDocdata($data, $customer_id);
		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		unset($_SESSION['currentTab']);
		$_SESSION['currentTab'] = '#cusSettings';
		$url = base_url() . '/customer/edit/' . $customer_id . '#cusSettings';
		return redirect()->to($url);
	}

// Update Customer Document Ends
//-----------------------------------------------------------------------------------------------//

}
