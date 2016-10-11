<?php
  namespace main;

  require "vendor/autoload.php";
  require "vendor/elpho/elpho/startup.php";

  use elpho\lang\Object;

  class Index{
    public static final function main($args=array()){
      //Creating a object with powers to dispatch events (extends php.event.EventDispatcher)
      $dispatcher = new DispatcherHelper();

      //OPTION 1: Create a class to attach a method to the event
      $hardListener = new HardListener();

      //OPTION 2: Creates an anonymous function to serve as event listener
      $dynamicListener = function($event){
        print("<pre>");
        print("DynamicListener ".get_class($event)."'s target is ".$event->getTarget());
        print("</pre>");
      };

      //OPTION 3: Creates an dynamic object to attach a method to the event
      $otherListener = new Object();
      $otherListener->ouvir = function($self, $event){
        print("<pre>");
        print($self." listener method ".get_class($event)."'s target is ".$event->getTarget());
        print("</pre>");
      };

      //OPTION 1: Attaching the instance method as a listener to "EventHelper" event
      $dispatcher->addEventListener("main\\EventHelper", array($hardListener,'listeningMethod'));

      //OPTION 2: Attaching the function listener to the "EventHelper" event
      $dispatcher->addEventListener("main\\EventHelper", $dynamicListener);

      //OPTION 3: Attaching the dynamic instance method as a listener to "EventHelper" event
      $dispatcher->addeventListener("main\\EventHelper", array($otherListener, "ouvir"));

      //The run method inside our dispatcher calls "dispatch(new EventHelper())" on self
      $dispatcher->run();
    }
  }
