<?php
/**
 * This file is part of the powerocomponentsdemo package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace App\Forms;


use Eddmash\PowerOrm\Form\ModelForm;

class Blog extends ModelForm
{
    protected $modelClass = 'App\Models\Blog';
    protected $excludes = ['id'];

}