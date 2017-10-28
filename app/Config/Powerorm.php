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


use DebugBar\StandardDebugBar;
use Eddmash\PowerOrm\BaseOrm;
use Eddmash\PowerOrmDebug\Debugger;
use Eddmash\PowerOrmFaker\Generatedata;

class Powerorm
{
    public static function asArray()
    {
        return [
            'database' => [
                'host' => '127.0.0.1',
                'dbname' => 'tester',
                'user' => 'root',
                'password' => 'root1.',
                'driver' => 'pdo_mysql',
            ],
            'migrations' => [
                'path' => sprintf('%1$s%2$sMigrations%2$s', dirname(__DIR__), DIRECTORY_SEPARATOR),
            ],
            'models' => [
                'path' => sprintf('%1$s%2$sModels%2$s', dirname(__DIR__), DIRECTORY_SEPARATOR),
                'namespace' => 'App\Models\\',
            ],
            'dbPrefix' => 'demo_',
            'charset' => 'utf-8',
            'timezone' => 'Africa/Nairobi',
            'commands' =>[
                Generatedata::class
            ],
            'components' => [
                "debugger" => function (BaseOrm $orm) {
                    $debugger = new Debugger($orm);
                    $debugger->setStaticBaseUrl("/assets/");
                    $debugger->setDebugBar(new StandardDebugBar());
                    return $debugger;
                },
            ]
        ];

    }
}
