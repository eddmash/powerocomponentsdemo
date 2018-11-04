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
use App\Models\Entry;
use function Eddmash\PowerOrm\Model\Query\Expression\avg_;
use function Eddmash\PowerOrm\Model\Query\Expression\count_;
use function Eddmash\PowerOrm\Model\Query\Expression\f_;
use function Eddmash\PowerOrm\Model\Query\Expression\func_;
use function Eddmash\PowerOrm\Model\Query\Expression\max_;
use function Eddmash\PowerOrm\Model\Query\Expression\min_;
use function Eddmash\PowerOrm\Model\Query\Expression\sum_;

 ?>

    <h4 class="code">Annotate Queryset</h4>
<?php
$models = Entry::objects()->annotate(['no_of_authors' => count_('authors')])->limit(null, 2);

Helpers::beginDumpSQl(
    $models->getSql(),
    "\$model=Entry::objects()->annotate(['no_of_authors'=>count_('authors')])->limit(null, 2)"
);

Helpers::beginDumpSQl(
    "",
    "echo \$model .' has '.\$model->no_of_authors;",
    false
);
foreach ($models as $model) :
    Helpers::dumpString($model." has ".$model->no_of_authors);
endforeach;
Helpers::endDumpSql();
//?>

    <h4 class="code">Annotate object</h4>
<?php
$model = Entry::objects()->annotate(['no_of_authors' => count_('authors')])->get(['pk' => 1]);
Helpers::beginDumpSQl(
    Entry::objects()->annotate(['no_of_authors' => count_('authors')])->filter(['pk' => 1])->getSql(),
    "\$model = Entry::objects()->annotate(['no_of_authors'=>count_('authors')])->get(['pk' => 1])"
);
Helpers::beginDumpSQl("", "\$model->no_of_authors", false);
Helpers::dumpString($model->no_of_authors);
Helpers::endDumpSql();
?>

    <h4 class="code">Aggregate count</h4>
<?php
$model = Entry::objects()->aggregate(
    [
        'no_of_authors' => count_('authors'),
    ]
);

Helpers::beginDumpSQl(
    "",
    "Entry::objects()->aggregate(['no_of_authors' => count_('authors')])"
);
Helpers::dumpArray($model);
Helpers::endDumpSql();
?>

    <h4 class="code">Aggregate Func</h4>
<?php
$models = Entry::objects()->asArray(['id', 'headline'])->annotate(
    [
        "uheadline" => func_(["expression" => f_("headline"), "function" => "UPPER"]),
    ]
)->limit(null, 3);
//
Helpers::beginDumpSQl(
    "",
    '$models = Entry::objects()->asArray(["id", "headline"])->annotate(
    [
        "uheadline" => func_(["expression" => f_("headline"), "function" => "UPPER"]),
    ]
)->limit(null, 3)'
);
foreach ($models as $model) :
    Helpers::dumpArray($model);
endforeach;
Helpers::endDumpSql();
?>

    <h4 class="code">Aggregate SUM, AVG, MIN, MAX</h4>
<?php
$sum = Entry::objects()->aggregate(
    [
        "sum" => sum_("n_pingbacks"),
        "avg" => avg_("n_pingbacks"),
        "min" => min_("n_pingbacks"),
        "max" => max_("n_pingbacks"),
    ]
);
//
Helpers::beginDumpSQl(
    "",
    'Entry::objects()->aggregate(
    [
        "sum" => sum_("n_pingbacks"),
        "avg" => avg_("n_pingbacks"),
        "min" => min_("n_pingbacks"),
        "max" => max_("n_pingbacks"),
    ]
)'
);
Helpers::dumpArray($sum);
Helpers::endDumpSql();
?>
    <h4 class="code">Aggregate over Annotation</h4>
<?php
$sum = Entry::objects()->asArray()
            ->annotate(['count_authors' => count_('authors')])
            ->aggregate(['avg' => avg_('count_authors')]);
//
Helpers::beginDumpSQl(
    "",
    "Entry::objects()->asArray()
    ->annotate(['count_authors' => count_('authors')])
    ->aggregate(['avg'=>avg_('count_authors')])"
);
Helpers::dumpArray($sum);
Helpers::endDumpSql();
?>
    <h4 class="code">using F to compare between columns</h4>
<?php
$sum = Entry::objects()->asArray(['id','n_pingbacks','ratings','blog'])
            ->filter(['n_pingbacks__gt' => f_("ratings")])
            ->limit(0, 5);
////
Helpers::beginDumpSQl(
    $sum->getSql(),
    "Entry::objects()->asArray(['id','n_pingbacks','ratings','blog'])
            ->filter(['n_pingbacks__gt' => f_(\"ratings\")])
            ->limit(0, 5)"
);
Helpers::dumpArray($sum);
Helpers::endDumpSql();
?>

