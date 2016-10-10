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
    if ($_POST['new_store'] != '')
    {
        $new_brand = new Brand($_POST['add-brand']);
        $new_brand->save();
    }
    return $app['twig']->render('edit_brand.html.twig', array('brands' => Brand::getAll(), 'stores' => Store::getAll()));
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
    return $app['twig']->render('edit_store.html.twig', array('stores' => Store::getAll(), 'brands' => Brand::getAll()));
  });

  return $app;
?>
