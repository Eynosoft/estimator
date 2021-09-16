<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class Reports extends BaseController
{
	protected $customer_model = null;

	function __construct()
	{
		$this->customer_model = new CustomerModel();
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
		$context['customer'] = $this->customer_model->setCustomerDropdown();
		return view('reports',$context);

	}
}
