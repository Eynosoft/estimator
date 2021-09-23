<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RequestorModel;
use App\Models\JobRequestModel;
use App\Models\JobRequestDocumentModel;

class Jobsestimation extends BaseController
{

	protected $request_model = null;
	protected $jobrequest_model = null;
	protected $jobrequest_doc_model = null;

	public function __construct()
	{
		$this->request_model = new RequestorModel();
		$this->jobrequest_model = new JobRequestModel();
		$this->jobrequest_doc_model = new JobRequestDocumentModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}

	//--------------------------------------------------------------//
	// Home Method for the job Starts

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['jobs_data'] = $this->request_model->getAllRequestData();
		// echo "<pre>";
		// print_r($context['jobs_data']);
		// die('###');
		return view('job_home', $context);
	}

	// Home Method for the job ends 
	//---------------------------------------------------------------//

	public function job_request_store($job_id = null)
	{
		
		$job_request = [
			'request_id' => $this->request->getVar('request_id'),
			'assign_id' => $this->request->getVar('assign_id'),
			'assessor' => $this->request->getVar('assessor'),
			'visit_date' => $this->request->getVar('visit_date'),
			'pre_accident_condition' => $this->request->getVar('pre_accident_condition'),
			'tyre_condition' => $this->request->getVar('tyre_condition'),
			'speedo_reading' => $this->request->getVar('speedo_reading'),
			'reservers' => $this->request->getVar('reservers'),
			'total_loss_type' => $this->request->getVar('total_loss_type'),
			'estimated_market_value' => $this->request->getVar('estimated_market_value'),
			'approximated_salvage_value' => $this->request->getVar('approximated_salvage_value'),
			'remark' => $this->request->getVar('remark'),
		];

		$job_request_id = $this->jobrequest_model->insertjobrequest($job_request,$job_id);

		if (!empty($job_request_id)) {
			$galleryImages = [];
			$returnData = [];
			$fileNames = [];
			$uploadPath = 'assets/uploads/';

			if ($imagefile = $this->request->getFiles()) {
				$i = 0;
				foreach ($imagefile['files'] as $img) {
					if ($img->isValid() && !$img->hasMoved()) {
						$fileNewName = $img->getRandomName();
						$filetype = $img->getClientMimeType();
						$fileNames[] = $fileNewName;
						$uploadedmage = $uploadPath . $fileNewName;
						$galleryImages[] = $uploadPath . $fileNewName;
						$img->move(FCPATH . $uploadPath, $fileNewName);
						$returnData[$i]['job_id'] = $job_request_id;
						$returnData[$i]['file_path'] = '/' . $uploadedmage;
						$returnData[$i]['doc_name'] = $fileNewName;
						$returnData[$i]['doc_type'] = $filetype;
						$returnData[$i]['document_size'] = filesize(FCPATH . $uploadedmage);
						$i++;
					}
				}
				$saveData = $this->jobrequest_doc_model->documentInsert($returnData);
			}
		}

		$id = $job_request_id - 1;
		$url = base_url() . '/requests/viewjob' . '/' . $id;
		return redirect()->to($url);
		die();
	}
}
