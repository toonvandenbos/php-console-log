<?php

require_once(__DIR__ . '/src/Dump.php');

$PHPConsoleLog = new PHPConsoleLog\Dump();

function consoleLog($data, $parseJs = true)
{
      global $PHPConsoleLog;
      $PHPConsoleLog->log($data, $parseJs);
}

function execConsoleLogs()
{
      global $PHPConsoleLog;
      $PHPConsoleLog->display();
}