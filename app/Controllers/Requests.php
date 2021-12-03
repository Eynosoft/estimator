<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\RequestorModel;
use App\Models\UsersModel;
use App\Models\RequestAssignJobModel;
use App\Models\RequestPersonModel;
use App\Models\PersonDocumentModel;
use App\Models\JobRequestModel;
use App\Models\PartsModel;
use App\Models\PartsActionModel;

class Requests extends BaseController
{
	protected $customer_model = null;
	protected $request_model = null;
	protected $user_model = null;
	protected $assign_model = null;
	protected $request_person_model = null;
	protected $person_document_model = null;
	protected $job_request_model = null;
	protected $parts_model = null;
	protected $parts_action_model = null;

	public function __construct()
	{
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->customer_model = new CustomerModel();
		$this->request_model = new RequestorModel();
		$this->user_model = new UsersModel();
		$this->assign_model = new RequestAssignJobModel();
		$this->request_person_model = new RequestPersonModel();
		$this->person_document_model = new PersonDocumentModel();
		$this->job_request_model = new JobRequestModel();
		$this->parts_model = new PartsModel();
		$this->parts_action_model = new PartsActionModel();
	}

	//-------------------------------------------------------------------------------------------------//
	// Home Page For the request Starts

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['requestor'] = $this->request_model->requestorGetAllData();
		return view('jobs_estimation_list', $context);
	}

	// Home Page for the request Ends
	//-------------------------------------------------------------------------------------------------//

	public function requeststatus($status = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['assign_unassign'] = $this->request_model->assignunassignAllData($status);
		$context['assign_unassign_total'] = $this->request_model->assigstatus();
		return view('jobs_estimation_status_list', $context);
	}

//------------------------------------------------------------------------------------------------//
//create Method for the Request

	public function create()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['customer'] = $this->customer_model->setCustomerDropdown();
		return view('new_estimation_request', $context);
	}


// Create Method for the request Ends
//-------------------------------------------------------------------------------------------------//

//-------------------------------------------------------------------------------------------------//
// Update Request services starts

public function update($id = null)
{
	if (!logged_in()) {
		return redirect()->to(base_url(route_to('/')));
	}
	$context = [
		'username' => user()->username,
	];
	$context['requestor'] = $this->request_model->requestGetDataById($id);
	$context['customer'] = $this->customer_model->setCustomerDropdown();

		// echo "<pre>";
		// print_r($context);
		// die('###');
	return view('update_estimation_request', $context);
	}

	// Update Request Service Ends
	// -------------------------------------------------------------------------------------------------//

	// -------------------------------------------------------------------------------------------------//
	// Insert And Update Requestors

	public function store()
	{
		$check = $this->validate(
			[
				'customer' => 'required',
				'requested_date' => 'required',
				'requestor' => 'required',
			]
		);
		if (!$check) {
			return view('new_estimation_request', ['validation' => $this->validator]);
		} else {
			$id = $this->request->getPost('id');
			$data = [
				'customer' => $this->request->getVar('customer'),
				'requested_date' => $this->request->getVar('requested_date'),
				'requestor' => $this->request->getVar('requestor'),
			];
			if (!empty($id)) {
				$result = $this->request_model->insertrequestor($data, $id);
				//$_SESSION['message'] = 'success';
			} else {
				$result = $this->request_model->insertrequestor($data);
			}
			if($result) {
				$this->session->set('message', 'success');
			} else {
				$this->session->set('error', 'error');
			}
		}
		return $this->response->redirect(site_url('requests/'));
	}

// insert and update requestors Ends
//------------------------------------------------------------------------------------------------//


//------------------------------------------------------------------------------------------------//
// View Estimations By Id

	public function view_estimations($id = null)
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['requestor'] = $this->request_model->requestGetDataById($id);
		$context['person_data'] = $this->request_person_model->getPersonDataById($id);
		$context['person_doc'] = $this->person_document_model->getPersonDocDataById($id);
		$context['assessors'] = $this->user_model->getallusersData();
		return view('view_estimations', $context);
	}

// View Estimation Request by Id ends
//------------------------------------------------------------------------------------------------//

