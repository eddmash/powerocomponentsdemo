<?php
/**
 * This file is part of the powerocomponentsdemo package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Helpers;
use Eddmash\PowerOrm\Serializer\Json;

require_once "../header.php"; ?>

<h4 class="code">Serialize a Queryset</h4>
<?php
$queryset = \App\Models\Entry::objects()->all()->limit(null, 2);
$json = Json::serialize($queryset);
Helpers::beginDumpSQl($queryset->getSql(), '$queryset=\App\Models\Blog::objects()->all()->limit(null, 2)');
Helpers::beginDumpSQl('', 'Json::serialize($queryset)', false);
Helpers::dumpString($json);
Helpers::endDumpSql();?>

<h4 class="code">Serialize Queryset with only a few Fields</h4>
<?php
$queryset = \App\Models\Entry::objects()->all()->limit(null, 2);
$json = Json::serialize($queryset, array("headline", "ratings", "authors"));
Helpers::beginDumpSQl($queryset->getSql(), '$queryset= \App\Models\Blog::objects()->all()->limit(null, 2)');
Helpers::beginDumpSQl('', 'Json::serialize($queryset, array("headline", "ratings", "authors"))', false);
Helpers::dumpString($json);
Helpers::endDumpSql();?>

<h4 class="code">Serialize a Object</h4>
<?php
$model = \App\Models\Entry::objects()->get(['pk'=>1]);
$json = Json::serialize($model);
Helpers::beginDumpSQl(\App\Models\Entry::objects()->filter(['pk'=>1])->getSql(),
    '$model = \App\Models\Entry::objects()->get(["pk"=>1])');
Helpers::beginDumpSQl('', 'Json::serialize($model)', false);
Helpers::dumpString($json);
Helpers::endDumpSql();?>


<h4 class="code">Serialize Object with only a few Fields</h4>
<?php
$model = \App\Models\Entry::objects()->get(['pk'=>1]);
$json = Json::serialize($model);
$json = Json::serialize($model, array("headline", "ratings", "authors"));
Helpers::beginDumpSQl(\App\Models\Entry::objects()->filter(['pk'=>1])->getSql(),
    '$model = \App\Models\Entry::objects()->get(["pk"=>1])');
Helpers::beginDumpSQl('', 'Json::serialize($model, array("headline", "ratings", "authors"))', false);
Helpers::dumpString($json);
Helpers::endDumpSql();?>

<?php
require_once "../footer.php";
