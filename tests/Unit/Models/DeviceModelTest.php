<?php

namespace Tests\Unit\Models;

require_once __DIR__ . '/../../TestCase.php';

use Tests\TestCase;
use \Mockery as m;
use App\Models\DeviceModel;

class DeviceModelTest extends TestCase
{
  protected $_paloDB;
  
  protected function setUp()
  {
    parent::setUp();
    $this->_paloDB = m::mock('\paloDB');
  }
  
  protected function tearDown()
  {
    m::close();
  }

  public function testItCountsAllDevices()
  {
    $query = "SELECT COUNT(id) AS total FROM `asterisk`.`devices` WHERE tech = ?";
    $parameters = ['sip'];
    
    $queryResult = [
      'total' => 10,
    ];
    
    $this->_paloDB->shouldReceive('getFirstRowQuery')
      ->once()
      ->with($query, true, $parameters)
      ->andReturn($queryResult);
    
    $model = new DeviceModel($this->_paloDB);
    
    $this->assertEquals($queryResult, $model->count());
  }

  public function testItGetsAllDevices()
  {
    $query = "SELECT user, description FROM `asterisk`.`devices` WHERE tech = ?";
    $parameters = ['sip'];
    
    $queryResult = [
      [
        'user' => $this->_faker->unique()->randomNumber(4, true),
        'description' => $this->_faker->name,
      ],
      [
        'user' => $this->_faker->unique()->randomNumber(4, true),
        'description' => $this->_faker->name,
      ],
      [
        'user' => $this->_faker->unique()->randomNumber(4, true),
        'description' => $this->_faker->name,
      ],
    ];
    
    $this->_paloDB->shouldReceive('fetchTable')
      ->once()
      ->with($query, true, $parameters)
      ->andReturn($queryResult);
    
    $model = new DeviceModel($this->_paloDB);
    
    $this->assertEquals($queryResult, $model->index());
  }
}
