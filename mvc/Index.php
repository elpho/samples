<?php
  namespace main;

  require 'vendor/autoload.php';
  require 'vendor/elpho/elpho/startup.php';

  use elpho\mvc\Router;
  use main\controllers;

  class Index{
    public static final function main($args=array()){
      //starting the router singleton
      $router = Router::getInstance(__DIR__);
      //Router supports dependency injector
      //set one with `$router->setDependencyInjector($di)`

      //** Sample error view customization
      //ErrorController::$e500view = "e500.html";
      //ErrorController::$e404view = "e404.html";
      //ErrorController::$e401view = "e401.html";

      self::mapRoutes($router);

      //after everything is set, we "route" the request
      $router->serve();

      //More advanced features were used in the sample project below:
      // https://github.com/SparK-Cruz/elpho-experimental-project
    }

    private static function mapRoutes($router){
      //** Sample "get" route
      $router->map(array("", "home"), array("main\\controllers\\Home", "index"));
      $router->map("contact", array("main\\controllers\\Home", "contact"));

      //** Sample "post" route, other http methods work too
      $router->map("contact", array("main\\controllers\\Home", "sendEmail"), "post");

      //** Sample route with parameters
      //$router->map("blog/*post", array("main\\controllers\\Blog", "post"));
      //$router->map("blog/page/#page", array("main\\controllers\\Blog", "list"));
      //These will produce $args["post"] and $args["page"] respectively in their controllers' methods
      //notice that #page will only match for numbers while *post will match for anything except slashes

      //The Router also supports annotation routing, just add @route(path, method) to the doc comments
      //then call $router->mapFor("controller") and you are all set.
      //Methods can take multiple route annotations.
      //NOTE: Annotation routing is only supported on static methods for now
    }
  }