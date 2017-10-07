<?php

namespace App\Models;

use App\Models\Model;

class DeviceModel extends Model
{
  /**
   * Count rows of table devices
   * @param  string $extension  
   * @param  string $description
   * @return array             
   */
  public function count()
  {
    $query = "SELECT COUNT(id) AS total FROM `asterisk`.`devices` WHERE tech = ?";
    $parameters = ['sip'];

    return $this->fetchSingleRow($query, $parameters);
  }

  /**
   * Get sip devices
   * @param  string $extension  
   * @param  string $description
   * @param  string $limit      
   * @param  string $offset     
   * @return array             
   */
  public function index()
  {
    $query = "SELECT user, description FROM `asterisk`.`devices` WHERE tech = ?";
    $parameters = ['sip'];

    return $this->fetchRows($query, $parameters);
  }
}
