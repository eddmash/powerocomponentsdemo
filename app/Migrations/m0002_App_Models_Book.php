<?php

/**Migration file generated at 08:10:05 on Sat, 28th October 2017 by PowerOrm(1.1.0-pre-alpha)*/

namespace App\Migrations;

use Eddmash\PowerOrm\Migration\Migration;
use Eddmash\PowerOrm\Migration\Operation\Model as modelOperation;
use Eddmash\PowerOrm\Model\Field as modelField;

class m0002_App_Models_Book extends Migration{

	public function getDependency(){
		return [ 'App\Migrations\m0001_Initial' ];
	}

	public function getOperations(){
		return [
			modelOperation\CreateModel::createObject(
				[
					'name'=> 'App\Models\Book',
					'fields'=>[ 
						'title'=> modelField\CharField::createObject(['maxLength'=> 50]),
						'isbn'=> modelField\CharField::createObject(['maxLength'=> 50]),
						'summary'=> modelField\CharField::createObject(['maxLength'=> 50]),
						'id'=> modelField\AutoField::createObject(['primaryKey'=> true, 'autoCreated'=> true]),
					],
				]
			),
		] ;
	}

}