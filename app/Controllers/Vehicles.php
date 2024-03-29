<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehicleModel;
use App\Models\GarageModel;

class Vehicles extends BaseController
{

	protected $vehicle_model = null;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->vehicle_model = new VehicleModel();
	}


	//------------------------------------------------------------------------//
	// Home Page for the Vehicle Starts //

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['vehicle'] = $this->vehicle_model->getVehicleData();
		return view('vehicle_list', $context);
	}

	// Home Page For The Vehicle Ends
	// -------------------------------------------------------------------------//


	// -------------------------------------------------------------------------//
	// Create Page Controller Starts //

	public function create($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['vehicle'] = $this->vehicle_model->getVehicleDataById($id);
		return view('vehicle_create', $context);
	}

	// Create Page Controller Ends //
	// --------------------------------------------------------------------------//


	// --------------------------------------------------------------------------//
	// View page controller for the vehcile Starts

	public function view($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['vehicle'] = $this->vehicle_model->getVehicleDataById($id);
		return view('popups/vehicle_view', $context);
	}

	// View Page Controller For the vehicle Ends
	// -------------------------------------------------------------------------//


	// -----------------------------------------------------------------------------//
	// Store and Update Controller for the Vehcile Starts

	public function store()
	{
		helper(['form', 'url']);
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
			]
		);

		if (!$check) {
			return view('vehicle_create', ['validation' => $this->validator]);
		} else {
			$id = $this->request->getVar('id');

			$data = [
				'registration_plate' => $this->request->getVar('registration_plate'),
				'manufacturing_date' => $this->request->getVar('manufacture_date'),
				'vin_number' => $this->request->getVar('vin_number'),
				'registration_date' => $this->request->getVar('registration_date'),
				'make' => $this->request->getVar('make'),
				'model' => $this->request->getvar('model'),
				'body_type' => $this->request->getVar('body_type'),
				'engine_capacity' => $this->request->getVar('engine_capacity'),
				'engine_power' => $this->request->getVar('engine_power'),
				'condition_when_imported' => $this->request->getVar('condition_import'),
				'gearbox_type' => $this->request->getVar('gearbox_type'),
				'main_color' => $this->request->getVar('main_color'),
				'pcode' => $this->request->getVar('pcode'),
			];

			if (!empty($id)) {
				$result = $this->vehicle_model->insertVehicle($data, $id);
				if($result){
					$_SESSION['message'] = 'usuccess';
				}
				else{
					$_SESSION['message'] = 'uerror';
				}
			} else {
				$result = $this->vehicle_model->insertVehicle($data);
				if($result){
					$_SESSION['message'] = 'success';
				}
				else{
					$_SESSION['message'] = 'error';
				}
			}
		}
		return $this->response->redirect(site_url('Vehicles'));
	}

	// Store and update controller for the vehicle Ends
	// ---------------------------------------------------------------------------//


	// -----------------------------------------------------------------------------//
	// Delete vehicle by Id Starts

	public function delete($id = null)
	{
		$data['vehicle'] = $this->vehicle_model->deleteVehicleById($id);
		if($data['vehicle']){
			$_SESSION['message'] = 'dsuccess';
		}
		else {
			$_SESSION['message'] = 'derror';
		}
		return $this->response->redirect(site_url('vehicles'));
	}

	// Delete Vehicle By id ends
	// -------------------------------------------------------------------------------//

	public function ajaxSearch()
	{
	  $search_data = $this->request->getVar('q');
		$result = $this->vehicle_model->getVehicleByAjax($search_data);
		echo $result;
	}
}
