<?php
  namespace main;

  use elpho\database\Entity;

  class SampleTable extends Entity{
    public function __construct(\PDO $connection=null){
      $this->setTable("sample_table");
      $this->setFieldList("name", "age");
      $this->setWritable(true);

      parent::__construct($connection);
    }
  }