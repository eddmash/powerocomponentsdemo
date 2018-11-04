<?php
/**
 * Created by PhpStorm.
 * User: edd
 * Date: 8/16/18
 * Time: 10:41 AM
 */


use App\App;
use App\Signal\SignalManager;
use Eddmash\PowerOrm\BaseOrm;
use Eddmash\PowerOrmDebug\Toolbar;
use Eddmash\PowerOrmFaker\Faker;

$database = [
    'host' => '127.0.0.1',
    'dbname' => 'powerormcomponents',
    'user' => 'root',
    'password' => 'root',
    'driver' => 'pdo_mysql',
];
// this is for when app is deployed on heroku
if (getenv("DATABASE_URL")) {
    $dbopts = parse_url(getenv("DATABASE_URL"));

    $database = [
        'driver' => 'pdo_pgsql',
        'user' => $dbopts["user"],
        'password' => $dbopts["pass"],
        'host' => $dbopts["host"],
        'port' => $dbopts["port"],
        'dbname' => ltrim($dbopts["path"], '/')
    ];
}

return [
    'database' => $database,
    'dbPrefix' => '',
    'charset' => 'utf-8',
    'timezone' => 'Africa/Nairobi',
    'components' => [
        App::class,
        Toolbar::class,
        Faker::class

    ],

    'signalManager' => function (BaseOrm $orm) {

        return new SignalManager();
    },

];
