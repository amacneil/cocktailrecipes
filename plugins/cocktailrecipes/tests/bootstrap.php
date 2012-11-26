<?php

// PHP sucks at resolving symlinked directories
define('BLOCKS_BASE_PATH', realpath(str_replace("plugins/cocktailrecipes", '', exec('pwd'))).'/');

// Define app constants
defined('BLOCKS_APP_PATH')          || define('BLOCKS_APP_PATH',          BLOCKS_BASE_PATH.'app/');
defined('BLOCKS_CONFIG_PATH')       || define('BLOCKS_CONFIG_PATH',       BLOCKS_BASE_PATH.'config/');
defined('BLOCKS_PLUGINS_PATH')      || define('BLOCKS_PLUGINS_PATH',      BLOCKS_BASE_PATH.'plugins/');
defined('BLOCKS_STORAGE_PATH')      || define('BLOCKS_STORAGE_PATH',      BLOCKS_BASE_PATH.'storage/');
defined('BLOCKS_TEMPLATES_PATH')    || define('BLOCKS_TEMPLATES_PATH',    BLOCKS_BASE_PATH.'templates/');
defined('BLOCKS_TRANSLATIONS_PATH') || define('BLOCKS_TRANSLATIONS_PATH', BLOCKS_BASE_PATH.'translations/');
defined('YII_TRACE_LEVEL')          || define('YII_TRACE_LEVEL', 3);

// Load Yii
require_once BLOCKS_APP_PATH.'framework/yiit.php';
Yii::$enableIncludePath = false;
require_once BLOCKS_APP_PATH.'Blocks.php';
require_once BLOCKS_APP_PATH.'App.php';
require_once BLOCKS_APP_PATH.'Info.php';

// Blocks shits itself if there is no server or request path
$_SERVER['HTTP_HOST'] = 'example.com';
$_SERVER['REQUEST_URI'] = '/';

// Load test database
$config = require_once BLOCKS_APP_PATH.'config/test.php';
$config['params']['dbConfig'] = array();
$config['components']['db'] = array();

// Create app instance
$app = new \Blocks\App($config);

// Load plugin
require_once BLOCKS_PLUGINS_PATH.'cocktailrecipes/CocktailRecipesPlugin.php';
require_once BLOCKS_PLUGINS_PATH.'cocktailrecipes/vendor/autoload.php';
