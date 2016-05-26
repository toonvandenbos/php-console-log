<?php

namespace PHPConsoleLog;

class Service
{

      public static function __callStatic($method, $args)
      {
            $instance = Console::getInstance();

            if( !method_exists($instance, $method) ){
                  throw new \Exception('PHPConsoleLog - method "' . $method . '" does not exist.');
            }

            return call_user_func_array([$instance, $method], $args);
      }

}