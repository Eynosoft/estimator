<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RequestorModel;
use App\Models\JobRequestModel;
use App\Models\JobRequestDocumentModel;
use App\Models\JobRequestLabourModel;
use App\Models\JobRequestPartsModel;

class Jobsestimation extends BaseController
{
	protected $request_model = null;
	protected $jobrequest_model = null;
	protected $jobrequest_doc_model = null;
	protected $jobrequest_labour = null;
	protected $jobrequest_parts = null;

	public function __construct()
	{
		$this->request_model = new RequestorModel();
		$this->jobrequest_model = new JobRequestModel();
		$this->jobrequest_doc_model = new JobRequestDocumentModel();
		$this->jobrequest_labour = new JobRequestLabourModel();
		$this->jobrequest_parts = new JobRequestPartsModel();
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

	// View Data According to the status wise

	public function jobstatus($status = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username' => user()->username,
		];

		$context['jobs_status_count'] = $this->request_model->countAlljobstatus();
		$context['job_row_data'] =  $this->request_model->getDataStatusWise($status);
		// echo "<pre>";
		// print_r($context['jobs_data']);
		// die('###');
		return view('job_status_home', $context);
	}

	// View Data According to the status wise
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

	$job_request_id = $this->jobrequest_model->insertjobrequest($job_request, $job_id);

	if (!empty($job_request_id)) {
	    $job_parts = [
				'job_id' => $job_request_id,
				'part_name' => $this->request->getVar('part_name'),
				'damage_type' => $this->request->getVar('damage_type'),
				'action_type' => $this->request->getVar('action_type'),
				'part_status' => $this->request->getVar('status'),
				'quantity' => $this->request->getVar('quantity'),
				'part_cost' => $this->request->getVar('part_cost'),
				'part_cost_vat' => $this->request->getVar('part_cost_vat'),
				'discount' => $this->request->getVar('discount'),
				'parts_vat' => $this->request->getVar('parts_vat'),
				'parts_note' => $this->request->getVar('notes'),
				'total_amount' => $this->request->getVar('total_parts')
			];
			$job_part_result = $this->jobrequest_parts->partsInsert($job_parts, $job_request_id);
		}

		if (!empty($job_request_id)) {
			$labours = [
				'job_id' => $job_request_id,
				'labour' => $this->request->getVar('labour'),
				'description_labour' => $this->request->getVar('description'),
				'cost' => $this->request->getVar('cost'),
				'cost_total' => $this->request->getVar('cost_total'),
				'vat_cost' => $this->request->getVar('total_cost'),
				'vat'  => $this->request->getVar('vat'),
			];
			$result = $this->jobrequest_labour->labourInsert($labours, $job_request_id);
		}


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
