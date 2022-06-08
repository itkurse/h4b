<?php
require_once 'db/dbconnection.inc.php';
require_once 'model/user.inc.php';
require_once 'service/userservice.inc.php';

$conn = db_connection();

// Erzeuge ein Objekt der Klasse UserService
// und gebe die DB-Connection $conn mit ins Objekt
$userService = new UserService($conn);

// Lade alle User
$users = $userService->getUsers();

$errors = [];

if(isset($_POST['bt_registration']))
{
    // Formulardaten einlesen
    $vorname = trim($_POST['vorname']);
    $nachname = trim($_POST['nachname']);
    $geburtsdatum = trim($_POST['geburtsdatum']);
    $email = trim($_POST['email']);
    $passwort = trim($_POST['passwort']);

    // Checkbox admin
    $is_admin = false;
    if(isset($_POST['is_admin'])){
        $is_admin = true;
    }

    // Formularvalidierung
    if($vorname == NULL || strlen($vorname) == 0)
    {
        $errors[] = 'Vorname eingeben!';
    }
    if($nachname == NULL || strlen($nachname) == 0)
    {
        $errors[] = 'Nachname eingeben!';
    }
    if($geburtsdatum == NULL || strlen($geburtsdatum) == 0)
    {
        $errors[] = 'Geburtsdatum eingeben!';
    }
    // Prüfen ob das Geburtsdatum in einem korrekten Format eingegeben wurde
    // Versuche den String in ein Objekt der Klasse DateTime umzuwandeln
    $geburtsdatum = DateTime::createFromFormat('d.m.Y', $geburtsdatum);
    if($geburtsdatum === false)
    {
        $errors[] = 'Geburtsdatum im falschen Format!';
    }
    if($email == NULL || !filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = 'Email ungültig!';
    }
    if($passwort == NULL || strlen($passwort) < 6)
    {
        $errors[] = 'Passwort benötigt mind. 6 Zeichen!';
    }


    if(count($errors) == 0)
    {
        // Registrierung durchführen
        // --> Daten an den UserService weitergeben damit dieser
        // die Registrierung durchführt
        $userId = $userService->createUser($vorname, $nachname, $geburtsdatum,
                                        $email, $passwort, $is_admin);
        echo "User mit der ID $userId angelegt!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
</head>
<body>
    <h1>Registrierung</h1>
    <?php
    // Ausgabe der Fehlermeldungen
    if(count($errors) > 0)
    {
        echo '<ul>';

        // Generiere für jede Fehlermeldung einen Listeneintrag
        for($i = 0; $i < count($errors); $i++)
        {
            echo '<li>' . htmlspecialchars($errors[$i]) . '</li>';
        }

        echo '</ul>';
    }
    ?>
    <form action="registration.php" method="POST">
        <label>Vorname:</label><br>
        <input type="text" name="vorname"><br>

        <label>Nachname:</label><br>
        <input type="text" name="nachname"><br>

        <label>Geburtsdatum (TT.MM.JJJJ):</label><br>
        <input type="text" name="geburtsdatum"><br>

        <label>Email:</label><br>
        <input type="text" name="email"><br>

        <label>Passwort:</label><br>
        <input type="password" name="passwort"><br>

        <input type="checkbox" name="is_admin"><label>Admin?</label><br>

        <button name="bt_registration">Registrieren</button>
    </form>

    <h2>Alle User</h2>
    <?php
    for($i = 0; $i < count($users); $i++)
    {
        echo $users[$i]->vorname . '<br>';
    }
    ?>
</body>
</html>