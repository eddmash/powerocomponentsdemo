<?php

namespace App\Models;

use Eddmash\PowerOrm\Model\Model;
use Eddmash\PowerOrmFaker\FakeableInterface;
use Faker\Generator;

/**
 * Class Entry
 */
class Entry extends Model implements FakeableInterface
{
    private function unboundFields()
    {
        return [
            'blog'        => Model::ForeignKey(['to' => Blog::class]),
            'headline'    => Model::CharField(['maxLength' => 255]),
            'blog_text'   => Model::TextField(),
            'authors'     => Model::ManyToManyField(['to' => Author::class]),
            'n_comments'  => Model::IntegerField(),
            'n_pingbacks' => Model::IntegerField(),
            'ratings'     => Model::IntegerField(),
            'pub_date'    => Model::DateField(),
            'mod_date'    => Model::DateField()
        ];
    }

    public function registerFormatter(Generator $generator)
    {
        return [
            "headline"=>function ($faker, $model){
                return $faker->country;
            },
            "blog_text"=>function ($faker, $model){
                return $faker->realText(150, 2);
            }
        ];
    }
}
