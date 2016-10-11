<?php
  namespace main;

  use elpho\lang\Object;

  class DispatcherHelper extends Object{
    public function DispatcherHelper(){}

    public function run(){
      $this->dispatchEvent(new EventHelper());
    }
  }
