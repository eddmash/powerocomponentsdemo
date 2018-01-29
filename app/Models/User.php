<?php

/**
 * This file is part of the ci4 package.
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

class User extends Model implements FakeableInterface
{
    public function unboundFields()
    {
        return [
            "username" => Model::CharField(['maxLength' => 50]),
            "age" => Model::CharField(['maxLength' => 50]),
        ];
    }
    
    public function registerFormatter(Generator $generator)
    {
        return [
            "age" => function ($faker, $object) {
                return $faker->numberBetween(1, 150);
            },
        ];
    }
}