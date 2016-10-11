<?php
  namespace main;

  use elpho\lang\Annotation;

  class FooAnnotation extends Annotation{
    protected static $name = "foo";
    protected static $parameters = array("bar", "baz");
  }
