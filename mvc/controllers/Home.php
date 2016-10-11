<?php
  namespace main\controllers;

  use elpho\mvc\Controller;
  use elpho\mvc\View;

  class Home extends Controller{
    public static final function index($args){
      //the View class uses helper classes
      //by default you get the $url helper
      //you can register the helper class by calling:
      //View::addHelper("camelCased\\full\\path\\to\\class");
      //helper classes have all methods static:
      // $helperName::method(...)

      $view = new View("views/home/index.html.php");
      $view->render();
    }

    public static final function contact($args){
      $view = new View("views/home/contact.html.php");
      $view->resultMessage = "";
      $view->render();
    }

    public static final function sendEmail($args){
      self::allowMethods("post");

      $view = new View("views/home/contact.html.php");
      $view->resultMessage = "E-mail was not sent. But let's pretent it was ;)";
      $view->render();
    }
  }