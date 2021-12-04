<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PartsModel;
use App\Models\PartsActionModel;

class Parts extends BaseController
{

	protected $parts_model = null;
	protected $parts_action_model = null;
	protected $session;

	function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->parts_model = new PartsModel();
		$this->parts_action_model = new PartsActionModel();
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
		$context['parts'] = $this->parts_model->getAllpartsData();
		return view('parts_list', $context);
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

		return view('parts_create', $context);
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
		$context['parts_data'] = $this->parts_model->getPartsDataById($id);
		return view('parts_update', $context);
	}

	// Get Cystomer Data by id Ends
	//-----------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	//Delete Customer Data starts

	public function delete($id = null)
	{
		$result = $this->parts_model->deleteParts($id);
		if ($result) {
			$_SESSION['message'] = 'dsuccess';
		} else {
			$_SESSION['message'] = 'derror';
		}
		return $this->response->redirect(site_url('parts/'));
	}

	// Delete Customer Data Ends
	// ---------------------------------------------------------------------------------------------//

	public function savedata()
	{

		$id = $this->request->getVar('id');

		$part_data = [
			'part_name' => $this->request->getVar('part_name'),
			'part_note' => $this->request->getVar('part_note'),
		];

		$result = $this->parts_model->insertpart($part_data, $id);

		if ($result) {
			$_SESSION['message'] = 'success';
			return $this->response->redirect(site_url('parts'));
		} else {
			$_SESSION['message'] = 'error';
			return $this->response->redirect(site_url('parts_create'));
		}
	}

	public function partslist()
	{
		$postData = $this->request->getVar();
    $data = $this->parts_model->getPartsByAjax($postData);
    echo json_encode($data);
		die;
	}


	public function partsaction(){
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
		$context['parts_action_list'] = $this->parts_action_model->getAllpartsactionData();
		return view('part_action_list', $context);
	}

	public function partsactioncreate(){
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
		return view('parts_action_create', $context);
	}


	public function parts_action_edit($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username'  => user()->username,
		];
		$context['parts_action_data'] = $this->parts_action_model->getPartsactionDataById($id);
		return view('parts_action_update', $context);
	}

	// Get Cystomer Data by id Ends
	//-----------------------------------------------------------------------------------------------//


	// ---------------------------------------------------------------------------------------------//
	//Delete Customer Data starts

	public function parts_action_delete($id = null)
	{
		$result = $this->parts_action_model->deletepartsaction($id);
		if ($result) {
			$_SESSION['message'] = 'dsuccess';
		} else {
			$_SESSION['message'] = 'derror';
		}
		return $this->response->redirect(site_url('parts/partsaction/'));
	}

//Update and save part action data

	public function partactionsave($id = null)
	{
		$part_data = [
			'part_action_name' => $this->request->getVar('part_action_name'),
		];
		$result = $this->parts_action_model->insertpartaction($part_data, $id);
		if ($result) {
		  $_SESSION['message'] = 'success';
			return $this->response->redirect(site_url('parts/partsaction'));
		} else {
			$_SESSION['message'] = 'error';
			return $this->response->redirect(site_url('parts/partsactioncreate'));
		}
	}

	// Update and save  part action data



}
