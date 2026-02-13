<?php

require_once '../app/controllers/AssetController.php';

$page = $_GET['page'] ?? 'assets';

switch ($page) {

    case 'assets':
        $controller = new AssetController();
        $controller->index();
        break;

    default:
        echo "Page Not Found";
}
