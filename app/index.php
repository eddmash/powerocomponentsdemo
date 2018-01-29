<?php
/**
 * This file is part of the powerocomponentsdemo package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once "header.php";

//dump(\App\Models\Blog::objects()->get(['id' => 1])->author);
//dump(\App\Models\User::objects()->get(['id' => 1])->blog_set);
//$sum = Entry::objects()->filter(['n_pingbacks__gt'=>f_("ratings")]);
//dump(
//
//);

dump(\App\Models\Blog::objects()->get(['pk' => 1])->toArray());


?>

    <div class="jumbotron">`
        <h1>Welcome You</h1>
        <p>A simple blog system that show case some usage of the
            <strong>powerorm</strong> and <strong>powerform</strong> components</p>

        <p>
            To use the same data i'm using for this examples on your database
            run this command to have faker generate the exact data
            <small><code>php pmanager faker:generatedata -r 50 -s 123456</code>
            </small>
        </p>

        <p>View Queries performed on the toolbar at the bottom of the page.</p>
    </div>


<?php
require_once "footer.php";
