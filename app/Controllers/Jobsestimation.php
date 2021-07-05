<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Jobsestimation extends BaseController
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
    
    return view('jobs_estimation_list',$context);

	}
}
