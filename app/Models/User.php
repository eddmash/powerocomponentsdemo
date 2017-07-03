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

class User extends Model
{

    private function unboundFields()
    {

        return [
            "username" => Model::CharField(['maxLength' => 50]),
            "age" => Model::CharField(['maxLength' => 50]),
        ];

    }
}
