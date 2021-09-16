<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JobModel;
use App\Models\RequestorModel;

class Jobsestimation extends BaseController
{
	protected $job_model = null; 

	public function __construct(){

		$this->job_model = new JobModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}

//--------------------------------------------------------------//
// Home Method for the job Starts

	public function index()
	{
		if(!logged_in()){
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username' => user()->username,
	];

  $context['jobs'] = $this->job_model->getAllJobData();
	return view('job_home',$context);

  }

//Home Method for the job ends 
//---------------------------------------------------------------//


}
