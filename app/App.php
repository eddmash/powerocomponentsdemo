<?php
/**
 * Created by PhpStorm.
 * User: edd
 * Date: 12/28/17
 * Time: 9:57 AM
 */

namespace App;


use Eddmash\PowerOrm\BaseOrm;
use Eddmash\PowerOrm\Components\Application;

class App extends Application
{

    public function ready(BaseOrm $baseOrm)
    {
    }

    public function getDbPrefix()
    {
        return "php_app";
    }
}