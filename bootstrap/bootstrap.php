<?php

require_once '/var/www/html/libs/paloSantoConfig.class.php';
require_once '/var/www/html/libs/misc.lib.php';
require_once '/var/www/html/libs/paloSantoDB.class.php';

require_once '/var/lib/asterisk/agi-bin/phpagi.php';
require_once '/var/lib/asterisk/agi-bin/phpagi-asmanager.php';

require_once __DIR__ . '/Autoloader.php';

spl_autoload_register('Autoloader::loader');
