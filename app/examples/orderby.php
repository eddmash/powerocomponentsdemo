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
use App\Models\Blog;

require_once "../header.php"; ?>
    <p>In this example we use <em>asArray()</em> to get the results as array for
        faster and easier viewing of returned results.
    </p>
    <p>The <em>orderBy()</em> method also works with the model form results</p>
    <h4 class="code">Order by Asc</h4>
<?php
$blogs = Blog::objects()->asArray(['id', 'name'])->orderBy(['id'])
             ->limit(1, 3);
Helpers::beginDumpSQl(
    $blogs->getSql(),
    "Blog::objects()->asArray(['id', 'name'])->orderBy(['id'])->limit(1, 3)"
);
foreach ($blogs as $blog) :
    Helpers::dumpArray($blog);
endforeach;
Helpers::endDumpSql(); ?>
    <h4 class="code">Order by Desc</h4>
<?php
$blogs = Blog::objects()->asArray(['id', 'name'])->orderBy(['-id'])
             ->limit(1, 3);
Helpers::beginDumpSQl(
    $blogs->getSql(),
    "Blog::objects()->asArray(['id', 'name'])->orderBy(['-id'])->limit(1, 3)"
);
foreach ($blogs as $blog) :
    Helpers::dumpArray($blog);
endforeach;
Helpers::endDumpSql(); ?>

    <h4 class="code">Related Order by Asc related model pk</h4>
<?php
$blogs = Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])
             ->orderBy(['author'])
             ->limit(1, 3);
Helpers::beginDumpSQl(
    $blogs->getSql(),
    "Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])->orderBy(['author'])->limit(1, 3)"
);
foreach ($blogs as $blog) :
    Helpers::dumpArray($blog);
endforeach;
Helpers::endDumpSql(); ?>

    <h4 class="code">Related Order by Desc using related model pk</h4>
<?php
$blogs = Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])
             ->orderBy(['-author'])
             ->limit(1, 3);
Helpers::beginDumpSQl(
    $blogs->getSql(),
    "Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])->orderBy(['author'])->limit(1, 3)"
);
foreach ($blogs as $blog) :
    Helpers::dumpArray($blog);
endforeach;
Helpers::endDumpSql(); ?>
    <h4 class="code">Related Order by Asc using another field on the related model</h4>
<?php
$blogs = Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])
             ->orderBy(['author__name'])->limit(1, 3);
Helpers::beginDumpSQl(
    $blogs->getSql(),
    "Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])->orderBy(['author'])->limit(1, 3)"
);
foreach ($blogs as $blog) :
    Helpers::dumpArray($blog);
endforeach;
Helpers::endDumpSql(); ?>
    <h4 class="code">Related Order by Desc using another field on the related model</h4>
<?php
$blogs = Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])
             ->orderBy(['-author__name'])->limit(1, 3);
Helpers::beginDumpSQl(
    $blogs->getSql(),
    "Blog::objects()->asArray(['id', 'name', 'author__name', 'author__id'])->orderBy(['author'])->limit(1, 3)"
);
foreach ($blogs as $blog) :
    Helpers::dumpArray($blog);
endforeach;
Helpers::endDumpSql();

require_once "../footer.php";
