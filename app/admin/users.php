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

    <h4 class="text-info">check the toolbar to see the queries perfomed</h4>
<?php
$orm->getSignalManager()->addListener(\Eddmash\PowerOrm\Signals\Signal::MODEL_PRE_INIT, function ($event) {
    var_dump($event);
    echo '<br>';
});

$authors = \App\Models\User::objects()->all();
?>
    <h4>
        List of Authors</h4>
    <h4>
        <a href="user-add-form.php">
            <button class="btn btn-primary">
                <i class="phpdebugbar-fa phpdebugbar-fa-plus-circle"></i> Add User
            </button>
        </a>
    </h4>

    <table class="table table-hover table-striped">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($authors as $author): ?>
            <tr>
                <td><?= $author->username; ?></td>
                <td><?= $author->age; ?></td>
                <td><a href="user-detail.php?id=<?= $author->id; ?>">view</a></td>
                <td><a href="user-edit-form.php?id=<?= $author->id; ?>">edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php require_once "../footer.php";