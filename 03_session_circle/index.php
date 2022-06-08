<?php
require_once 'models.inc.php';
session_start();

if(!isset($_SESSION['circles']))
{
    $_SESSION['circles'] = [];
}

if(isset($_POST['bt_add']))
{
    $radius = $_POST['radius'];

    // Objekt der Klasse Circle erzeugen
    $circle = new Circle($radius);

    // Das zuvor erzeugte Objekt in die Session einfügen
    $_SESSION['circles'] [] = $circle;

    // POST --> GET 
    // Der Browser soll auf die angegebene Datei weiterleiten
    // ... und das macht er mit einer GET-Request
    header('Location: index.php');
    return;
}

?>
<form action="index.php" method="POST">
    <label>Radius (m):</label><br>
    <input type="text" name="radius"><br>
    <button name="bt_add">Kreis hinzufügen</button>
</form>

<h2>Rechtecke</h2>
<?php
foreach($_SESSION['circles'] as $circle)
{
    echo '<p>r='.$circle->radius 
        . ', Umfang: ' . number_format($circle->getUmfang(), 2, ',','.') . ' m' 
        . ', Kreisfläche: ' . number_format($circle->getKreisflaeche(), 2, ',','.') .' m2</p>';
}
?>