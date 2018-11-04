<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

?>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= path('home.php') ?>">Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?= path('admin/users.php') ?>">Users <span class="sr-only">
                        </span></a></li>
                <li><a href="<?= path('admin/authors.php') ?>">Authors <span class="sr-only">(current)
                        </span></a></li>
                <li><a href="<?= path('admin/blogs.php') ?>">Blog</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Quering Examples <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= path('examples/filter.php') ?>">Filter</a></li>
                        <li><a href="<?= path('examples/orderby.php') ?>">Orderby</a></li>
                        <li><a href="<?= path('examples/m2m.php') ?>">Relationships</a></li>
                        <li><a href="<?= path('examples/serialization.php') ?>">Serialization</a></li>
                        <li><a href="<?= path('examples/aggregations.php') ?>">Aggregations</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
