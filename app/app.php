<?php

  require_once __DIR__.'/../vendor/autoload.php';
  require_once __DIR__.'/../src/Brand.php';
  require_once __DIR__.'/../src/Store.php';
  date_default_timezone_set('America/New_York');

  $app = new Silex\Application();

  $server = 'mysql:host=localhost:8889;dbname=hair_salon';
  $username = 'root';
  $password = 'root';
  $DB = new PDO($server, $username, $password);

  $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

  use Symfony\Component\HttpFoundation\Request;
  Request::enableHttpMethodParameterOverride();

  $app->get("/", function() use ($app)
    {
      return $app['twig']->render('home.html.twig');
    });

  $app->get("/brands", function() use ($app)
  {
    return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
  });

  $app->get("/stores", function() use ($app)
  {
    return $app['twig']->render('stores.html.twig', array('brands' => Store::getAll()));
  });

  $app->post("/add_brand", function() use ($app)
  {
    $new_brand = new Brand($_POST['add-brand']);
    $new_brand->save();
    if ($_POST['new_brand'] != '')
    {
        $new_brand = new Brand($_POST['add-brand']);
        $new_brand->save();
    }
    return $app['twig']->render('edit_brand.html.twig', array('brand' => Brand::find($id), 'stores' => Store::getAll()));
  });

  $app->post("/add_store", function() use ($app)
  {
    $new_store = new Store($_POST['add-store']);
    $new_store->save();
    if ($_POST['new_store'] != '')
    {
        $new_store = new Store($_POST['add-store']);
        $new_store->save();
    }
    return $app['twig']->render('edit_store.html.twig', array('store' => Store::find($id), 'brands' => Brand::getAll()));
  });

  $app->post("/delete_all_brands", function() use ($app)
  {
    Brand::deleteAll();
    return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
  });

  $app->post("/delete_all_stores", function() use ($app)
  {
    Store::deleteAll();
    return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
  });

  $app->post("/add_store_to_brand", function() use ($app)
  {
    if ($_POST['new-store'] != '')
    {
      $new_store = new Store($_POST['new-store']);
      $new_store->save();
      $brand->addStore($new_store);
    }
    if ($_POST['store_id'] != "0")
    {
      $store = Store::find($_POST['store_id']);
      $store->addBrand($store);
    }
    return $app['twig']->render('edit_brand.html.twig', array('brand' => Brand::find($id), 'stores' => Stores::getAll()));
  });

  $app->post("/add_brand_to_store", function() use ($app)
  {
    if ($_POST['new-brand'] != '')
    {
      $new_brand = new Brand($_POST['new-brand']);
      $new_brand->save();
      $store->addBrand($new_brand);
    }
    if ($_POST['brand_id'] != "0")
    {
      $brand = Brand::find($_POST['brand_id']);
      $brand->addStore($brand);
    }
    return $app['twig']->render('edit_store.html.twig', array('store' => Store::find($id), 'brands' => Brand::getAll()));
  });

  

  return $app;
?>
