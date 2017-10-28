<?php

/**
 * This file is part of the ci306 package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models;


use Eddmash\PowerOrm\Model\Model;
use Eddmash\PowerOrmFaker\FakeableInterface;
use Faker\Generator;

class Blog extends Model
{

    private function unboundFields()
    {
        return [
            'name'    => Model::CharField(['maxLength' => 100]),
            'tagline' => Model::TextField(),
            'author'  => Model::ForeignKey(['to' => Author::class]),
            'created_by'  => Model::ForeignKey(['to' => Author::class, 'dbIndex'=>false, "relatedName"=>"created_by_"])
        ];
    }
}
