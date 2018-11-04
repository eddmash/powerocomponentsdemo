<?php


use Eddmash\PowerOrm\Loader;

require_once 'vendor/autoload.php';
$configs = require 'config.php';

Loader::consoleRun($configs);

