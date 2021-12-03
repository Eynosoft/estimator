<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class Customer extends BaseController
{
	protected $customer_model = null;
	protected $session;

	function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->customer_model = new CustomerModel();
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

	public function create()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
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
		return view('customer_edit', $context);
	}

	// Get Customer Data by id Ends
	//-----------------------------------------------------------------------------------------------//

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
			'notifications' => json_encode($this->request->getVar('notification')),
			'doc_type' => json_encode($this->request->getVar('files')),
		];

		if (!empty($id)) {
			$result = $this->customer_model->insertcustomer($data, $id);
			if ($result) {
				$_SESSION['message'] = 'usuccess';
			}
			else{
				$_SESSION['message'] = 'uerror';
			}
			$url = base_url() . '/customer';
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


	public function insert_all_data()
	{

		$data = [
			'client_name' => $this->request->getVar('client_name'),
			'locale' => $this->request->getVar('locale'),
			'report_password' => $this->request->getVar('report_pass'),
			'emails' => $this->request->getVar('emails'),
			'mobile' => $this->request->getVar('mobile'),
			'land_line' => $this->request->getVar('land_line'),
			'fax' => $this->request->getVar('faxes'),
			'notifications' => json_encode($this->request->getVar('notification')),
			'doc_type' => json_encode($this->request->getVar('files')),
		];

		$result = $this->customer_model->insertcustomer($data);

		if ($result) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}

		$url = base_url() . '/customer';
		return redirect()->to($url);
	}
}
