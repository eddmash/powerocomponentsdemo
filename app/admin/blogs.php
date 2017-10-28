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

$blogs = \App\Models\Blog::objects()->selectRelated(['author'])->all();
?>
    <h4>
        List of Blogs</h4>
    <h4>
        <a href="user-add-form.php">
            <button class="btn btn-primary">
                <i class="phpdebugbar-fa phpdebugbar-fa-plus-circle"></i> Add Blog
            </button>
        </a>
    </h4>

    <table class="table table-hover table-striped">
        <tr>
            <th>Name</th>
            <th>Tagline</th>
            <th>Author</th>
            <th colspan="2">Action</th>
        </tr>
        <?php foreach ($blogs as $blog): ?>
            <tr>
                <td><?= $blog->name; ?></td>
                <td><?= $blog->tagline; ?></td>
                <td><?= $blog->author; ?></td>
                <td><a href="/app/admin/blog-entries.php?id=<?= $blog->id;?>">Articles</a></td>
                <td><a href="blog-detail.php?id=<?= $blog->id; ?>">view</a></td>
                <td><a href="blog-edit-form.php?id=<?= $blog->id; ?>">edit</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php require_once "../footer.php";