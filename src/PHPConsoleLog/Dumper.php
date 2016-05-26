<?php

namespace PHPConsoleLog;

class Dumper
{
      protected $fn;
      protected $raw;
      protected $type;

      public function __construct($data)
      {
            $this->raw = $data;
            $this->type = $this->getType();
      }

      public function output()
      {
            return 'console.' . $this->fn . '(' . $this->getContent() . ');';
      }

      protected function getType()
      {
            $type = gettype($this->raw);
            if($type == 'double') return 'float';
            return $type;
      }

      protected function getContent()
      {
            switch ($this->type) {
                  case 'array':
                  case 'object':
                        return $this->makeParse( json_encode($this->raw) );
                        break;
                  case 'boolean':
                        return $this->raw ? 'true' : 'false';
                        break;
                  case 'string':
                        return $this->makeString( $this->raw );
                        break;
                  case 'NULL':
                        return 'null';
                        break;
                  case 'resource':
                        return $this->makeString('<PHP resource>');
                        break;
                  default:
                        return $this->raw;
                        break;
            }
      }

      protected function makeParse($s)
      {
            return 'JSON.parse(' . $this->makeString($s) . ')';
      }

      protected function makeString($s)
      {
            return '\'' . str_replace('\'', '\\\'', $s) . '\'';
      }
}