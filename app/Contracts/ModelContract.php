<?php

namespace App\Contracts;

interface ModelContract
{
  /**
   * Method to to count rows
   * 
   * @return array
   */
  public function count();
  
  /**
   * Method to get rows
   * 
   * @return mixed
   */
  public function index();
}