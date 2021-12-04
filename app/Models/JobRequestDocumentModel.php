<?php

namespace App\Models;
use CodeIgniter\Model;

class JobRequestDocumentModel extends Model
{
  protected $table = 'job_request_documents';
  protected $primaryKey = 'id';
  protected $allowedFields = ['job_id', 'doc_name', 'doc_type','file_path','created_at','updated_at'];
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


  function __construct()
  {
    parent::__construct();
    //$this->documentation_model = new DocumentationModel();
  }
  // -----------------------------------------------------------------------------------------------//
  // Get Requestor all data Starts

  function documentInsert($data = null) {
    try {
      foreach ($data as $docdata) {
      if ($this->save($docdata)) {
        //return true;
      }
      else {
        return $this->errors();
      }
    }
    return true;
    }
  catch (\Exception $e) {
      die($e->getMessage());
  }
}

public function getdocumentsByJobId($job_id = null) {
 try {
   $document = $this->where('job_id',$job_id)->findAll();
   return $document;
 } catch (\Exception $e) {
   die($e->getMessage());
 }
}


}
