<?php

/**
 * This file is part of the powercomponents package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Models;


use src\Provider\BookProvider;
use Eddmash\PowerOrm\Model\Model;
use Eddmash\PowerOrmFaker\FakeableInterface;
use Faker\Generator;

class Book extends Model implements FakeableInterface
{
    public function unboundFields()
    {
        return [
            "title" => Model::CharField(['maxLength' => 50]),
            "isbn" => Model::CharField(['maxLength' => 50]),
            "summary" => Model::CharField(['maxLength' => 50]),
            "price" => Model::DecimalField(['maxDigits' => 50, 'decimalPlaces'=>2]),
        ];
    }

    public function registerFormatter(Generator $generator)
    {
        $generator->addProvider(new BookProvider($generator));

        return [
            "title" => function ($faker, $object) {
                return $faker->book_title;
            },
            "isbn" => function ($faker, $object) {
                return $faker->book_isbn;
            },
        ];
    }

}