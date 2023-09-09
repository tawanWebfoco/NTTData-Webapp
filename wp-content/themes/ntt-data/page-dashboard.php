<?php
require_once(dirname(__FILE__) . '/app/src/config/config.php');

$uri = 'dashboard/dashboard.php';

require(CONTROLLER_PATH . "/$uri");
