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
use App\Models\Author;
use App\Models\Blog;
use App\Models\Entry;

?>
    <h4 class="code">Related Records</h4>
<?php
$users = Blog::objects()
    ->exclude(['id__in' => [1, 10, 11, 13, 15, 17]])
    ->limit(0, 5);


Helpers::beginDumpSQl(
    $users->getSql(),
    '\App\Models\Blog::objects()
    ->selectRelated(["author"])
    ->exclude(["id__in"=>[1, 10, 11, 13, 15, 17]])->limit(0,5)'
);
foreach ($users as $user) :
    Helpers::dumpString($user . " was written by " . $user->author);
endforeach;
Helpers::endDumpSql();
?>
    <h4 class="code">Using select Related (EAGER FETCH)</h4>
<?php
$users = Blog::objects()->selectRelated(['author'])
    ->exclude(['id__in' => [1, 10, 11, 13, 15, 17]])->limit(0, 5);


Helpers::beginDumpSQl(
    $users->getSql(),
    '\App\Models\Blog::objects()
    ->selectRelated(["author"])
    ->exclude(["id__in"=>[1, 10, 11, 13, 15, 17]])->limit(0,5)'
);
foreach ($users as $user) :
    Helpers::dumpString($user . " was written by " . $user->author);
endforeach;
Helpers::endDumpSql();
?>
    <h4 class="code">Forward M2M display</h4>
<?php

$entry = Entry::objects()->get(['id' => 1]);

Helpers::beginDumpSQl(
    Entry::objects()->filter(['id' => 1])->getSql(),
    '$entry =\App\Models\Entry::objects()->get(["id"=>6])'
);
Helpers::dumpString($entry);
Helpers::beginDumpSQl(
    $entry->authors->all()->getSql(),
    '$entry->authors->all()->limit(0,5)',
    false
);
foreach ($entry->authors->all()->limit(0, 5) as $entry):
    Helpers::dumpString($entry);
endforeach;
Helpers::endDumpSql();
?>
    <h4 class="code">Reverse M2M display</h4>
<?php

$author = Author::objects()->get(['id' => 1]);
Helpers::beginDumpSQl(
    \App\Models\Author::objects()->filter(['id' => 1])->getSql(),
    '$author = \App\Models\Author::objects()->get(["id"=>6])'
);

Helpers::dumpString($author);
Helpers::beginDumpSQl(
    $author->entry_set->all()->getSql(),
    '$author->entry_set->all()->limit(0,5)',
    false
);
foreach ($author->entry_set->all()->limit(0, 5) as $entry):
    Helpers::dumpString($entry);
endforeach;
Helpers::endDumpSql();


