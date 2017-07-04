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


class Powerorm
{
    public static function asArray()
    {
        return [
            'database' => [
                'host'     => '127.0.0.1',
                'dbname'   => 'tester',
                'user'     => 'root',
                'password' => 'root1.',
                'driver'   => 'pdo_mysql',
            ],
            'migrations' => [
                'path' => sprintf('%sMigrations%s', APPPATH, DIRECTORY_SEPARATOR),
            ],
            'models' => [
                'path'      => sprintf('%sModels%s', APPPATH, DIRECTORY_SEPARATOR),
                'namespace' => 'App\Models\\',
            ],
            'dbPrefix'      => 'demo_',
            'charset'       => 'utf-8',
            'timezone'      => 'Africa/Nairobi',
            'staticBaseUrl' => "/assets/",
        ];

    }
}
