<?php

namespace PHPConsoleLog;

class Dump
{
      protected $attributeName = 'data-php-console-log';
      protected $attributeValue = 'true';
      protected $container = [];

      public function setAttribute($name = false, $value = null)
      {
            if(is_string($name)){
                  $this->attributeName = $name;
                  $this->attributeValue = $value;
            }
            else{
                  $this->attributeName = false;
            }
      }

      public function log($data)
      {
            $this->container[] = $this->getLog($data);
      }

      public function get()
      {
            return $this->container;
      }

      public function clear()
      {
            $this->container = [];
      }

      public function display()
      {
            echo $this->getScript();
      }

      public function getScript()
      {
            if(!count($this->container)) return null;
            $html = $this->getOpeningTag();
            foreach ($this->container as $log) {
                  $html .= $this->getConsoleLog($log);
            }
            $html .= $this->getClosingTag();
            $this->clear();
            return $html;
      }

      protected function getLog($data)
      {
            $o = new \stdClass();
            $o->type = $this->getValueType($data);
            $o->value = $data;
            $o->hasParse = true;
            return $o;
      }

      protected function getValueType($data)
      {
            $type = gettype($data);
            if($type == 'double') return 'float';
            return $type;
      }

      protected function getOpeningTag()
      {
            $s = '<script type="text/javascript"';
            if($this->attributeName){
                  $s .= ' ' . $this->attributeName;
                  $s .= !is_null($this->attributeValue) ? '="' . $this->attributeValue . '"' : '';
            }
            $s .= '>';
            return $s;
      }

      protected function getClosingTag()
      {
            return '</script>';
      }

      protected function getConsoleLog($log)
      {
            $s = 'console.log(';
            $s .= $this->getParsedLog($log);
            $s .= ');';
            return $s;
      }

      protected function getParsedLog($log)
      {
            switch ($log->type) {
                  case 'array':
                  case 'object':
                        return $this->makeDecode( json_encode($log->value) );
                        break;
                  case 'boolean':
                        return $log->value ? 'true' : 'false';
                        break;
                  case 'string':
                        return $this->makeString( $log->value );
                        break;
                  case 'NULL':
                        return 'null';
                        break;
                  case 'resource':
                        return $this->makeString('<PHP resource>');
                        break;
                  default:
                        return $log->value;
                        break;
            }
      }

      protected function makeDecode($s)
      {
            return 'JSON.parse(' . $this->makeString($s) . ')';
      }

      protected function makeString($s)
      {
            return '\'' . str_replace('\'', '\\\'', $s) . '\'';
      }
}