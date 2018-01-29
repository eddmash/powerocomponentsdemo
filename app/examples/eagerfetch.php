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

require_once "../header.php"; ?>

<h4>Using select Related</h4>
<?php
$users = \App\Models\Blog::objects()->selectRelated(['author'])->exclude(['id__in'=>[1, 10, 11, 13, 15, 17]]);
foreach ($users as $user) :
    echo $user." was written by ".$user->author."<br>";
endforeach;
require_once "../footer.php";
