<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RequestorModel;

class Dashboard extends BaseController
{
	protected $request_model = null;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->request_model = new RequestorModel();
	}

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['request_data'] = $this->request_model->getAllStatusDashboard();
		return view('dashboard', $context);
	}
}
