<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class RequestorModel extends Model
{

  protected $table = 'requestor';
  protected $primaryKey = 'id';
  protected $allowedFields = ['request_no', 'customer', 'requested_date', 'requestor', 'vehicle', 'garage', 'insured_reference', 'date_accident', 'policy_number', 'claim_number', 'inspection', 'insured_amount', 'exemption_amount', 'responsibility', 'liability', 'created_at', 'updated_at'];

  protected $skipValidation   = false;
  protected $allowCallbacks       = true;
  protected $beforeInsert         = [];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];
  protected $db              = false;


  function __construct()
  {
    parent::__construct();
    $this->db = \Config\Database::connect();
    //$this->documentation_model = new DocumentationModel();
  }

  //-----------------------------------------------------------------------------------------------//
  //insert requestor Starts

  public function insertrequestor($data = null, $id = null)
  {
    try {
      if (!empty($id)) {
        if ($this->update($this->update($id, $data))) {
          return true;
        } else {
          return $this->errors();
        }
      } else {
        if ($this->save($data)) {
          $request_id = $this->getInsertID();
          return $request_id;
        } else {
          return $this->errors();
        }
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Insert Requestor Ends
  //------------------------------------------------------------------------------------------------//


  // Get report

  public function getFinalReport($id = null)
  {
    try {
      $customer = new CustomerModel();
      $users = new UsersModel();
      $vehicle = new VehicleModel();
      $garage = new GarageModel();
      $job_labours = new JobRequestLabourModel();
      $job_parts = new JobRequestPartsModel();

      $this->table('requestor');
      $this->select('*');
      $this->join('request_assign_job', 'request_assign_job.requestor_id = requestor.id');
      $this->join('job_requests', 'job_requests.request_id=requestor.id');
      $this->where('requestor.id', $id);
      $requestors =  $this->findAll();

      if (!empty($requestors)) {
        foreach ($requestors as $jobs) {
          $returndata['id'] =  $jobs['id'];
          $returndata['request_no'] = $jobs['request_no'];
          $customer_data = !empty($jobs['customer']) ? $customer->getCustomerNameById($jobs['customer']) : 'N/A';
          $returndata['customer'] = $customer_data;
          $returndata['requested_date'] = $jobs['requested_date'];
          $returndata['requestor'] =  $jobs['requestor'];
          $vehicle_data = !empty($jobs['vehicle']) ? $vehicle->getVehicleDataById($jobs['vehicle']) : 'N/A';
          $returndata['vehicle'] = $vehicle_data;

          $labours_data = !empty($jobs['job_id']) ? $job_labours->getJobLaboursDataById($jobs['job_id']) : 'N/A';

          $returndata['labours_data'] = $labours_data;

          $parts_data = !empty($jobs['job_id']) ? $job_parts->getPartsDataById($jobs['job_id']) : 'N/A';
          $returndata['parts_data'] = $parts_data;

          $garage_data = !empty($jobs['garage']) ? $garage->getGarageNameById($jobs['garage']) : 'N/A';
          $returndata['garage'] = $garage_data;

          $returndata['insured_reference'] = $jobs['insured_reference'];
          $returndata['date_accident'] = $jobs['date_accident'];
          $returndata['policy_number'] = $jobs['policy_number'];
          $returndata['claim_number'] = $jobs['claim_number'];
          $returndata['inspection'] = $jobs['inspection'];
          $returndata['insured_amount'] = $jobs['insured_amount'];
          $returndata['exemption_amount'] = $jobs['exemption_amount'];
          $returndata['responsibility'] = $jobs['responsibility'];
          $returndata['liability'] = $jobs['liability'];
          $returndata['status'] = $jobs['status'];
          $returndata['created_at'] = date("d/m/Y h:i a", strtotime($jobs['created_at']));
          $returndata['assign_id'] = $jobs['assign_id'];
          $assessor_data = !empty($jobs['assessor']) ? $users->getusersNameById($jobs['assessor']) : 'N/A';
          $returndata['assessor'] = $assessor_data;
          $returndata['assign_note'] = $jobs['assign_note'];
          $returndata['visit_date'] = $jobs['visit_date'];
          $returndata['pre_accident_condition'] = $jobs['pre_accident_condition'];
          $returndata['tyre_condition'] = $jobs['tyre_condition'];
          $returndata['speedo_reading'] = $jobs['speedo_reading'];
          $returndata['reservers'] = $jobs['reservers'];
          $returndata['total_loss_type'] = $jobs['total_loss_type'];
          $returndata['estimated_market_value'] = $jobs['estimated_market_value'];
          $returndata['approximated_salvage_value'] = $jobs['approximated_salvage_value'];
          $returndata['remark'] = $jobs['remark'];
        }
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get report Data


  public function getAllStatusDashboard()
  {

    $returndata = [];
    try {
      $this->table('requestor');
      $this->select('*');
      $request_data =  $this->findAll();
      $assign_total =  $this->countAllResults();

      $unassigned_value = $this->db->query("select count(*) as total_unassigned from requestor where status='0'");
      $unassigned_data = $unassigned_value->getResult();
      $unassigned_result = $unassigned_data[0]->total_unassigned;

      $assign_value = $this->db->query("select count(*) as total_assign from requestor where status>=1");
      $assign_data = $assign_value->getResult();
      $assign_result = $assign_data[0]->total_assign;

      $pending_value = $this->db->query("select count(*) as total_pending from requestor where status='1'");
      $pending_data = $pending_value->getResult();
      $pending_result = $pending_data[0]->total_pending;

      $progress_value = $this->db->query("select count(*) as total_inprogress from requestor where status='2'");
      $inprogress_data = $progress_value->getResult();
      $inprogress_result = $inprogress_data[0]->total_inprogress;

      $completed_value = $this->db->query("select count(*) total_completed from requestor where status='3'");
      $completed_data = $completed_value->getResult();
      $completed_result = $completed_data[0]->total_completed;

      if (!empty($request_data)) {
        $returndata['total_requests'] = $assign_total;
        $returndata['total_estimation'] = $assign_result;
        $returndata['unassigned_total'] = $unassigned_result;
        $returndata['assign_total'] = $assign_result;
        $returndata['pending_total'] = $pending_result;
        $returndata['inprogress'] = $inprogress_result;
        $returndata['completed'] = $completed_result;
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }


  // Get all assigned and unassigned data Status

  public function assignunassignAllData($status = null)
  {
    $requestors = new RequestorModel();
    $customer = new CustomerModel();
    $vehicle = new VehicleModel();
    $users = new UsersModel();
    $returndata = [];
    try {
      $this->table('requestor');
      $this->select('*');
      if ($status == 0) {
        $this->where('status', $status);
      } else {
        $this->where('status >=', $status);
      }
      $request_data =  $this->findAll();

      if (!empty($request_data)) {
        $i = 0;
        foreach ($request_data as $requestor) {
          $returndata[$i]['id'] = $requestor['id'];
          $customer_data = !empty($requestor['customer']) ? $customer->getCustomerNameById($requestor['customer']) : 'N/A';
          $returndata[$i]['customer'] = $customer_data;
          $returndata[$i]['requestor'] = $requestor['requestor'];
          $vehicle_data = !empty($requestor['vehicle']) ? $vehicle->getVehicleNameById($requestor['vehicle']) : 'N/A';
          $returndata[$i]['vehicle'] = $vehicle_data;
          $returndata[$i]['garage'] = $requestor['garage'];
          $returndata[$i]['insured_reference'] = $requestor['insured_reference'];
          $returndata[$i]['date_accident'] = $requestor['date_accident'];
          $returndata[$i]['policy_number'] = $requestor['policy_number'];
          $returndata[$i]['claim_number'] = $requestor['claim_number'];
          $returndata[$i]['inspection'] = $requestor['inspection'];
          $returndata[$i]['insured_amount'] = $requestor['insured_amount'];
          $returndata[$i]['exemption_amount'] = $requestor['exemption_amount'];
          $returndata[$i]['responsibility'] = $requestor['responsibility'];
          $returndata[$i]['liability'] = $requestor['liability'];
          $returndata[$i]['status'] = $requestor['status'];
          $returndata[$i]['created_at'] =  $requestor['created_at'];
          $i++;
        }
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get all assigned and unassigned data status


  // Get all assigned and unassigned data Starts

  public function assigstatus()
  {
    $returndata = [];
    try {
      $this->table('requestor');
      $this->select('*');
      $request_data =  $this->findAll();
      $assign_total =  $this->countAllResults();

      $unassigned_value = $this->db->query("select count(*) as total_unassigned from requestor where status='0'");
      $unassigned_data = $unassigned_value->getResult();
      $unassigned_result = $unassigned_data[0]->total_unassigned;

      $assign_value = $this->db->query("select count(*) as total_assign from requestor where status>=1");
      $assign_data = $assign_value->getResult();
      $assign_result = $assign_data[0]->total_assign;

      if (!empty($request_data)) {
        foreach ($request_data as $requestor) {
          $returndata['id'] = $requestor['id'];
          $returndata['status'] = $requestor['status'];
          $returndata['total'] = $assign_total;
          $returndata['assign_total'] = $assign_result;
          $returndata['unassigned_total'] = $unassigned_result;
          $returndata['created_at'] =  $requestor['created_at'];
        }
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }
  // Get all assigned and unassigned data ends

  // -----------------------------------------------------------------------------------------------//
  // Get Requestor all data Starts

  public function requestorGetAllData()
  {
    $requestors = new RequestorModel();
    $customer = new CustomerModel();
    $vehicle = new VehicleModel();
    $users = new UsersModel();
    $returndata = [];
    try {
      $this->table('requestor');
      $this->select('*');
      $request_data =  $this->findAll();
      $assign_total =  $this->countAllResults();

      $unassigned_value = $this->db->query("select count(*) as total_unassigned from requestor where status='0'");
      $unassigned_data = $unassigned_value->getResult();
      $unassigned_result = $unassigned_data[0]->total_unassigned;

      $assign_value = $this->db->query("select count(*) as total_assign from requestor where status>=1");
      $assign_data = $assign_value->getResult();
      $assign_result = $assign_data[0]->total_assign;

      if (!empty($request_data)) {
        $i = 0;
        foreach ($request_data as $requestor) {
          $returndata[$i]['id'] = $requestor['id'];
          $customer_data = !empty($requestor['customer']) ? $customer->getCustomerNameById($requestor['customer']) : 'N/A';
          $returndata[$i]['customer'] = $customer_data;
          $returndata[$i]['requestor'] = $requestor['requestor'];
          $vehicle_data = !empty($requestor['vehicle']) ? $vehicle->getVehicleNameById($requestor['vehicle']) : 'N/A';
          $returndata[$i]['vehicle'] = $vehicle_data;
          $returndata[$i]['garage'] = $requestor['garage'];
          $returndata[$i]['insured_reference'] = $requestor['insured_reference'];
          $returndata[$i]['date_accident'] = $requestor['date_accident'];
          $returndata[$i]['policy_number'] = $requestor['policy_number'];
          $returndata[$i]['claim_number'] = $requestor['claim_number'];
          $returndata[$i]['inspection'] = $requestor['inspection'];
          $returndata[$i]['insured_amount'] = $requestor['insured_amount'];
          $returndata[$i]['exemption_amount'] = $requestor['exemption_amount'];
          $returndata[$i]['responsibility'] = $requestor['responsibility'];
          $returndata[$i]['liability'] = $requestor['liability'];
          $returndata[$i]['status'] = $requestor['status'];
          $returndata[$i]['total'] = $assign_total;
          $returndata[$i]['assign_total'] = $assign_result;
          $returndata[$i]['unassigned_total'] = $unassigned_result;
          $returndata[$i]['created_at'] =  $requestor['created_at'];
          $i++;
        }
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get Requestor All data ends
  // ---------------------------------------------------------------------------------------------//

  public function requestorGetAllDataById($id = null)
  {
    $requestors = new RequestorModel();
    try {
      return $requestors->find($id);
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }


  // Assigned Data


  // Get All Data according to the status wise

  public function getDataStatusWise($status = null)
  {
    try {

      $customer = new CustomerModel();
      $users = new UsersModel();
      $vehicle = new VehicleModel();
      $garage = new GarageModel();

      $this->table('requestor');
      $this->select('*');
      $this->join('request_assign_job', 'request_assign_job.requestor_id = requestor.id');
      $this->where('requestor.status', $status);
      $requestors =  $this->findAll();

      if (!empty($requestors)) {
        $i = 0;
        foreach ($requestors as $jobs) {
          $returndata[$i]['id'] =  $jobs['id'];
          $customer_data = !empty($jobs['customer']) ? $customer->getCustomerNameById($jobs['customer']) : 'N/A';
          $returndata[$i]['customer'] = $customer_data;
          $returndata[$i]['request_no'] = $jobs['request_no'];
          $returndata[$i]['requestor'] =  $jobs['requestor'];
          $returndata[$i]['assign_id'] = $jobs['assign_id'];
          $returndata[$i]['assign_note'] = $jobs['assign_note'];
          $returndata[$i]['visit_date'] = $jobs['visit_date'];
          $returndata[$i]['requested_date'] = $jobs['requested_date'];
          $assessor_data = !empty($jobs['assessor']) ? $users->getusersNameById($jobs['assessor']) : 'N/A';
          $returndata[$i]['assessor'] = $assessor_data;
          $vehicle_data = !empty($jobs['vehicle']) ? $vehicle->getVehicleNameById($jobs['vehicle']) : 'N/A';
          $returndata[$i]['vehicle'] = $vehicle_data;
          $garage_data = !empty($jobs['garage']) ? $garage->getGarageNameById($jobs['garage']) : 'N/A';
          $returndata[$i]['garage'] = $garage_data;
          $returndata[$i]['insured_reference'] = $jobs['insured_reference'];
          $returndata[$i]['date_accident'] = $jobs['date_accident'];
          $returndata[$i]['policy_number'] = $jobs['policy_number'];
          $returndata[$i]['claim_number'] = $jobs['claim_number'];
          $returndata[$i]['inspection'] = $jobs['inspection'];
          $returndata[$i]['insured_amount'] = $jobs['insured_amount'];
          $returndata[$i]['exemption_amount'] = $jobs['exemption_amount'];
          $returndata[$i]['responsibility'] = $jobs['responsibility'];
          $returndata[$i]['liability'] = $jobs['liability'];
          $returndata[$i]['created_at'] = date("d/m/Y h:i a", strtotime($jobs['created_at']));
          $returndata[$i]['status'] = $jobs['status'];
          $i++;
        }
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

//  Get all Data According to teh status wise


  // Get all Data for the count all data status

  public function countAlljobstatus()
  {
    try {

      $this->table('requestor');
      $this->select('*');
      $this->join('request_assign_job', 'request_assign_job.requestor_id = requestor.id');
      $requestors =  $this->findAll();
      $total_data = count($requestors);

      $pending = $this->db->query("select count(*) as total_pending from requestor where status='1'");
      $pending_data = $pending->getResult();
      $pending_result = $pending_data[0]->total_pending;

      $inprogress = $this->db->query("select count(*) as total_inprogress from requestor where status='2'");
      $inprogress_data = $inprogress->getResult();
      $inprogress_result = $inprogress_data[0]->total_inprogress;

      $completed = $this->db->query("select count(*) as total_completed from requestor where status='3'");

      $completed_data = $completed->getResult();
      $completed_result = $completed_data[0]->total_completed;

      if (!empty($requestors)) {
        foreach ($requestors as $jobs) {
          $returndata['id'] =  $jobs['id'];
          $returndata['status'] = $jobs['status'];
          $returndata['total_data'] = $total_data;
          $returndata['pending'] = $pending_result;
          $returndata['inprogress'] = $inprogress_result;
          $returndata['completed'] = $completed_result;
        }
      }
      return $returndata;

    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

// Get all data for the count all data status ends

public function getAllRequestData()
{
  try {
      $customer = new CustomerModel();
      $users = new UsersModel();
      $vehicle = new VehicleModel();
      $garage = new GarageModel();

      $this->table('requestor');
      $this->select('*');
      $this->join('request_assign_job', 'request_assign_job.requestor_id = requestor.id');
      $requestors =  $this->findAll();

      $total_data = count($requestors);

      $pending = $this->db->query("select count(*) as total_pending from requestor where status='1'");
      $pending_data = $pending->getResult();
      $pending_result = $pending_data[0]->total_pending;

      $inprogress = $this->db->query("select count(*) as total_inprogress from requestor where status='2'");
      $inprogress_data = $inprogress->getResult();
      $inprogress_result = $inprogress_data[0]->total_inprogress;

      $completed = $this->db->query("select count(*) as total_completed from requestor where status='3'");
      $completed_data = $completed->getResult();
      $completed_result = $completed_data[0]->total_completed;

      if (!empty($requestors)) {
        $i = 0;
        foreach ($requestors as $jobs) {
          $returndata[$i]['id'] =  $jobs['id'];
          $customer_data = !empty($jobs['customer']) ? $customer->getCustomerNameById($jobs['customer']) : 'N/A';
          $returndata[$i]['customer'] = $customer_data;
          $returndata[$i]['request_no'] = $jobs['request_no'];
          $returndata[$i]['requestor'] =  $jobs['requestor'];
          $returndata[$i]['assign_id'] = $jobs['assign_id'];
          $returndata[$i]['assign_note'] = $jobs['assign_note'];
          $returndata[$i]['visit_date'] = $jobs['visit_date'];
          $returndata[$i]['requested_date'] = $jobs['requested_date'];
          $assessor_data = !empty($jobs['assessor']) ? $users->getusersNameById($jobs['assessor']) : 'N/A';
          $returndata[$i]['assessor'] = $assessor_data;
          $vehicle_data = !empty($jobs['vehicle']) ? $vehicle->getVehicleNameById($jobs['vehicle']) : 'N/A';
          $returndata[$i]['vehicle'] = $vehicle_data;
          $garage_data = !empty($jobs['garage']) ? $garage->getGarageNameById($jobs['garage']) : 'N/A';
          $returndata[$i]['garage'] = $garage_data;
          $returndata[$i]['insured_reference'] = $jobs['insured_reference'];
          $returndata[$i]['date_accident'] = $jobs['date_accident'];
          $returndata[$i]['policy_number'] = $jobs['policy_number'];
          $returndata[$i]['claim_number'] = $jobs['claim_number'];
          $returndata[$i]['inspection'] = $jobs['inspection'];
          $returndata[$i]['insured_amount'] = $jobs['insured_amount'];
          $returndata[$i]['exemption_amount'] = $jobs['exemption_amount'];
          $returndata[$i]['responsibility'] = $jobs['responsibility'];
          $returndata[$i]['liability'] = $jobs['liability'];
          $returndata[$i]['created_at'] = date("d/m/Y h:i a", strtotime($jobs['created_at']));
          $returndata[$i]['status'] = $jobs['status'];
          $returndata[$i]['total_data'] = $total_data;
          $returndata[$i]['pending'] = $pending_result;
          $returndata[$i]['inprogress'] = $inprogress_result;
          $returndata[$i]['completed'] = $completed_result;
          $i++;
        }
      }

    return $returndata;

    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Assigned Data ends

  public function requestGetDataById($id = null)
  {

    try {

      $customer = new CustomerModel();
      $users = new UsersModel();
      $vehicle = new VehicleModel();
      $garage = new GarageModel();

      $this->table('requestor');
      $this->select('*');
      $this->join('request_assign_job', 'request_assign_job.requestor_id = requestor.id');
      $this->where('requestor.id', $id);
      $requestors =  $this->findAll();

      if(!empty($requestors)) {

        foreach ($requestors as $requestor_data) {
          $returndata['id'] =  $requestor_data['id'];
          $customer_data = !empty($requestor_data['customer']) ? $customer->getCustomerNameById($requestor_data['customer']) : 'N/A';
          $returndata['customer'] = $customer_data;
          $returndata['request_no'] = $requestor_data['request_no'];
          $returndata['requestor'] =  $requestor_data['requestor'];
          $returndata['assign_id'] = $requestor_data['assign_id'];
          $returndata['assign_note'] = $requestor_data['assign_note'];
          $returndata['visit_date'] = $requestor_data['visit_date'];
          $returndata['requested_date'] = $requestor_data['requested_date'];
          $assessor_data = !empty($requestor_data['assessor']) ? $users->getusersNameById($requestor_data['assessor']) : 'N/A';
          $returndata['assessor'] = $assessor_data;
          $returndata['assessor_data'] = $requestor_data['assessor'];
          $vehicle_data = !empty($requestor_data['vehicle']) ? $vehicle->getVehicleNameById($requestor_data['vehicle']) : 'N/A';
          $returndata['vehicle'] = $vehicle_data;

          $garage_data = !empty($requestor_data['garage']) ? $garage->getGarageNameById($requestor_data['garage']) : 'N/A';

          $returndata['garage'] = $garage_data;

          $returndata['insured_reference'] = $requestor_data['insured_reference'];
          $returndata['date_accident'] = $requestor_data['date_accident'];
          $returndata['policy_number'] = $requestor_data['policy_number'];
          $returndata['claim_number'] = $requestor_data['claim_number'];
          $returndata['inspection'] = $requestor_data['inspection'];
          $returndata['insured_amount'] = $requestor_data['insured_amount'];
          $returndata['exemption_amount'] = $requestor_data['exemption_amount'];
          $returndata['responsibility'] = $requestor_data['responsibility'];
          $returndata['liability'] = $requestor_data['liability'];
          $returndata['status'] = $requestor_data['status'];
          $returndata['created_at'] =  $requestor_data['created_at'];

        }
      }
      else {
        $requestors_value = $this->where('id', $id)->findAll();
        if (!empty($requestors_value)) {

          foreach ($requestors_value as $requestor_data) {

            $returndata['id'] =  $requestor_data['id'];
            $customer_data = !empty($requestor_data['customer']) ? $customer->getCustomerNameById($requestor_data['customer']) : 'N/A';
            $returndata['customer'] = $customer_data;
            $returndata['request_no'] = $requestor_data['request_no'];
            $returndata['requestor'] =  $requestor_data['requestor'];
            $returndata['requested_date'] = $requestor_data['requested_date'];
            $vehicle_data = !empty($requestor_data['vehicle']) ? $vehicle->getVehicleNameById($requestor_data['vehicle']) : 'N/A';
            $returndata['vehicle'] = $vehicle_data;

            $garage_data = !empty($requestor_data['garage']) ? $garage->getGarageNameById($requestor_data['garage']) : 'N/A';
            $returndata['garage'] = $garage_data;

            $returndata['insured_reference'] = $requestor_data['insured_reference'];
            $returndata['date_accident'] = $requestor_data['date_accident'];
            $returndata['policy_number'] = $requestor_data['policy_number'];
            $returndata['claim_number'] = $requestor_data['claim_number'];
            $returndata['inspection'] = $requestor_data['inspection'];
            $returndata['insured_amount'] = $requestor_data['insured_amount'];
            $returndata['exemption_amount'] = $requestor_data['exemption_amount'];
            $returndata['responsibility'] = $requestor_data['responsibility'];
            $returndata['liability'] = $requestor_data['liability'];
            $returndata['status'] = $requestor_data['status'];
            $returndata['created_at'] =  $requestor_data['created_at'];
          }
        }
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  public function deleteRequestById($id = null)
  {
    try {
      $result = $this->where('id', $id)->delete($id);
      return $result;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
    return false;
  }

  // Select Reuqestor by Id

  // --------------------------------------------------------------------------------//

  // Get request Number

  public function getrequestNumber()
  {
    try {
      $query = $this->db->query('SELECT MAX(id) as request_id FROM requestor');
      $request_id = $query->getResult();
      $result_data = $request_id[0]->request_id;
      if (!empty($result_data)) {
        return $result_data + 1;
      } else {
        return 1;
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  //  Get request Number

  // Select Requestor by Id

  public function getJobRequestDataById($id)
  {
    try {

      $customer = new CustomerModel();
      $users = new UsersModel();
      $labours = new JobRequestLabourModel();
      $parts_data = new JobRequestPartsModel();

      $this->table('requestor');
      $this->select('job_requests.*');
      $this->join('job_requests', 'job_requests.request_id = requestor.id');
      $this->where('requestor.id', $id);
      $job_request =  $this->findAll();

      if (!empty($job_request)) {

        foreach ($job_request as $jobs) {
          $returndata['job_id'] =  $jobs['job_id'];
          $returndata['request_id'] = $jobs['request_id'];
          $returndata['assign_id'] = $jobs['assign_id'];
          $returndata['assessor'] = $jobs['assessor'];
          $returndata['visit_date'] = $jobs['visit_date'];
          $returndata['pre_accident_condition'] = $jobs['pre_accident_condition'];
          $returndata['tyre_condition'] = $jobs['tyre_condition'];
          $returndata['speedo_reading'] = $jobs['speedo_reading'];
          $returndata['reservers'] = $jobs['reservers'];
          $returndata['labours'] = !empty($jobs['job_id']) ? $labours->getJobLaboursDataById($jobs['job_id']) : 'N/A';
          $returndata['job_parts'] = !empty($jobs['job_id']) ? $parts_data->getPartsDataByJobId($jobs['job_id']) : 'N/A';
          $returndata['total_loss_type'] = $jobs['total_loss_type'];
          $returndata['estimated_market_value'] = $jobs['estimated_market_value'];
          $returndata['approximated_salvage_value'] = $jobs['approximated_salvage_value'];
          $returndata['status'] = $jobs['status'];
          $returndata['remark'] = $jobs['remark'];
        }
      }
      return $returndata;
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get final Report for estimation data

  public function estimation_report($estimation_data = null)
  {
    try {

      $vehicle = new VehicleModel();
      $customer = new CustomerModel();
      $returnData = [];

      if (!empty($estimation_data['customer']) || !empty($estimation_data['from_date']) || !empty($estimation_data['till_date']) || !empty($estimation_data['assigned']) || !empty($estimation_data['unassigned']) || !empty($estimation_data['status_finished']) || !empty($estimation_data['status_pending']) || !empty($estimation_data['status_completed']) || !empty($estimation_data['status_progress'])) {

        $where_status = '';
        $where_customer = '';

        if((isset($estimation_data['unassigned']) && ($estimation_data['unassigned'] == 0))) {
          $where_status .= "status='" . $estimation_data['unassigned'] . "' OR ";
        }

        if(!empty($estimation_data['status_finished'])) {
          $where_status .= "status='" . $estimation_data['status_finished'] . "' OR ";
        }

        if(!empty($estimation_data['status_pending'])) {
          $where_status .= "status='" . $estimation_data['status_pending'] . "' OR ";
        }

        if(!empty($estimation_data['status_progress'])) {
          $where_status .= "status='" . $estimation_data['status_progress'] . "' OR ";
        }

        if(!empty($estimation_data['status_completed'])) {
          $where_status .= "status='" . $estimation_data['status_completed'] . "' OR ";
        }

        if(!empty($where_status)) {
          $trimed_value = rtrim($where_status, "OR ");
          $where_in = '(' . $trimed_value . ')';
        }

        if(!empty($estimation_data['customer'])) {
          $where_customer .= "customer='" . $estimation_data['customer'] . "' ";
        }

      $where = $where_in . ' AND ' . $where_customer;

      // echo  "<pre>";
      // print_r($where);
      // die('####');

      $all_record =  $this->db->query('SELECT  * from requestor INNER JOIN job_requests on job_requests.request_id=requestor.id  where ' . $where . ' ');

      // echo $this->db->getLastQuery($all_record);
      // die('####');

        $total_data = $all_record->getResult();
        $result_data = json_decode(json_encode($total_data), true);

        // echo "<pre>";
        // print_r($result_data);
        // die('####');


        $i = 0;

        foreach ($result_data as $values) {
          $returnData[$i]['id'] = $values['id'];
          $returnData[$i]['requested_date'] = $values['requested_date'];
          $returnData[$i]['visit_date'] = $values['visit_date'];
          $returnData[$i]['request_no'] = $values['request_no'];
          $vehicle_data = !empty($values['vehicle']) ? $vehicle->getVehicleNameById($values['vehicle']) : 'N/A';
          $returnData[$i]['vehicle'] =  $vehicle_data;

          $customer_data = !empty($values['customer']) ? $customer->getCustomerNameById($values['customer']) : 'N/A';
          $returnData[$i]['customer'] = $customer_data;

          $returnData[$i]['requestor'] = $values['requestor'];
          $returnData[$i]['reservers'] = $values['reservers'];
          $i++;
        }

        return $returnData;
        // echo "<pre>";
        // print_r($returnData);
        // die('####');
      }
    } catch (\Exception $e) {
      die($e->getMessage());
    }
  }

  // Get final report for estimation data

}
