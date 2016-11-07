<?php
  namespace main;

  use elpho\lang\ProtoObject;

  class DispatcherHelper extends ProtoObject{
    public function DispatcherHelper(){}

    public function run(){
      $this->dispatchEvent(new EventHelper());
    }
  }
