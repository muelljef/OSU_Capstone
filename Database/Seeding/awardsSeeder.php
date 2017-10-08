<?php
require_once __DIR__ . '/../../Config/database.php';
require_once __DIR__ . '/datasets.php';

$mysqli = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($mysqli->connect_error) {
	die('Connection failed: ' . $mysqli->connect_error);
}

// retrieve the award types
$awardTypesStmt = $mysqli->prepare("SELECT * FROM Awards");
if(!$awardTypesStmt->execute()) {
    error_log('Failed to get award types');
    exit();
}
$awardTypes = $awardTypesStmt->get_result()->fetch_all(MYSQLI_ASSOC);

// TODO: Add Awards Given
    // select users with hireDate before the first of the month, week, etc
    // Monthly
    // Weekly
    // Honorable mention (4 monthly)

echo "done\n";
