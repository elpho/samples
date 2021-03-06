<?php
  namespace main;

  define('DEBUG', '1');
  require 'vendor/autoload.php';

  registerMain('main\\Index');

  class Index{
    /**
    * @foo(one, two)
    * @foo(, two)
    * @foo(hey, strange-things/are-happening*!)
    * @foo(baz=works, also)
    * @foo(bar=also, works)
    */
    public static function victim(){
    }

    public static function main($args=array()){
      $type = new \ReflectionClass(__CLASS__);
      $methodType = $type->getMethod('victim');

      $props = FooAnnotation::read($methodType);

      echo '<pre>';
      echo 'Found '.$props->length()." foo annotations:\n";
      foreach ($props as $prop) {
        echo "\nfoo\n  Bar: ".$prop->bar."\n  Baz: ".$prop->baz."\n\n";
      }
      echo '</pre>';
    }
  }
