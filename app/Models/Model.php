<?php

namespace App\Models;

use App\Contracts\ModelContract;
use App\Helpers\ExecuteQueryHelper;

abstract class Model implements ModelContract
{
  use ExecuteQueryHelper;

  /**
   * Conection to database
   * @var object
   */
  protected $_paloDB;

  /**
   * Create instance of object
   * @param \paloDB $paloDB
   */
  public function __construct(\paloDB $paloDB)
  {
    $this->_paloDB = $paloDB;
  }
}
