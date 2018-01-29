<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
require_once "../header.php"; ?>
<h4 class="text-info">Performs select related, check the toolbar to see the queries perfomed</h4>
<?php
$entries = \App\Models\Entry::objects()->selectRelated(['blog'])->all();
?>
    <h4>
        List of Entries</h4>
    <h4>
        <a href="entry-add-form.php">
            <button class="btn btn-primary">
                <i class="phpdebugbar-fa phpdebugbar-fa-plus-circle"></i> Add Entries
            </button>
        </a>
    </h4>

    <table class="table table-hover table-striped">
        <tr>
            <th>Blog text</th>
            <th>Headline</th>
            <th>Blog</th>
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($entries as $entry): ?>
            <tr>
                <td><?= $entry->blog_text; ?></td>
                <td><?= $entry->headline; ?></td>
                <td><?= $entry->blog; ?></td>
                <td><a href="entry-detail.php?id=<?= $entry->id; ?>">view</a></td>
                <td><a href="entry-edit-form.php?id=<?= $entry->id; ?>">edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php require_once "../footer.php";