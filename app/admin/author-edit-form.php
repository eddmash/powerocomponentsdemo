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

    <h4>Create/Edit Authors</h4>
<?php

try {
    $author = \App\Models\Author::objects()->get(['pk' => $_GET['id']]);
    $form = new \App\Forms\Author(['instance' => $author]);

    if ($_SERVER['REQUEST_METHOD'] == "POST"):

        $form = new \App\Forms\Author(['instance' => $author, 'data' => $_POST]);
        if ($form->isValid()):
            $form->save();
            header('Location: authors.php');
        endif;
    endif;
    ?>

    <form method="post">
        <?php if (!$form->nonFieldErrors()->isEmpty()): ?>
           <div class="alert alert-danger">
               <?= $form->nonFieldErrors(); ?>
           </div>
        <?php endif; ?>

        <?php
        foreach ($form as $field):
            if ($field->isHidden()):
                echo $field;
                continue;
            endif;
            ?>

            <div class="form-group">
                <?php if (!$field->getErrors()->isEmpty()): ?>
                    <ol class="alert alert-danger">
                        <?php foreach ($field->getErrors() as $error) : ?>
                            <?= $error; ?>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
                <label for="<?= $field->getIdForLabel(); ?>"><?= $field->getLabelName() ?></label>
                <?= $field->asWidget(null, ['class' => 'form-control']); ?>
            </div>
        <?php endforeach; ?>
        <input type="submit" value="submit" class="btn btn-primary">
    </form>


    <?php
} catch (ObjectDoesNotExist $e) {
    echo $e->getMessage() . "<br>";
} catch (MultipleException $e) {
    echo $e->getMessage() . "<br>";
}


require_once "../footer.php";