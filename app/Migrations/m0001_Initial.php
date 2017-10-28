<?php

/**Migration file generated at 11:10:50 on Fri, 27th October 2017 by PowerOrm(1.1.0-pre-alpha)*/

namespace App\Migrations;

use Eddmash\PowerOrm\Migration\Migration;
use Eddmash\PowerOrm\Migration\Operation\Model as modelOperation;
use Eddmash\PowerOrm\Model\Field as modelField;
use Eddmash\PowerOrm\Migration\Operation\Field as fieldOperation;

class m0001_Initial extends Migration{

	public function getDependency(){
		return [  ];
	}

	public function getOperations(){
		return [
			modelOperation\CreateModel::createObject(
				[
					'name'=> 'App\Models\Author',
					'fields'=>[ 
						'name'=> modelField\CharField::createObject(['maxLength'=> 200]),
						'email'=> modelField\EmailField::createObject(['maxLength'=> 254]),
						'id'=> modelField\AutoField::createObject(['primaryKey'=> true, 'autoCreated'=> true]),
					],
				]
			),
			modelOperation\CreateModel::createObject(
				[
					'name'=> 'App\Models\Blog',
					'fields'=>[ 
						'name'=> modelField\CharField::createObject(['maxLength'=> 100]),
						'tagline'=> modelField\TextField::createObject([]),
						'id'=> modelField\AutoField::createObject(['primaryKey'=> true, 'autoCreated'=> true]),
						'author'=> modelField\ForeignKey::createObject(['to'=> 'App\Models\Author']),
						'created_by'=> modelField\ForeignKey::createObject(['to'=> 'App\Models\Author', 'dbIndex'=> false]),
					],
				]
			),
			modelOperation\CreateModel::createObject(
				[
					'name'=> 'App\Models\User',
					'fields'=>[ 
						'username'=> modelField\CharField::createObject(['maxLength'=> 50]),
						'age'=> modelField\CharField::createObject(['maxLength'=> 50]),
						'id'=> modelField\AutoField::createObject(['primaryKey'=> true, 'autoCreated'=> true]),
					],
				]
			),
			modelOperation\CreateModel::createObject(
				[
					'name'=> 'App\Models\Entry',
					'fields'=>[ 
						'headline'=> modelField\CharField::createObject(['maxLength'=> 255]),
						'blog_text'=> modelField\TextField::createObject([]),
						'n_comments'=> modelField\IntegerField::createObject([]),
						'n_pingbacks'=> modelField\IntegerField::createObject([]),
						'ratings'=> modelField\IntegerField::createObject([]),
						'pub_date'=> modelField\DateField::createObject([]),
						'mod_date'=> modelField\DateField::createObject([]),
						'id'=> modelField\AutoField::createObject(['primaryKey'=> true, 'autoCreated'=> true]),
						'blog'=> modelField\ForeignKey::createObject(['to'=> 'App\Models\Blog']),
						'authors'=> modelField\ManyToManyField::createObject(['to'=> 'App\Models\Author']),
					],
				]
			),
			fieldOperation\AddField::createObject(
				[
					'modelName'=> 'App\Models\Author',
					'name'=> 'user',
					'field'=> modelField\OneToOneField::createObject(['null'=> true, 'to'=> 'App\Models\User']),
				]
			),
		] ;
	}

}