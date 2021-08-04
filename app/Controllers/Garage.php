<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GarageModel;

class Garage extends BaseController
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
       'username' => user()->username,
		];
        $garageModel = new GarageModel();
		    $context['garage'] = $garageModel->orderBy('id', 'DESC')->findAll();
		    return view('garages_list',$context);
	}
	
	public function create($id = null)
	{
		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		]; 
		
    $garageModel = new GarageModel();
		$context['garage'] = $garageModel->where('id', $id)->findAll();
		return view('garage_create',$context);
	}

	public function view($id = null)
	{
     if(!logged_in())
		 {
			 return redirect()->to(base_url(route_to('/')));
		 }
		 $context = [
			 'username' => user()->username,
		 ];
		 $garageModel = new GarageModel();
		 $context['garage'] = $garageModel->where('id',$id)->findAll();
		 return view('view_garage',$context);
	}

	public function Store(){
		helper(['form','url']);
		$validation = \Config\Services::validation();
		$check = $this->validate(
			[
       'garage_name' => 'required',
			 'owner_name' => 'required',
			 'reports_password' => 'required',
			 'email' => 'required',
			 'mobile' => 'required',
			 'landline' => 'required',
			 'fax' => 'required'
			]);

			if(!$check)
			{
				return view('garage_create', ['validation'=>$this->validator]);
			} else {	

		$garageModel = new GarageModel();
		$id = $this->request->getVar('id');
		$data = [
          'garage_name' => $this->request->getVar('garage_name'),
					'owner_name' => $this->request->getVar('owner_name'),
					'reports_password' => $this->request->getVar('reports_password'),
					'email' => $this->request->getVar('email'),
					'mobile' => $this->request->getVar('mobile'),
					'landline'=> $this->request->getVar('landline'),
					'fax' => $this->request->getVar('fax'), 
					'notes' => $this->request->getVar('notes'),
					'active' => $this->request->getVar('active')
		  ];

    if(!empty($id)){
			$garageModel->update($id, $data);
			//$_SESSION['message'] = 'success';
			$this->session->set('message','success');	
		}

		else{
			  $garageModel->insert($data);
			  //$_SESSION['message'] = 'success';
		  	$this->session->set('message','success');
	  	 }

  	 }

		 return $this->response->redirect(site_url('Garage'));
	}

	public function delete($id = null){
		$garageModel = new GarageModel();
		$data['garage'] = $garageModel->where('id', $id)->delete($id);
		return $this->response->redirect(site_url('Garage'));
  } 
	


	public function getGarages(){
		$request = service('request');
		$postData = $request->getPost();
		$response = array();
		// Read new token and assign in $response['token']
		$response['token'] = csrf_hash();
		$data = array();
		if(isset($postData['search'])){
			 $search = $postData['search'];
			 // Fetch record
			 $garages = new GarageModel();
			 $garagelist = $garages->select('garage_name')
							->like('garage_name',$search)
							->orderBy('garage_name')
							->findAll(5);
			 foreach($garagelist as $garage){
					 $data[] = array(
							"value" => $garage['id'],
							"label" => $garage['garage_name'],
					 );
			 }
		}

		$response['data'] = $data;
		return $this->response->setJSON($response);

 }

}
