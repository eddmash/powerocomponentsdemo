<?php

/**
 * This file is part of the ci4 package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Config;


use App\App;
use App\Signal\SignalManager;
use Eddmash\PhpGis\PhpGis;
use Eddmash\PowerOrm\BaseOrm;
use Eddmash\PowerOrmDebug\Toolbar;
use Eddmash\PowerOrmFaker\Faker;
use Gis\Gis;

class Powerorm
{
    public static function asArray()
    {
        return [
            'database' => [
                'host' => '127.0.0.1',
                'dbname' => 'powerormcomponents',
                'user' => 'root',
                'password' => 'root',
                'driver' => 'pdo_mysql',
            ],
            'dbPrefix' => 'demo_',
            'charset' => 'utf-8',
            'timezone' => 'Africa/Nairobi',
            'components' => [
                App::class,
//                Gis::class,
//                PhpGis::class,
                Toolbar::class,
                Faker::class,
            ],
            'signalManager' => function (BaseOrm $orm) {

                return new SignalManager();
            },
        ];

    }
}
