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

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
		$customerModel = new CustomerModel();
		$context['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
		return view('customers_list', $context);
	}

	public function Create($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username'  => user()->username,
		];

		$customerModel = new CustomerModel();
		$context['customer'] = $customerModel->where('id', $id)->findAll();
		return view('customer_create', $context);
	}

	public function Store()
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

		if (!$check) {
			return view('customer_create', ['validation' => $this->validator]);
		} else {

			$customerModel = new CustomerModel();
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
				$_SESSION['currentTab'] = '#cusNotifications';
				$redirectUrl = 'Customer/Create/' . $id . '/#cusNotifications';
				return $this->response->redirect($redirectUrl);
			} else {
				$result = $this->customer_model->insertcustomer($data);
				unset($_SESSION['currentTab']);
				$_SESSION['currentTab'] = '#cusNotifications';
				$redirectUrl = 'Create/' . $result . '/#cusNotifications';
				return $this->response->redirect($redirectUrl);
			}
		}
	}

	public function delete($id = null)
	{
		$customerModel = new CustomerModel();
		$data['customer'] = $customerModel->where('id', $id)->delete($id);
		if ($data['customer']) {
			$_SESSION['message'] = 'dsuccess';
		} else {
			$_SESSION['message'] = 'derror';
		}
		return $this->response->redirect(site_url('Customer'));
	}


	public function insertDocuments()
	{
		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['files']['name']);
		for ($i = 0; $i < $cpt; $i++) {
			$ext = pathinfo($files['files']['name'][$i], PATHINFO_EXTENSION);
			$_FILES['files']['name'] = time() . $i . '.' . $ext;
			//$_FILES['upload_file']['name']= time().'.'.$ext.[$i];
			$_FILES['files']['type'] = $files['files']['type'][$i];
			$_FILES['files']['tmp_name'] = $files['files']['tmp_name'][$i];
			$_FILES['files']['error'] = $files['files']['error'][$i];
			$_FILES['files']['size'] = $files['files']['size'][$i];
			$this->upload->initialize($this->set_upload_options());
			$this->upload->do_upload('files');
			$documentsData['document_type'] = $ext;
			$documentsData['file_path'] 	= 'assets/uploads/' . $_FILES['files']['name'];
			$result = $this->Document_model->documentInsert($documentsData);
		}

		if ($result > 0) {
			$_SESSION['message'] = 'success';
		} else {
			$_SESSION['message'] = 'error';
		}
		return $this->response->redirect(site_url('Customer'));
	}

	private function set_upload_options()
	{

		//upload an image options
		$config = array();
		$config['upload_path']   = FCPATH . 'assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|xlsx|xls|doc|docx';
		return $config;
	}

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
		$redirectUrl = 'Create/' . $data['customer_id'] . '/#cusSettings';
		return $this->response->redirect($redirectUrl);
		// $result	= $this->insertcustomerDoc($data);
	}

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
		$_SESSION['currentTab'] = '#cusNotifications';
		$redirectUrl = 'Create/' . $data['customer_id'] . '/#cusNotifications';
		return $this->response->redirect($redirectUrl);
	}

}
