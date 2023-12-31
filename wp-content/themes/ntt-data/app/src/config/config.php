<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8','portuguese');



// Constantes gerais
// define('DAILY_TIME', 60*60*8);

// Pastas

define('MODEL_PATH', dirname(__FILE__,2).'/model');
define('VIEW_PATH', (dirname(__FILE__,2).'/view'));
define('TEMPLATE_PATH', (dirname(__FILE__,2).'/view/template'));
define('CONTROLLER_PATH', (dirname(__FILE__,2).'/controller'));
define('EXTRA_PATH', (dirname(__FILE__,2).'/extra'));
define('EXCEPTION_PATH', (dirname(__FILE__,2).'/exceptions'));
define('LANGUAGES_PATH', (dirname(__FILE__,4).'/languages'));


// Arquivos
require_once(realpath(dirname(__FILE__).'/database.php'));
require_once(realpath(dirname(__FILE__,7).'/vendor/autoload.php'));
require_once(realpath(dirname(__FILE__).'/loader.php'));
require_once(realpath(dirname(__FILE__).'/session.php'));
// require_once(realpath(dirname(__FILE__).'/date_utils.php'));


require_once(MODEL_PATH .'/Model.php');
require_once(MODEL_PATH .'/User.php');
require_once(MODEL_PATH .'/Guest.php');
require_once(MODEL_PATH .'/Pub.php');
require_once(MODEL_PATH .'/Engaged.php');
require_once(MODEL_PATH .'/Comment.php');
require_once(MODEL_PATH .'/Country.php');
require_once(EXCEPTION_PATH .'/AppException.php');
require_once(EXCEPTION_PATH .'/ValidationException.php');
require_once(LANGUAGES_PATH.'/common.php');
