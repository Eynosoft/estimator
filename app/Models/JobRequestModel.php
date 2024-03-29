<?php

namespace App\Models;
use CodeIgniter\Model;

class JobRequestModel extends Model
{
  protected $table = 'job_requests';
  protected $primaryKey = 'job_id';
  protected $allowedFields = ['request_id','assign_id', 'assessor', 'visit_date', 'pre_accident_condition', 'tyre_condition', 'speedo_reading', 'reservers', 'total_loss_type', 'estimated_market_value', 'approximated_salvage_value', 'remark','created_at', 'updated_at'];
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
  protected $db        			= false;

  function __construct()
  {
    parent::__construct();
    $this->db = \Config\Database::connect();
    //$this->documentation_model = new DocumentationModel();
  }
  //-----------------------------------------------------------------------------------------------//
  //insert requestor Starts

  public function insertjobrequest($data = null, $job_request_id = null)
  {
    try {
      if(!empty($job_request_id)) {
        if($this->update($job_request_id, $data)) {
        $query = $this->db->query('SELECT request_id FROM job_requests WHERE job_id = "'.$job_request_id.'" ');
        $request_data = $query->getResult();
        $request_id = $request_data[0]->request_id;

        $query_status_get = $this->db->query('SELECT status_timing FROM requestor WHERE id = "'.$request_id.'"');
        $timming_result = $query_status_get->getResult();
        $status_timing_result = $timming_result[0]->status_timing;

        $result_data = json_decode($status_timing_result);

        $statusarray = json_decode(json_encode($result_data), true);

        $updated_status = [
         'unassigned' => $statusarray['unassigned'],
         'pending' => $statusarray['pending'],
         'inprogress' => $statusarray['inprogress'],
         'completed' => date("d/m/Y h:i:sa"),
        ];

        $pending_status = json_encode($updated_status);
        $final_query = $this->db->query("UPDATE requestor SET status = 3, status_timing = '".$pending_status."' WHERE id = '".$request_id."'");
        return $job_request_id;
				} else {
					return $this->errors();
				}
      }
      else {
        if ($this->save($data)) {
        $job_id = $this->getInsertID();
        $query = $this->db->query('SELECT request_id FROM job_requests WHERE job_id = "'.$job_id.'" ');
        $request_data = $query->getResult();
        $request_id = $request_data[0]->request_id;

        $query_status_get = $this->db->query('SELECT status_timing FROM requestor WHERE id = "'.$request_id.'"');
        $timming_result = $query_status_get->getResult();
        $status_timing_result = $timming_result[0]->status_timing;

        $result_data = json_decode($status_timing_result);

        $statusarray = json_decode(json_encode($result_data), true);

        $updated_status = [
         'unassigned' => $statusarray['unassigned'],
         'pending' => $statusarray['pending'],
         'inprogress' => date("d/m/Y h:i:sa"),
         'completed' => $statusarray['completed'],
        ];

        $pending_status = json_encode($updated_status);

        $final_query = $this->db->query("UPDATE requestor SET status = 2, status_timing = '".$pending_status."' WHERE id = '".$request_id."'");

        return $job_id;
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

}
