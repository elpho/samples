<?php
  namespace main;

  require 'vendor/autoload.php';
  require 'vendor/elpho/elpho/startup.php';

  use elpho\lang\String;

  class HelloWorld{
    public static function main($args=array()){
      $word = new String("hello world!");
      print $word->capitalize();
    }
  }
