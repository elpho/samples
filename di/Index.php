<?php
  namespace main;

  require 'vendor/autoload.php';
  registerMain('main\\Index');

  use elpho\di\DependencyInjector;

  class Index{
    public static function main($args=array()){
      $di = new DependencyInjector();
      $di->registerProvider('main\\HelperServiceProvider');

      $target = $di->inject('main\\HelperTarget');
      $target2 = $di->inject(new \ReflectionClass('main\\HelperTarget'));

      echo "t1: ".$target->getResult()."<br/>";
      echo "t2: ".$target2->getResult()."<br/>";
      echo "t1m: ".$di->inject(array($target,'injectableMethod'));
    }
  }