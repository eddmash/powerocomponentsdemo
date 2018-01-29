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

class Author  extends Model implements FakeableInterface
{
    
    public function unboundFields()
    {
        return [
            'name'  => Model::CharField(['maxLength' => 200]),
            'email' => Model::EmailField(),
            'user'  => Model::OneToOneField(['to' => User::class, 'null' => true]),
//            'entries'=>Model::HasManyField(['to'=>User::class, 'toField'=>'authors']),
//            'blogs'=>Model::HasManyField(['to'=>Blog::class, 'toField'=>'author'])
        ];
    }
    
    
    public function registerFormatter(Generator $generator)
    {
        return [
            "name" => function ($faker, $model) {
                return $faker->firstName." ".$faker->lastName;
            },
        ];
    }
}
