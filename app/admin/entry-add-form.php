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
$form = new \App\Forms\Entry();
if($_SERVER['REQUEST_METHOD'] == "POST"):

    $form = new \App\Forms\Entry(['data'=>$_POST]);
    if($form->isValid()):
        $form->save();
        header('Location: authors.php');
    endif;
endif;
?>

    <h4>Create/Edit Authors</h4>
    <form method="post">
        <?=$form;?>
        <input type="submit" value="submit" class="btn btn-primary">
    </form>

<?php require_once "../footer.php";