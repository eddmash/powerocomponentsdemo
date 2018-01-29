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
use App\Models\User;
use Eddmash\PowerOrm\Exception\MultipleObjectsReturned;
use Eddmash\PowerOrm\Exception\ObjectDoesNotExist;
use function Eddmash\PowerOrm\Model\Query\Expression\not_;
use function Eddmash\PowerOrm\Model\Query\Expression\q_;

require_once "../header.php"; ?>


    <h4 class="code">Simple filter exactly one returned</h4>
<?php
try {
    $author = Author::objects()->get(["id" => 2]);
    Helpers::beginDumpSQl(
        Author::objects()->filter(["id" => 2])->getSql(),
        'Author::objects()->get(["id" => "2"])'
    );
    Helpers::dumpString($author);
    Helpers::endDumpSql();
} catch (ObjectDoesNotExist $doesNotExist) {
    Helpers::dumpString("ObjectDoesNotExist raised ");
} catch (MultipleObjectsReturned $doesNotExist) {
    Helpers::dumpString("MultipleObjectsReturned raised ");
}
?>
    <h4 class="code">Simple filter Multiples returned</h4>
<?php
$authors = Blog::objects()->filter(['name__icontains' => 'Boyle']);
Helpers::beginDumpSQl($authors->getSql(), "Blog::objects()->filter(['name__icontains' =>'Boyle'])");

foreach ($authors as $author) :
    Helpers::dumpString($author);
endforeach;
Helpers::endDumpSql();
?>

    <h4 class="code">Relation filter using simple value</h4>
<?php
$users = Blog::objects()->filter(['author__email__icontains' => "heathcote"]);
Helpers::beginDumpSQl($users->getSql(), "Blog::objects()->filter(['author__email__icontains' => 'heathcote'])");
foreach ($users as $user) :
    Helpers::dumpString($user);
endforeach;
Helpers::endDumpSql();
?>

    <h4 class="code">Relation filter using Related Object</h4>
<?php
try {
    $author = Author::objects()->get(["pk" => 1]);
    $users = Entry::objects()->filter(['authors' => $author])->limit(0, 5);
    
    Helpers::beginDumpSQl(
        $users->getSql(),
        'Entry::objects()->filter(["authors" => Author::objects()->get(["pk" => 1])])->limit(0,5)'
    );
    foreach ($users as $user) :
        Helpers::dumpString($user);
    endforeach;
    Helpers::endDumpSql();
} catch (ObjectDoesNotExist $doesNotExist) {
    Helpers::dumpString("ObjectDoesNotExist raised ");
} catch (MultipleObjectsReturned $doesNotExist) {
    Helpers::dumpString("MultipleObjectsReturned raised ");
}
?>

    <h4 class="code">Relation filter using Queryset</h4>
<?php
try {
    $author = Author::objects()->filter(["email__icontains" => "heathcote"]);
    $users = Entry::objects()->filter(['authors' => $author])->limit(0, 5);
    Helpers::beginDumpSQl(
        $users->getSql(),
        'Entry::objects()->filter(['.
        '"authors" => Author::objects()->filter(["email__icontains" => "heathcote"])->limit(0,5)'.
        '])'
    );
    foreach ($users as $user) :
        Helpers::dumpString($user);
    endforeach;
    Helpers::endDumpSql();
} catch (Exception $e) {

}
?>

    <h4 class="code">Filter using WHERE NOT</h4>
<?php
$users = Blog::objects()->filter(not_(['id' => 1]))->limit(0, 5);

Helpers::beginDumpSQl($users->getSql(), "Blog::objects()->filter(not_(['id' => 1]))->limit(0, 5)");
foreach ($users as $user) :
    Helpers::dumpString($user);
endforeach;
Helpers::endDumpSql();
//?>

    <!---->
    <h4 class="code">Filter using WHERE OR</h4>
<?php
$users = Blog::objects()->filter(not_(['id' => 1])->or_(['name__icontains' => 'se']))->limit(0, 5);
Helpers::beginDumpSQl(
    $users->getSql(),
    "Blog::objects()->filter(not_(['id' => 1])->or_(['name__icontains' => 'se']))->limit(0, 5)"
);
foreach ($users as $user) :
    Helpers::dumpString($user);
endforeach;
Helpers::endDumpSql();
?>

    <h4 class="code">Filter using complex q</h4>
<?php
$users = Blog::objects()->filter(
    q_(
        [
            "author" => Author::objects()->filter(
                [
                    'user' => User::objects()->filter(['id' => 5]),
                ]
            ),
        ]
    )
);
Helpers::beginDumpSQl(
    $users->getSql(),
    "Blog::objects()->filter(
    q_([
        'author' => Author::objects()->filter([
            'user' => User::objects()->filter(['id' => 5])
        ])
    ])
)"
);
foreach ($users as $user) :
    Helpers::dumpString($user);
endforeach;
Helpers::endDumpSql();
?>
    <!--    <h4 class="code">Filter spanning relationships</h4>-->
<?php
$users = Blog::objects()->filter(["author__user__username__icontains" => "mill"]);
Helpers::beginDumpSQl($users->getSql(), 'Blog::objects()->filter(["author__user__username__icontains" => "mill"])');
foreach ($users as $user) :
    Helpers::dumpString($user);
endforeach;
Helpers::endDumpSql();
?>


    <h4 class="code">Results As Array and limit</h4>
<?php
$users = Blog::objects()->asArray()->limit(1, 3);
Helpers::beginDumpSQl($users->getSql(), "Blog::objects()->asArray()->limit(1,3)");
foreach ($users as $user) :
    Helpers::dumpArray($user);
endforeach;
Helpers::endDumpSql();
//?>

    <h4 class="code">Results As Array values and limit</h4>
<?php
$users = Blog::objects()->asArray(['id', 'name'])->limit(1, 3);
Helpers::beginDumpSQl($users->getSql(), "Blog::objects()->asArray(['id', 'name'])->limit(1,3)");
foreach ($users as $user) :
    Helpers::dumpArray($user);
endforeach;
Helpers::endDumpSql();
//?>

    <h4 class="code">Results As Array flat values and filter with not</h4>
<?php
$users = Blog::objects()->asArray(['id'], true, true)->filter(not_(['id__in' => [10, 8, 9]]))->limit(0, 5);
Helpers::beginDumpSQl(
    $users->getSql(),
    "Blog::objects()
    ->asArray(['id'], true, true)
    ->filter(not_(['id__in'=>[10,8,9]]))->limit(0, 5)
"
);
$results = [];
foreach ($users as $user) :
    $results[] = $user;
endforeach;
Helpers::dumpArray($results);
Helpers::endDumpSql();
?>
<?php
require_once "../footer.php";
