<?php

// PHP sucks at resolving symlinked directories
define('CRAFT_BASE_PATH', realpath(str_replace("plugins/cocktailrecipes", '', exec('pwd'))).'/');

// Define app constants
defined('CRAFT_APP_PATH')          || define('CRAFT_APP_PATH',          CRAFT_BASE_PATH.'app/');
defined('CRAFT_CONFIG_PATH')       || define('CRAFT_CONFIG_PATH',       CRAFT_BASE_PATH.'config/');
defined('CRAFT_PLUGINS_PATH')      || define('CRAFT_PLUGINS_PATH',      CRAFT_BASE_PATH.'plugins/');
defined('CRAFT_STORAGE_PATH')      || define('CRAFT_STORAGE_PATH',      CRAFT_BASE_PATH.'storage/');
defined('CRAFT_TEMPLATES_PATH')    || define('CRAFT_TEMPLATES_PATH',    CRAFT_BASE_PATH.'templates/');
defined('CRAFT_TRANSLATIONS_PATH') || define('CRAFT_TRANSLATIONS_PATH', CRAFT_BASE_PATH.'translations/');
defined('YII_TRACE_LEVEL')          || define('YII_TRACE_LEVEL', 3);

// Load Yii
require_once CRAFT_APP_PATH.'framework/yiit.php';
Yii::$enableIncludePath = false;
require_once CRAFT_APP_PATH.'Craft.php';
require_once CRAFT_APP_PATH.'etc/web/WebApp.php';
require_once CRAFT_APP_PATH.'Info.php';

// Craft shits itself if there is no server or request path
$_SERVER['HTTP_HOST'] = 'example.com';
$_SERVER['REQUEST_URI'] = '/';

// Load test database
$config = require_once CRAFT_APP_PATH.'etc/config/test.php';
$config['params']['dbConfig'] = array();
$config['components']['db'] = array();

// Create app instance
$app = new \Craft\WebApp($config);

// Load plugin
require_once CRAFT_PLUGINS_PATH.'cocktailrecipes/CocktailRecipesPlugin.php';
require_once CRAFT_PLUGINS_PATH.'cocktailrecipes/vendor/autoload.php';
