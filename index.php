<?php

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$domainPage = "http://localhost/du_an_mau";

require_once './core/Database.php';
require_once './app/Models/BaseModel.php';
require_once './app/Controllers/BaseController.php';
require_once './helpers/view.php';
require_once './helpers/css.php';
require_once './configs/routes.php';
require_once './core/Route.php';
require_once './app/App.php';

$app = new App();