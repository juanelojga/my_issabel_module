<?php

namespace Tests;

require_once __DIR__ . '/../bootstrap/bootstrap.php';
require_once __DIR__ . '/../vendor/autoload.php';

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
  protected $_faker;
  
  protected function setUp()
  {
    $this->_faker = \Faker\Factory::create();
  }
}
