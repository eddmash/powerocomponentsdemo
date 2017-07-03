<?php

namespace App\Models;

use Eddmash\PowerOrm\Model\Model;

/**
 * Class Entry
 */
class Entry extends Model
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

}
