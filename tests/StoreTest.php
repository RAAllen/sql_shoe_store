<?php

  /**
  *@backupGlobals disabled
  *@backupStaticAttributes disabled
  */

  require_once "src/Brand.php";
  require_once "src/Store.php";

  $server = 'mysql:host=localhost:8889;dbname=shoes_test';
  $username = 'root';
  $password = 'root';
  $DB = new PDO ($server, $username, $password);

  class StoreTest extends PHPUnit_Framework_TestCase
  {
    protected function tearDown()
    {
      Brand::deleteAll();
      Store::deleteAll();
    }

    function testGetId()
    {
      //Arrange
      $name = "Nike";
      $test_brand = new Brand($name, $id = 1);
      //Act
      $result = $test_brand->getId();
      //Assert
      $this->assertEquals($id, $result);
    }

    function testGetName()
    {
      //Arrange
      $name = "Nike";
      $test_brand = new Brand($name);
      $test_brand->save();
      //Act
      $result = $test_brand->getName();
      //Assert
      $this->assertEquals($name, $result);
    }

    function testSave()
    {
      // Arrange
      $name = "Nike";
      $test_brand = new Brand($name);

      // Act
      $test_brand->save();

      // Assert
      $this->assertEquals([$test_brand], Brand::getAll());
    }

  }
?>
