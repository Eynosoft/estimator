<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\RequestorModel;

class Reports extends BaseController
{

	protected $customer_model = null;
	protected $requestor_model = null;

	function __construct()
	{
		$this->customer_model = new CustomerModel();
		$this->requestor_model = new RequestorModel();
		$this->session = \Config\Services::session();
		$this->session->start();
	}

	public function index()
	{
		if (!logged_in()) {
			return redirect()->to(base_url(route_to('/')));
		}
		$context = [
			'username' => user()->username,
		];
		$context['customer'] = $this->customer_model->setCustomerDropdown();
		return view('reports', $context);
	}

	public function estimation_report()
	{
		$estimation_data = [
			'customer' => $this->request->getVar('customer'),
			'from_date' => $this->request->getVar('form_date'),
			'till_date' => $this->request->getVar('till_date'),
			'assigned' => $this->request->getVar('assigned'),
			'unassigned' => $this->request->getVar('unassigned'),
			'status_finished' => $this->request->getVar('status_finished'),
			'status_pending' => $this->request->getVar('status_pending'),
			'status_completed' => $this->request->getVar('status_completed'),
			'status_progress' => $this->request->getVar('status_progress'),
		];

		$result = $this->requestor_model->estimation_report($estimation_data);
		$dompdf = new \Dompdf\Dompdf();
		//$dompdf->loadHtml($result);
		//$dompdf->loadHtml(view('pdf/view_estimation_report', ["estimation_report" => $result]));
		$dompdf->loadHtml(view('pdf/estimation_report_status', ["estimation_report" => $result]));
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();
		ob_end_clean();
		$dompdf->stream("estimation_report_status.pdf", array("Attachment" => 0));
		//for preview attachment will be 0 and for download the pdf attachment should be 1
		exit(0);
		//$dompdf->stream('estimation_report' .time());
	}

}
