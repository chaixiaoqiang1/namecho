<?php
define('NAMECHO_START', microtime(true));
define('BASE_DIR', dirname(__DIR__) . '/');

require BASE_DIR . 'system/Autoloader/autoload.php';

Namecho\App::getInstance()->run();
