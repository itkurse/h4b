<?php
require_once 'db/dbconnection.inc.php';
require_once 'model/user.inc.php';
require_once 'service/userservice.inc.php';

$conn = db_connection();

// Erzeuge ein Objekt der Klasse UserService
// und gebe die DB-Connection $conn mit ins Objekt
$userService = new UserService($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registrierung mit Login</h1>
    <ul>
        <li><a href="registration.php">Registrierung</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>