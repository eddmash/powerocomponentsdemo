<?php

/**Migration file generated at 07:01:19 on Fri, 26th January 2018 by PowerOrm(1.1.0-alpha)*/

namespace App\Migrations;

use Eddmash\PowerOrm\Migration\Migration;
use Eddmash\PowerOrm\Migration\Operation\Model as ModelOps;
use Eddmash\PowerOrm\Model\Model;
use Eddmash\PowerOrm\Migration\Operation\Field as FieldOps;

class m0001_Initial extends Migration{

	public function getDependency(){
		return [
		

		];
	}

	public function getOperations(){
		return [
			ModelOps\CreateModel::createObject(
				[
					'name'=> 'App\Models\User',
					'fields'=>[ 
						'username'=> Model::CharField([
							'maxLength'=> 50,
						]),
						'age'=> Model::CharField([
							'maxLength'=> 50,
						]),
						'id'=> Model::AutoField([
							'primaryKey'=> true,
							'autoCreated'=> true,
						]),
					],
				]
			),
			ModelOps\CreateModel::createObject(
				[
					'name'=> 'App\Models\Entry',
					'fields'=>[ 
						'headline'=> Model::CharField([
							'maxLength'=> 255,
						]),
						'blog_text'=> Model::TextField([
						]),
						'n_comments'=> Model::IntegerField([
						]),
						'n_pingbacks'=> Model::IntegerField([
						]),
						'ratings'=> Model::IntegerField([
						]),
						'pub_date'=> Model::DateField([
						]),
						'mod_date'=> Model::DateField([
						]),
						'id'=> Model::AutoField([
							'primaryKey'=> true,
							'autoCreated'=> true,
						]),
					],
				]
			),
			ModelOps\CreateModel::createObject(
				[
					'name'=> 'App\Models\Book',
					'fields'=>[ 
						'title'=> Model::CharField([
							'maxLength'=> 50,
						]),
						'isbn'=> Model::CharField([
							'maxLength'=> 50,
						]),
						'summary'=> Model::CharField([
							'maxLength'=> 50,
						]),
						'price'=> Model::DecimalField([
						]),
						'id'=> Model::AutoField([
							'primaryKey'=> true,
							'autoCreated'=> true,
						]),
					],
				]
			),
			ModelOps\CreateModel::createObject(
				[
					'name'=> 'App\Models\Blog',
					'fields'=>[ 
						'name'=> Model::CharField([
							'maxLength'=> 100,
						]),
						'tagline'=> Model::TextField([
						]),
						'id'=> Model::AutoField([
							'primaryKey'=> true,
							'autoCreated'=> true,
						]),
					],
				]
			),
			ModelOps\CreateModel::createObject(
				[
					'name'=> 'App\Models\Author',
					'fields'=>[ 
						'name'=> Model::CharField([
							'maxLength'=> 200,
						]),
						'email'=> Model::EmailField([
							'maxLength'=> 254,
						]),
						'id'=> Model::AutoField([
							'primaryKey'=> true,
							'autoCreated'=> true,
						]),
						'user'=> Model::OneToOneField([
							'null'=> true,
							'to'=> 'App\Models\User',
						]),
					],
				]
			),
			FieldOps\AddField::createObject(
				[
					'modelName'=> 'App\Models\Blog',
					'name'=> 'author',
					'field'=> Model::ForeignKey([
						'to'=> 'App\Models\Author',
					]),
				]
			),
			FieldOps\AddField::createObject(
				[
					'modelName'=> 'App\Models\Blog',
					'name'=> 'created_by',
					'field'=> Model::ForeignKey([
						'to'=> 'App\Models\Author',
						'dbIndex'=> false,
					]),
				]
			),
			FieldOps\AddField::createObject(
				[
					'modelName'=> 'App\Models\Entry',
					'name'=> 'blog',
					'field'=> Model::ForeignKey([
						'to'=> 'App\Models\Blog',
					]),
				]
			),
			FieldOps\AddField::createObject(
				[
					'modelName'=> 'App\Models\Entry',
					'name'=> 'authors',
					'field'=> Model::ManyToManyField([
						'to'=> 'App\Models\Author',
					]),
				]
			),
		] ;
	}

}