<?php
  class Store
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
      return $this->id;
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
      $GLOBALS['DB']->exec("INSERT INTO stores (name) VALUES ('{$this->getName()}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    function addBrand($new_brand)
    {
      $GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$this->getId()}, {$new_brand->getId()});");
    }

    function getBrands()
    {
      $returned_brands = $GLOBALS['DB']->query("SELECT brands.* FROM stores
        JOIN stores_brands ON (stores_brands.store_id = store.id)
        JOIN stores ON (brands.id = stores_brands.store_id)
        WHERE stores.id = {$this->getId()};");
      $brands = array();
      foreach($returned_brands as $brand)
      {
        $id = $brand['id'];
        $name = $brand['name'];
        $new_brand = new Brand($name, $id);
        array_push($brands, $new_brand);
      }
    }

    static function getAll()
    {
      $returned_stores = $GLOBALS['DB']->query("SELECT * FROM stores;");
      $stores = array();
      foreach($returned_stores as $store)
      {
        $name = $store['name'];
        $id = $store['id'];
        $new_store = new Store($name, $id);
        array_push($stores, $new_store);
      }
      return $stores;
    }

    static function deleteAll()
    {
      $GLOBALS['DB']->exec("DELETE FROM stores;");
    }

  }
?>
