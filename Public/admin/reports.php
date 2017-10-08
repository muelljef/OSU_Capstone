<?php

require_once __DIR__ . '/../../Controllers/ReportsController.php';

$reportsController = new \controllers\ReportsController();
$reportsController->respond($_REQUEST);
