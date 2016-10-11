<?php
  namespace main;

  use elpho\di\DependencyProvider;

  class HelperServiceProvider implements DependencyProvider{
    private static $instance = null;

    public static function getProvidedClassName(){
      return 'HelperService';
    }

    public static function getInstance(){
      //only the provider knows the recipy to build this singleton
      if(self::$instance == null)
        self::$instance = new HelperService(rand(10,99), "coming from the provider");
      return self::$instance;
    }
  }