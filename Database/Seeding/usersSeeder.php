<?php
require_once __DIR__ . '/../../Config/database.php';
require_once __DIR__ . '/datasets.php';

$mysqli = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if ($mysqli->connect_error) {
	die('Connection failed: ' . $mysqli->connect_error);
}

// retrieve the award types
$employeeStmt = $mysqli->prepare("SELECT * FROM Awards");
if(!$employeeStmt->execute()) {
    error_log('Failed to get award types');
    exit();
}
$awardTypes = $employeeStmt->get_result()->fetch_all(MYSQLI_ASSOC);

$employeeStmt = $mysqli->prepare("
    INSERT INTO Employees (fName, lName, hireDate, Email, Password, CreatedOn)
    VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)
");

$firstName = $lastName = $hireDateStr = $email = $password = '';
$employeeStmt->bind_param('sssss', $firstName, $lastName, $hireDateStr, $email, $password);

$employeeId = $type = '';
$userTypeStmt = $mysqli->prepare("INSERT INTO UserType (EmployeeID, Type) VALUES (?, ?)");
$userTypeStmt->bind_param('is', $employeeId, $type);

// ADD EMPLOYEES
for($i = 0; $i < 52; $i++) {
    // Choose a random hire date
    $start = new DateTime('2015-01-01');
    $randNum = rand(0, 1010);
    $interval = new DateInterval('P' . $randNum . 'D');
    $hireDate = $start->add($interval);
    $hireDateStr = $hireDate->format('Y-m-d');

    $password = password_hash(uniqid(), PASSWORD_DEFAULT);

    // Choose a name
    $randFirst = rand(0, 49);
    $randLast = rand(0, 49);
    $firstName = $firstnames[$randFirst];
    $lastName = $lastnames[$randLast];
    $email = strtolower($firstName) . '.' . strtolower($lastName) . '@gemini.com';

    $employeeStmt->execute();

    // Add UserType
    $employeeId = $mysqli->insert_id;
    // this should result in two admin users created
    $type = $i < 50 ? 'user' : 'admin';
    $userTypeStmt->execute();
}

// Add Awards Given
    // select users with hireDate before the first of the month, week, etc
    // Monthly
    // Weekly
    // Honorable mention (4 monthly)

$employeeStmt->close();
$userTypeStmt->close();

echo "done\n";
