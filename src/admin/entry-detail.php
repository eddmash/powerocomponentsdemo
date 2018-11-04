<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Entry;
use Eddmash\PowerOrm\Exception\ObjectDoesNotExist;
use Respect\Validation\Exceptions\MultipleException;

 ?>

<?php

try {
    $entry = Entry::objects()->get(['pk' => $_GET['id']]);

    ?>
        <h4>Create/Edit Authors</h4>

        <table class="table table-hover table-striped">
            <tr>
                <th>Blog text</th>
                <td><?=$entry->blog_text;?></td>
            </tr>
            <tr>
                <th>Headline</th>
                <td><?=$entry->headline;?></td>
            </tr>
            <tr>
                <th>Blog</th>
                <td><?=$entry->blog;?></td>
            </tr>
        </table>

    <?php
} catch (ObjectDoesNotExist $e) {
    echo $e->getMessage() . "<br>";
} catch (MultipleException $e) {
    echo $e->getMessage() . "<br>";
}


