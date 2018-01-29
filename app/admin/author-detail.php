<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Eddmash\PowerOrm\Exception\ObjectDoesNotExist;
use Respect\Validation\Exceptions\MultipleException;

require_once "../header.php"; ?>

<?php

try {
    $author = \App\Models\Author::objects()->get(['pk' => $_GET['id']]);

    ?>
        <h4>Create/Edit Authors</h4>

        <table class="table table-hover table-striped">
            <tr>
                <th>Name</th>
                <td><?=$author->name;?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?=$author->email;?></td>
            </tr>
            <tr>
                <th>User</th>
                <td><?=$author->user;?></td>
            </tr>
        </table>

    <?php
} catch (ObjectDoesNotExist $e) {
    echo $e->getMessage() . "<br>";
} catch (MultipleException $e) {
    echo $e->getMessage() . "<br>";
}


require_once "../footer.php";