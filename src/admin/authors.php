<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

?>

<h4 class="text-info">check the toolbar to see the queries perfomed</h4>
<?php

$authors = \App\Models\Author::objects()->selectRelated(['user'])->all();
?>
<h4>
    List of Authors</h4>
<h4>
    <a href="author-add-form.php">
        <button class="btn btn-primary">
            <i class="phpdebugbar-fa phpdebugbar-fa-plus-circle"></i> Add Author
        </button>
    </a>
</h4>

<table class="table table-hover table-striped">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>User</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach ($authors as $author): ?>
        <tr>
            <td><?= $author->name; ?></td>
            <td><?= $author->email; ?></td>
            <td><?= $author->user; ?></td>
            <td><a href="author-detail.php?id=<?= $author->id; ?>">view</a></td>
            <td><a href="author-edit-form.php?id=<?= $author->id; ?>">edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>

