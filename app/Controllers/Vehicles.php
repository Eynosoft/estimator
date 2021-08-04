<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehicleModel;
use App\Models\GarageModel;

class Vehicles extends BaseController
{
	public function index()
	{
		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
       'username' => user()->username,
		];

		$vehicleModel = new VehicleModel();
		$context['vehicle'] = $vehicleModel->orderBy('id', 'DESC')->findAll();
		return view('vehicle_list',$context);

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

		$vehicleModel = new vehicleModel();
		$context['vehicle'] = $vehicleModel->where('id', $id)->findAll();
		return view('vehicle_create',$context);
	}

	public function View($id = null)
	{
       if(!logged_in())
			 {
				 return redirect()->to(base_url(route_to('/')));
			 }
			 $context = [
				 'username' => user()->username,
			 ];

			 $vehicleModel = new vehicleModel();
			 $context['vehicle'] = $vehicleModel->where('id',$id)->findAll();
			 return view('popups/vehicle_view',$context);
	}

	public function store()
	{
		helper(['form','url']);
		$validation = \Config\Services::validation();

		$check = $this->validate(
			[
       'registration_plate' => 'required',
			 'manufacture_date' => 'required',
			 'vin_number' => 'required',
			 'registration_date' => 'required',
			 'make' => 'required',
			 'model' => 'required',
			 'body_type' => 'required',
			 'engine_capacity' => 'required',
			 'engine_power' => 'required',
			 'condition_import' => 'required',
			 'gearbox_type' => 'required',
			 'main_color' => 'required',
			 'pcode' => 'required',
			]);

			if(!$check)
			{
				return view('vehicle_create', ['validation'=>$this->validator]);
			} else{	

     $vehicleModel = new VehicleModel();
		 $id = $this->request->getVar('id');

		 $data = [
			 'registration_plate' => $this->request->getVar('registration_plate'), 
			 'manufacturing_date' => $this->request->getVar('manufacture_date'),
       'vin_number' => $this->request->getVar('vin_number'),
			 'registration_date' => $this->request->getVar('registration_date'),
			 'make' => $this->request->getVar('make'),
			 'model' => $this->request->getvar('model'),
			 'body_type' => $this->request->getVar('body_type'),
			 'engine_capacity'=>$this->request->getVar('engine_capacity'),
			 'engine_power' => $this->request->getVar('engine_power'),
			 'condition_when_imported'=> $this->request->getVar('condition_import'),
			 'gearbox_type' => $this->request->getVar('gearbox_type'),
			 'main_color'=> $this->request->getVar('main_color'),
			 'pcode' => $this->request->getVar('pcode'),
		 ];

		 if(!empty($id)){
			$vehicleModel->update($id, $data);
			//$_SESSION['message'] = 'success';
		 //	$this->session->set('message','success');	
		}
		else {
			$vehicleModel->insert($data);
			//$_SESSION['message'] = 'success';
		//	$this->session->set('message','success');
		   }
	}

	return $this->response->redirect(site_url('Vehicles'));
	}

	public function delete($id = null)
	{
    $vehicleModel = new VehicleModel();
		$data['vehicle'] = $vehicleModel->where('id',$id)->delete($id);
		return $this->response->redirect(site_url('Vehicles'));
	}

	public function SearchAutoComplete()
	{
		$garagemodel = new GarageModel();
	  $results['garage_data'] =	$garagemodel->like('garage_name', trim($this->input->post('string')), 'both');
		$results['garage_data'] = $garagemodel->limit(10);  
		
		echo "<pre>";
		print_r($results);
		die;

		$html = "";

		$i =0;
		if(count($results)>0)
		{
			foreach ($results as $value) {
			 $html[] = "<li ><a href='javascript:void(0)' onclick = 'pick()'>".$value['listing_title']."</a></li>";
			}
		echo implode(" ",$html);
		}
	}

}
