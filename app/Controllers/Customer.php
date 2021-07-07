<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\CustomerDocModel;

class Customer extends BaseController
{
	protected $session;
	function __construct()
    {

        $this->session = \Config\Services::session();
        $this->session->start();

    }

	public function index()
	{
		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
		$customerModel = new CustomerModel();
		$context['customer'] = $customerModel->orderBy('id', 'DESC')->findAll();
		return view('customers_list',$context);
	}

	public function Create($id = null)
	{
		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username'  => user()->username,
		];

		$customerModel = new CustomerModel();
		$context['customer'] = $customerModel->where('id', $id)->findAll();
		return view('customer_create',$context);
	}
	
	public function Store(){
		helper(['form','url']);
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
			]);

		if(!$check)
		{
		  return view('customer_create', ['validation'=>$this->validator]);
		} else{		 
		$customerModel = new CustomerModel();
		$id = $this->request->getVar('id');
		$data = [
          'client_name' => $this->request->getVar('client_name'),
					'locale' => $this->request->getVar('locale'),
					'report_password' => $this->request->getVar('report_pass'),
					'emails' => $this->request->getVar('emails'),
					'mobile' => $this->request->getVar('mobile'),
					'land_line'=> $this->request->getVar('land_line'),
					'fax' => $this->request->getVar('faxes'), 
		    ];

    if(!empty($id)){
			$customerModel->update($id, $data);
			//$_SESSION['message'] = 'success';
			$this->session->set('message','success');
		}
		else{
			$customerModel->insert($data);
			//$_SESSION['message'] = 'success';
			$this->session->set('message','success');
		}
	}	
	 return $this->response->redirect(site_url('Customer'));
	}

	public function delete($id = null){
		$customerModel = new CustomerModel();
		$data['customer'] = $customerModel->where('id', $id)->delete($id);
		if($data['customer'])
		{
			$_SESSION['message'] = 'dsuccess';
		}
		else
		{
			$_SESSION['message'] = 'derror';
		}
		return $this->response->redirect(site_url('Customer'));
  }  


	
	

}
