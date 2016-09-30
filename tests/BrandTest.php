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

  class BrandTest extends PHPUnit_Framework_TestCase
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

    function testSetName()
    {
      //Arrange
      $name = "Nike";
      $test_brand = new Brand($name);
      $test_brand->save();
      $new_name = "Saucony";
      //Act
      $test_brand->setName($new_name);
      $result = $test_brand->getName();
      //Assert
      $this->assertEquals($new_name, $result);
    }

    function testSave()
    {
      // Arrange
      $name = "Nike";
      $test_brand = new Brand($name);
      $test_brand->save();
      // Act
      $result = Brand::getAll();
      // Assert
      $this->assertEquals([$test_brand], $result[0]);
    }

    function testGetStores()
    {
      //Arrange
      $name1 = "Nike";
      $test_brand1 = new Brand($name1);
      $test_brand1->save();
      $test_brand1_id = $test_brand1->getId();
      $name2 = "Saucony";
      $test_brand2 = new Brand($name2);
      $test_brand2->save();
      $test_brand2_id = $test_brand2->getId();

      $name1 = "Fred's Footwear";
      $test_store1 = new Store($name1);
      $test_store1->save();
      $test_store1->addStore($test_brand1)
      $name2 = "Lila's Loafers";
      $test_store2 = new Store($name2);
      $test_store2->save();
      $name3 = "Sally's Shoes";
      $test_store3 = new Store($name3);
      $test_store3->save();
      //Act
      $result = $test_brand2->getStores();
      //Assert
      $this->assertEquals([])
    }

    function testGetAll()
    {
      //Arrange
      $name1 = "Nike";
      $test_brand1 = new Brand($name1);
      $test_brand1->save();
      $name2 = "Saucony";
      $test_brand2 = new Brand($name2);
      $test_brand2->save();
      $name3 = "Reebok";
      $test_brand3 = new Brand($name3);
      $test_brand3->save();
      //Act
      $result = Brand::getAll();
      //Assert
      $this->assertEquals([$test_brand1, $test_brand2, $test_brand3], $result);
    }

    function testDeleteAll()
    {
      //Arrange
      $name1 = "Nike";
      $test_brand1 = new Brand($name1);
      $test_brand1->save();
      $name2 = "Saucony";
      $test_brand2 = new Brand($name2);
      $test_brand2->save();
      $name3 = "Reebok";
      $test_brand3 = new Brand($name3);
      $test_brand3->save();
      //Act
      Brand::deleteAll();
      $result = Brand::getAll();
      //Assert
      $this->assertEquals([], $result);
    }
  }
?>
