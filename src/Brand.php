<?php
  class Brand
  {
    private $name;
    private $id;

    function __construct($name, $id = null)
    {
      $this->name = $name;
      $this->id = $id;
    }

    function getId()
    {
      return (int) $this->id;
    }

    function getName()
    {
      return $this->name;
    }

    function setName($new_name)
    {
      $this->name = (string) $new_name;
    }

    function save()
    {
      $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->getName()}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    function addStore($new_store)
    {
      $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$this->getId()}, {$new_store->getId()});");
    }

    function getStores()
    {
      $returned_stores = $GLOBALS['DB']->query("SELECT stores.* FROM brands
        JOIN stores_brands ON (stores_brands.brand_id = brand.id)
        JOIN stores ON (stores.id = stores_brands.store_id)
        WHERE brands.id = {$this->getId()};");
      $stores = array();
      foreach($returned_stores as $store)
      {
        $id = $store['id'];
        $name = $store['name'];
        $new_store = new Store($name, $id);
        array_push($stores, $new_store);
      }
    }

    static function getAll()
    {
      $returned_brands = $GLOBALS['DB']->query("SELECT * FROM brands;");
      $brands = array();
      foreach($returned_brands as $author)
      {
        $name = $brand['name'];
        $id = $brand['id'];
        $new_brand = new Brand($name, $id);
        array_push($brands, $new_brand);
      }
      return $brands;
    }

    static function deleteAll()
    {
      $GLOBALS['DB']->exec("DELETE FROM brands;");
    }
  }
?>
