<?php 
 
namespace App\Models;

use CodeIgniter\Model;

class RequestorModel extends Model 
{
  protected $table = 'requestor';
  protected $primaryKey = 'id';
  protected $allowedFields = ['customer', 'requested_date','requestor'];
    public function insertrequestor($id = null,$data = null)
    {
      try {
        $this->db->insert('requestor', $data);
        return $this->db->insert_id();
      } catch (\Exception $e) {
        die($e->getMessage());
      }
    }

}

?>
