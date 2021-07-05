<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Dashboard extends BaseController
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

		return view('dashboard',$context);

	}

}
