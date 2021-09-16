<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{

  protected $table = 'job_estimation';
  protected $primaryKey = 'id';
  protected $allowedFields = ['created_at', 'updated_at'];
  protected $skipValidation   =    false;
  protected $allowCallbacks       = true;
  protected $beforeInsert         = [];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];


  function __construct()
  {
    parent::__construct();
  }

  //------------------------------------------------------------------------------------------------// 
  // Get Garage All Data Starts

  public function getAllJobData()
  {
    try {
      $request_data = new RequestorModel();
      $users_data = new UsersModel();
      $job_data = $request_data->requestorGetAllData();
      $i = 0;
      foreach ($job_data as $jobs) {
        $returnData[$i]['id'] = $jobs['id'];
        $returnData[$i]['assign_id'] = $jobs['assign_id'];
        $returnData[$i]['assign_note'] = $jobs['assign_note'];
        $returnData[$i]['visit_date'] = $jobs['visit_date'];
        $returnData[$i]['assessor'] = !empty($jobs['assessor']) ? $users_data->getusersNameById($jobs['assessor']) : '';
        $returnData[$i]['customer'] = $jobs['customer'];
        $returnData[$i]['requestor'] = $jobs['requestor'];
        $returnData[$i]['vehicle'] = $jobs['vehicle'];
        $returnData[$i]['garage'] = $jobs['garage'];
        $returnData[$i]['insured_reference'] = $jobs['insured_reference'];
        $returnData[$i]['date_accident'] = $jobs['date_accident'];
        $returnData[$i]['policy_number'] = $jobs['policy_number'];
        $returnData[$i]['claim_number'] = $jobs['claim_number'];
        $returnData[$i]['inspection'] = $jobs['inspection'];
        $returnData[$i]['insured_amount'] = $jobs['insured_amount'];
        $returnData[$i]['exemption_amount'] = $jobs['exemption_amount'];
        $returnData[$i]['responsibility'] = $jobs['responsibility'];
        $returnData[$i]['liability'] = $jobs['liability'];
        $returnData[$i]['created_at'] = date("d/m/Y h:i:sa", strtotime($jobs['created_at']));
        $i++;
      }
      return $returnData;
    }

    catch (\Exception $e) {
      die($e->getMessage());
    }

    return false;
  }

  // Get Garage ALl Data Ends
  // ----------------------------------------------------------------------------------------------//

}