//------------------------------------------------------------------------------------------------//
// Delete of the estimation request starts

	public function delete_request($id = null)
	{
		if(!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$result = $this->request_model->deleteRequestById($id);
		if ($result) {
			$this->session->set('message', 'success');
		} else {
			$this->session->set('error', 'error');
		}
		$url = base_url() . '/requests';
		return redirect()->to($url);
}

//Delete of the estimation request Ends
//-------------------------------------------------------------------------------------------------//

//-------------------------------------------------------------------------------------------------//
//Assign a job to requestor Starts

public function assignJob()
  {

	  if(!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username' => user()->username,
		];

		$assign_id = $this->request->getVar('assign_id');

		$data = [
			'requestor_id' => $this->request->getVar('requestor_id'),
			'assessor' => $this->request->getVar('assessor'),
			'assign_note' => $this->request->getVar('notes'),
			'visit_date' => $this->request->getVar('visit_date'),
		];

		$result = $this->assign_model->insertAssignJob($data, $assign_id);

		if($result) {
			$this->session->set('message', 'asuccess');
		}else {
			$this->session->set('message', 'aerror');
		}
		$url = base_url() . '/requests/viewjob' . '/' . $data['requestor_id'];
		return redirect()->to($url);

  }

//Assign a job to a requestor Ends
//-------------------------------------------------------------------------------------------------//

public function request_store()
	{

		$request_no = $this->request_model->getrequestNumber();
		$length = 8;
		$string = substr(str_repeat(0, $length) . $request_no, -$length);
		$result_request_no = 'REQ' . $string;

		$status_timing = [
    'unassigned' => date("d/m/Y h:i:sa"),
    'pending' => '',
		'inprogress' => '',
		'completed' => '',
		];

		$request_data = [
			'request_no' => $result_request_no,
			'customer' => $this->request->getVar('customer'),
			'requested_date' => $this->request->getVar('requested_date'),
			'requestor' => $this->request->getVar('requestor'),
			'vehicle' => $this->request->getVar('vehicle'),
			'garage' => $this->request->getVar('garage'),
			'insured_reference' => $this->request->getVar('insured_reference'),
			'date_accident' => $this->request->getVar('date_accident'),
			'policy_number' => $this->request->getVar('policy_number'),
			'claim_number' => $this->request->getVar('claim_number'),
			'inspection' => $this->request->getVar('inspection'),
			'insured_amount' => $this->request->getVar('insured_amount'),
			'exemption_amount' => $this->request->getVar('exemption_amount'),
			'responsibility' => $this->request->getVar('responsibility'),
			'liability' => $this->request->getVar('liability'),
			'status_timing' => json_encode($status_timing),
  ];

$request_id = $this->request_model->insertrequestor($request_data);

// Person Document Data Starts
		if (!empty($request_id)) {
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
						$returnData[$i]['request_id'] = $request_id;
						$returnData[$i]['file_path'] = '/' . $uploadedmage;
						$returnData[$i]['document_name'] = $fileNewName;
						$returnData[$i]['document_type'] = $filetype;
						$returnData[$i]['document_size'] = filesize(FCPATH . $uploadedmage);
						$i++;
					}
				}
				$saveData = $this->person_document_model->documentInsert($returnData);
			}
	}

//Insert person data

		$person_data = [
			'person_type' => $this->request->getVar('person_type'),
			'person_name' => $this->request->getVar('person_name'),
			'person_number' => $this->request->getVar('person_number'),
		];

		$result = $this->request_person_model->insertPersonData($person_data, $request_id);
		// Insert person data
		$url = base_url() . '/requests';
		return redirect()->to($url);
		die();
}

/************************************************************************************/
/************************************************************************************/

public function viewjob($request_id = null)
{
	  if(!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}

		$context = [
			'username' => user()->username,
		];

		$context['requestor'] = $this->request_model->requestGetDataById($request_id);
		$context['part_action_options'] = $this->parts_action_model->setPartsactionDropdown();
		$context['job_request_data'] = $this->request_model->getJobRequestDataById($request_id);
		$context['assessors'] = $this->user_model->getallusersData();
		$context['part'] = $this->parts_model->setPartsDropdown();
		$context['person_data'] = $this->request_person_model->getPersonDataById($request_id);
		return view('view_job', $context);
}

	public function estimation_report($id = null)
	{
		$request_id = $id;
		$result = $this->request_model->getFinalReport($request_id);
		$dompdf = new \Dompdf\Dompdf();
		//$dompdf->loadHtml($result);
		//$dompdf->loadHtml(view('pdf/view_estimation_report', ["estimation_report" => $result]));
		$dompdf->loadHtml(view('pdf/view_estimation_report', ["estimation_report" => $result]));
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		$canvas = $dompdf->getCanvas();
		// Get height and width of page
		$w = $canvas->get_width();
		$h = $canvas->get_height();
		// Specify watermark image
		$imageURL = FCPATH . '/assets/draft/draft.jpg';
		$imgWidth = 600;
		$imgHeight = 350;
		// Set image opacity
		$canvas->set_opacity(0.3);
		// Specify horizontal and vertical position
		$x = (($w - $imgWidth) / 2);
		$y = (($h - $imgHeight) / 3);
		$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight, $resolution = "normal");
		ob_end_clean();
		$dompdf->stream("estimation_report.pdf", array("Attachment" => 0));
		//for preview attachment will be 0 and for download the pdf attachment should be 1
		exit(0);
		//$dompdf->stream('estimation_report' .time());
	}

//this is the method for the get final claim report for the claimantm

}
