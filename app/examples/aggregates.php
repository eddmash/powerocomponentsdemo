<?php
/**
 * This file is part of the powerocomponentsdemo package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use function Eddmash\PowerOrm\Model\Query\Expression\q_;
use function Eddmash\PowerOrm\Model\Query\Expression\or_;
use function Eddmash\PowerOrm\Model\Query\Expression\not_;
use function Eddmash\PowerOrm\Model\Query\Expression\f_;
use function Eddmash\PowerOrm\Model\Query\Expression\count_;
use function Eddmash\PowerOrm\Model\Query\Expression\func_;

require_once "header.php"; ?>


    <div class="jumbotron">`
        <h1>Welcome You</h1>
        <p>A simple blog system that show case some usage of the
            <strong>powerorm</strong> and <strong>powerform</strong> components</p>
        <p>you can also use powerormfaker to generate data if your lazy</p>
    </div>

<h4>Order By</h4>
<?php

$users = \App\Models\Blog::objects()->orderBy(array("author"));
dump($users);
?>
<!--<h4>Annotate Model</h4>-->
<?php
//$users = \App\Models\Blog::objects()->annotate([
//    'total' => count_("*")
//]);
//dump($users[0]->total);?>

<?php
require_once "footer.php";
