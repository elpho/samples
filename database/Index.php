<?php
  namespace main;

  require "vendor/autoload.php";
  registerMain('main\\Index');

  class Index{
    public static final function main($args=array()){
      $connection = self::connect();

      if ($connection == null)
        exit();

      $sample = new SampleTable($connection);
      $sample->find();

      if ($sample->getCount() === 0)
        self::populateDatabase($sample);

      echo "<pre>";
      $sample->each(function($entity){
        echo $entity->name." is ".$entity->age." years old\n";
      });
      echo "</pre>";
    }

    private static final function populateDatabase($sample){
      $sample->clear();
      $sample->name = "Roger";
      $sample->age = 25;
      $sample->save();

      $sample->clear();
      $sample->name = "Claudia";
      $sample->age = 21;
      $sample->save();
    }

    private static final function connect(){
      $connection = null;

      try{
        $connection = new \PDO("sqlite:db/sample.db3");
        $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      }catch(\PDOException $ex){
        echo "Falha ao conectar: ".utf8_encode($ex->getMessage());
      }

      return $connection;
    }
  }