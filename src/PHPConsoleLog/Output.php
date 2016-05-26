<?php

namespace PHPConsoleLog;

class Output
{
      protected static $tag = 'script';

      public static function open($attrName, $attrValue)
      {
            return self::getTag(true, self::getAttribute($attrName, $attrValue));
      }

      public static function close()
      {
            return self::getTag();
      }

      protected static function getTag($isOpening = false, $attr = false)
      {
            $s = '<';
            $s .= $isOpening ? '' : '/';
            $s .= static::$tag;
            $s .= $attr ? ' ' . $attr : '';
            $s .= '>';
            return $s;
      }

      protected static function getAttribute($name, $value)
      {
            if($name && is_string($name)){
                  if(!$value) return $name;
                  return $name . '="' . $value . '"';
            }
            return false;
      }
}