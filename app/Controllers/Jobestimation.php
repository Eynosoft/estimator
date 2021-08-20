<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jobestimation extends BaseController
{

	public function __construct(){
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
