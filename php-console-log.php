<?php

require_once(__DIR__ . '/src/Dump.php');

$PHPConsoleLog = new PHPConsoleLog\Dump();

function consoleLog($data)
{
      global $PHPConsoleLog;
      $PHPConsoleLog->log($data);
}

function execConsoleLogs()
{
      global $PHPConsoleLog;
      $PHPConsoleLog->display();
}