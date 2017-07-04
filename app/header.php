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
$whoops->pushHandler(new \Whoops\Handler\PlainTextHandler());
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
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css">
    <script src="/assets/bootstrap/js/bootstrap.js"></script>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/app/index.php">Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/app/admin/authors.php">Authors <span class="sr-only">(current)
                        </span></a></li>
                <li><a href="/app/admin/entries.php">Articles</a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">