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

    function testSetName()
    {
      //Arrange
      $name = "Fred's Footwear";
      $test_store = new Store($name);
      $test_store->save();
      $new_name = "Lila's Loafers";
      //Act
      $test_store->setName($new_name);
      $result = $test_store->getName();
      //Assert
      $this->assertEquals($new_name, $result);
    }

    function testSave()
    {
      // Arrange
      $name = "Fred's Footwear";
      $test_store = new Store($name);
      // Act
      $test_store->save();
      $result = Store::getAll();
      // Assert
      $this->assertEquals([$test_store], $result);
    }

    function testUpdateName()
    {
      // Arrange
      $name = "Fred's Footwear";
      $test_store = new Store($name);
      $test_store->save();
      $new_name = "Lila's Loafers";
      // Act
      $test_store->updateName($new_name);
      // Assert
      $this->assertEquals($new_name, $test_store->getName());
    }

    function test_delete()
    {
      //Arrange
      $name1 = "Fred's Footwear";
      $test_store1 = new Store($name1);
      $test_store1->save();
      $name2 = "Lil's Loafers";
      $test_store2 = new Store($name2);
      $test_store2->save();
      $name3 = "Sally's Shoes";
      $test_store3 = new Store($name3);
      $test_store3->save();
      //Act
      $test_store2->delete();
      //Assert
      $this->assertEquals([$test_store1, $test_store3], Store::getAll());
    }

    function testGetAll()
    {
      //Arrange
      $name1 = "Fred's Footwear";
      $test_store1 = new Store($name1);
      $test_store1->save();
      $name2 = "Lila's Loafers";
      $test_store2 = new Store($name2);
      $test_brand2->save();
      $name3 = "Sally's Shoes";
      $test_store3 = new Store($name3);
      $test_store3->save();
      //Act
      $result = Brand::getAll();
      //Assert
      $this->assertEquals([$test_store1, $test_store2, $test_store3], $result);
    }

    function testDeleteAll()
    {
      //Arrange
      $name1 = "Fred's Footwear";
      $test_store1 = new Store($name1);
      $test_store1->save();
      $name2 = "Lila's Loafers";
      $test_store2 = new Store($name2);
      $test_brand2->save();
      $name3 = "Sally's Shoes";
      $test_store3 = new Store($name3);
      $test_store3->save();
      //Act
      Store::deleteAll();
      $result = Store::getAll();
      //Assert
      $this->assertEquals([], $result);
    }

    function test_find()
    {
      //Arrange
      $name1 = "Fred's Footwear";
      $test_store1 = new Store($name1);
      $test_store1->save();
      $name2 = "Lila's Loafers";
      $test_store2 = new Store($name2);
      $test_brand2->save();
      $name3 = "Sally's Shoes";
      $test_store3 = new Store($name3);
      $test_store3->save();
      //Act
      $result = Store::find($test_store2->getId());
      //Assert
      $this->assertEquals($test_store2, $result);
    }

    function test_getBrands()
    {
      //Arrange
      $name1 = "Fred's Footwear";
      $test_store1 = new Store($name1);
      $test_store1->save();
      $test_store1_id = $test_store1->getId();
      $name2 = "Lila's Loafers";
      $test_store2 = new Store($name2);
      $test_brand2->save();
      $test_store2_id = $test_store2->getId();

      $brand_name1 = "Nike";
      $test_brand1 = new Brand($name1);
      $test_brand1->save();
      $brand_name2 = "Saucony";
      $test_brand2 = new Brand($name2);
      $test_brand2->save();
      $brand_name3 = "Reebok";
      $test_brand3 = new Brand($name3);
      $test_brand3->save();
      //Act
      $result = $test_store1->getBrands();
      //Assert
      $this->assertEquals([$test_brand1, $test_brand3], $result);
    }
  }
?>
