<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\RequestorModel;

class Requests extends BaseController
{
	protected $customer_model = null;
	protected $request_model = null;

	public function __construct()
	{
	  $this->session = \Config\Services::session();
		$this->session->start();
		$this->customer_model = new CustomerModel();
		$this->request_model = new RequestorModel();	
	}

	public function index()
	{

		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
        'username' => user()->username,
		];
		return view('requests_list', $context);

	}

	public function create()
	{

	  if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}

	  $data['context'] = [
			'username' => user()->username,
	  ];
		$data['customer'] = $this->customer_model->setCustomerDropdown();
	  return view('new_estimation_request',$data);
	}


	public function update($id)
	{

		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}

		$data['context'] = [
			'username' => user()->username,
		];

		$data['requestor'] = $this->request_model->requestorGetAllDataById($id);
		return view('new_estimation_request',$data);

	}

	public function store() {
		// helper(['form','url']);
		// $validation = \Config\Services::validation();
		$check = $this->validate(
			[
				'customer' => 'required',
				'requested_date' => 'required',
				'requestor' => 'required',
			]);

		if(!$check)
			{
				return view('new_estimation_request',['validation'=>$this->validator]);
			} 

		else{

			$id = $this->request->getPost('id');
			
			$data = [
				'customer' => $this->request->getVar('customer'),
				'requested_date' => $this->request->getVar('requested_date'),
				'requestor' => $this->request->getVar('requestor'),
			];

			if(!empty($id)) {
				$result = $this->request_model->insertrequestor($data,$id);
				//$_SESSION['message'] = 'success';
			}

		  else{
				 // echo "<pre>";
				 // print_r($data);
				 // die('########');
				  $result = $this->request_model->insertrequestor($data);
					}
    
		if($result){
					$this->session->set('message','success');
					}
			else{
					$this->session->set('error','error');
				}
		 }

		return $this->response->redirect(site_url('Requests/requestors'));

	}

	public function requestors(){
	
			if(!logged_in())
			{
				 return redirect()->to(base_url(route_to('/')));
			}
	
			$data['context'] = [
				'username' => user()->username,
			];

			$data['requestor'] = $this->request_model->requestorGetAllData();
			return view('jobs_estimation_list',$data);
	
	}

}
