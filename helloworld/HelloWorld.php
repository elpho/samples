<?php
  namespace main;

  require 'vendor/autoload.php';
  registerMain('main\\HelloWorld');

  use elpho\lang\Text;

  class HelloWorld{
    public static function main($args=array()){
      $word = new Text("hello world!");
      print $word->capitalize();
    }
  }
