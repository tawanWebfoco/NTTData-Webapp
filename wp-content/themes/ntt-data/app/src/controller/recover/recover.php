<?php 
Model::sanetizePost($_POST);

$type = isset($_POST['type']) ? $_POST['type'] : '';

$invited = null;
$invited = (isset($_GET[md5('invited')])) ? $_GET[md5('invited')] : null;

$recover = null;
$recover = (isset($_GET[md5('recover')])) ? $_GET[md5('recover')] : null;



$exception = null;

switch ($type) {
    case md5('recover'):
            require(CONTROLLER_PATH . "/recover/sendEmailRecoverPass.php");
        break;
 }

 loadView('recover/recover', $_POST + ['exception' => $exception, 'invited' => $invited, 'recover' => $recover]);


