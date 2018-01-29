<?php

use Eddmash\PowerOrm\Application;

// ensure the classes are auto loaded
require_once 'vendor/autoload.php';

define("BASEPATH", dirname(__FILE__).DIRECTORY_SEPARATOR);
define("APPPATH", BASEPATH."app".DIRECTORY_SEPARATOR);

Application::consoleRun(\App\Config\Powerorm::asArray());
