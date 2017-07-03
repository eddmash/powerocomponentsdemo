<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
require_once "header.php";
//$authors = \App\Models\Author::objects()->filter(['pk'=>1]);

$authors = \App\Models\User::objects()->filter(['pk'=>1]);

//\Eddmash\PowerOrm\Model\Query\prefetchRelatedObjects($authors, ["authors__user"]);
?>
    <h4>Authors</h4>
    <table>
        <thead>
        <tr>
            <th>User</th>
            <th>Author</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($authors as $author) : ?>

                <tr><?php dump($author)?></tr>
                <tr><?php dump($author->author)?></tr>


        <?php endforeach; ?>
        </tbody>
    </table>

<?php
require_once "footer.php";