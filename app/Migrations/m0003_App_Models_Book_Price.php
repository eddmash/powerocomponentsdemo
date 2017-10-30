<?php

/**Migration file generated at 06:10:03 on Mon, 30th October 2017 by PowerOrm(1.1.0-alpha)*/

namespace App\Migrations;

use Eddmash\PowerOrm\Migration\Migration;
use Eddmash\PowerOrm\Migration\Operation\Field as fieldOperation;
use Eddmash\PowerOrm\Model\Field as modelField;

class m0003_App_Models_Book_Price extends Migration{

	public function getDependency(){
		return [ 'App\Migrations\m0002_App_Models_Book' ];
	}

	public function getOperations(){
		return [
			fieldOperation\AddField::createObject(
				[
					'modelName'=> 'App\Models\Book',
					'name'=> 'price',
					'field'=> modelField\DecimalField::createObject(['default'=> '10']),
					'preserveDefault'=> false,
				]
			),
		] ;
	}

}