<?php

namespace PHPConsoleLog;

use PHPConsoleLog\Dump\Log;

class Console
{
      /**
       * The global console instance
       *
       * @var static
       */
      protected static $instance;

      /**
       * A buffer array containing all the console messages to be displayed.
       *
       * @var array
       */
      protected $container = [];

      /**
       * The script tag's attribute.
       *
       * @var string
       */
      protected $attributeName = 'data-php-console-log';

      /**
       * The script tag attribute's value.
       *
       * @var string
       */
      protected $attributeValue = 'true';


      public function setAttribute($name = null, $value = null)
      {
            if(is_string($name)){
                  $this->attributeName = $name;
                  $this->attributeValue = $value;
            }
            else $this->attributeName = false;
      }

      public function get()
      {
            return $this->container;
      }

      public function log($data)
      {
            $this->container[] = new Log($data);
      }

      public function clear()
      {
            $this->container = [];
      }

      public function exec()
      {
            echo $this->getScript();
      }

      public function getScript()
      {
            if(!count($this->container)) return null;
            $s = $this->makeOutput();
            $this->clear();
            return $s;
      }

      protected function makeOutput()
      {
            $s = Output::open($this->attributeName, $this->attributeValue);
            foreach ($this->container as $item) {
                  $s .= $item->output();
            }
            $s .= Output::close();
            return $s;
      }


      /**
       * Set the globally console instance.
       *
       * @return static
       */
      public static function getInstance()
      {
            if(!static::$instance) static::$instance = new self();
            return static::$instance;
      }
}