<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

  protected $table = 'USERS';
  protected $primaryKey = 'USER_ID';
  protected $allowedFields = ['USER_ID', 'FIRSTNAME', 'LASTNAME', 'ID_CARD', 'EMAIL', 'PASSWORD', 'PHONE', 'PROFILE_PATH', 'USER_POSITION', 'IP_ADDRESS', 'LAST_LOGIN', 'CREATE_AT', 'CREATE_BY', 'UPDATE_AT', 'UPDATE_BY', 'USER_ACTIVE'];

  public function create_user($array)
  {
    if (!empty($array)) {
      foreach ($array as $val) {
        $data = [
          'FIRSTNAME' => !empty($val['FIRSTNAME']) ? $val['FIRSTNAME'] : NULL,
          'LASTNAME' => !empty($val['LASTNAME']) ? $val['LASTNAME'] : NULL,
          'ID_CARD' => !empty($val['ID_CARD']) ? $val['ID_CARD'] : NULL,
          'EMAIL' => !empty($val['EMAIL']) ? $val['EMAIL'] : NULL,
          'PHONE' => !empty($val['PHONE']) ? $val['PHONE'] : NULL,
          'PASSWORD' => !empty($val['PASSWORD']) ? password_hash($val['PASSWORD'], PASSWORD_DEFAULT) : NULL,
          'USER_POSITION' => !empty($val['USER_POSITION']) ? $val['USER_POSITION'] : "Customer",
          'IP_ADDRESS' => !empty($val['IP_ADDRESS']) ? $val['IP_ADDRESS'] : NULL,
          'CREATE_AT' => !empty($val['CREATE_AT']) ? $val['CREATE_AT'] : date("Y-m-d H:i:s"),
          'CREATE_BY' => !empty($val['CREATE_BY']) ? $val['CREATE_BY'] : "-1",
          'USER_ACTIVE' => !empty($val['USER_ACTIVE']) ? $val['USER_ACTIVE'] : "1"
        ];
        return $this->insert($data);
      }
    } else {
      return false;
    }
  }
}