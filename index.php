<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();// Start the session
}


use Eddmash\PowerOrm\Loader;

define('BASE_DIR', basename(__DIR__));
define('UI_DIR', "src" . DIRECTORY_SEPARATOR);

// autoloader
require 'vendor/autoload.php';

// get helpers
require_once 'functions.php';

// get orm configs
$configs = require 'config.php';

// register exception and error handler
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PlainTextHandler());
$whoops->register();

// launch the orm
$orm = Loader::webRun($configs);

// setup the debugger
/**@var $debugger \Eddmash\PowerOrmDebug\Debugger */
$debugger = $orm->debugger;
//$debugger->setStaticBaseUrl('/debugbar/');


require_once 'src/header.php';
//$_SESSION['roles'] = [];
//$_SESSION['user'] = User::objects()->asArray()->get(['pk' => 3]);
//$roles = Role::objects()->asArray(['name'], true, true)
//    ->filter(['user' => User::objects()->filter(['pk' => 3])])->getResults();

if (is_base()) {
    redirect('home.php');
} else {
    render_content();
}

$debugger->show();

require_once 'src/footer.php';