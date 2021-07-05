<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Requests extends BaseController
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

		return view('requests_list', $context);
	}
	public function create()
	{
		if(!logged_in())
		{
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		return view('new_estimation_request',$context);
	}
}
