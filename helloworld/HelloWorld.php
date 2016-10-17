<?php
  namespace main;

  require 'vendor/autoload.php';
  registerMain('main\\HelloWorld');

  use elpho\lang\String;

  class HelloWorld{
    public static function main($args=array()){
      $word = new String("hello world!");
      print $word->capitalize();
    }
  }
