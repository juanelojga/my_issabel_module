<?php

namespace App\Helpers;

trait ExecuteQueryHelper
{
  /**
   * Get rows of database
   * @param  string $query
   * @param  array $parameters
   * @return array
   */
  public function fetchRows($query, $parameters = [])
  {
    $result = $this->_paloDB->fetchTable($query, true, $parameters);
    return is_array($result) ? $result : [];
  }
  
  /**
   * Get single row of database
   * @param  string $query     
   * @param  array $parameters
   * @return mixed            
   */
  public function fetchSingleRow($query, $parameters = [])
  {
    $result = $this->_paloDB->getFirstRowQuery($query, true, $parameters);
    return is_array($result) && count($result) > 0 ? $result : null;
  }
  
  /**
   * Execute query in database
   * @param  string $query     
   * @param  array  $parameters
   * @return bool            
   */
  public function executeQuery($query, $parameters = [])
  {
    return $this->_paloDB->genQuery($query, $parameters);
  }
}
