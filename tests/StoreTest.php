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
      $name = "Fred's Footwear";
      $test_store = new Store($name, $id = 1);
      //Act
      $result = $test_store->getId();
      //Assert
      $this->assertEquals($id, $result);
    }

    function testGetName()
    {
      //Arrange
      $name = "Fred's Footwear";
      $test_store = new Store($name);
      $test_store->save();
      //Act
      $result = $test_store->getName();
      //Assert
      $this->assertEquals($name, $result);
    }

    function testSave()
    {
      // Arrange
      $name = "Fred's Footwear";
      $test_store = new Store($name);

      // Act
      $test_store->save();

      // Assert
      $this->assertEquals([$test_store], Store::getAll());
    }

  }
?>
