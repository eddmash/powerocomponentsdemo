<?php


use App\Config\Powerorm;
use Eddmash\PowerOrm\Loader;

require_once 'vendor/autoload.php';

Loader::consoleRun(Powerorm::asArray());

