<?php

session_start();

require_once './core/Database.php';
require_once './app/Models/BaseModel.php';
require_once './app/Controllers/BaseController.php';
require_once './helpers/view.php';
require_once './helpers/css.php';
require_once './configs/routes.php';
require_once './core/Route.php';
require_once './app/App.php';

$app = new App();