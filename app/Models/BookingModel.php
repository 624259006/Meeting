<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

  protected $table = 'BOOKING';
  protected $primaryKey = 'B_ID';
  protected $allowedFields = ['B_ID', 'B_START_DATETIME', 'B_END_DATETIME', 'CREATE_AT', 'CREATE_BY', 'UPDATE_AT', 'UPDATE_BY', 'IS_ACTIVE'];

  public function get_allbooking()
  {
    // return $this->db
    // ->table('users')
    // ->set('Pic', null)
    // ->where('User_ID', $userId)
    // ->insert();
  }
}