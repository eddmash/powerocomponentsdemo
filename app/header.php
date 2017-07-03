<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
$baseDir = dirname(dirname(__FILE__));
require $baseDir.'/vendor/autoload.php';

define("BASEPATH", $baseDir.DIRECTORY_SEPARATOR);
define("APPPATH", BASEPATH."app".DIRECTORY_SEPARATOR);
// register exception and error handler
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

// load the orm
\Eddmash\PowerOrm\Application::webRun(\App\Config\Powerorm::asArray());
$debugRenderer = \Eddmash\PowerOrm\BaseOrm::getDebugbarRenderer();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php echo $debugRenderer->renderHead();?>

</head>
<body>