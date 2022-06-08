<?php
require_once 'models.inc.php';
session_start();

if(!isset($_SESSION['rechtecke']))
{
    $_SESSION['rechtecke'] = [];
}

if(isset($_POST['bt_add']))
{
    $laenge = $_POST['laenge'];
    $breite = $_POST['breite'];

    $rechteck = new Rechteck($laenge, $breite);

    $_SESSION['rechtecke'][] = $rechteck;
}

?>
<form action="index.php" method="POST">
    <label>Länge:</label><br>
    <input type="text" name="laenge"><br>
    <label>Breite:</label><br>
    <input type="text" name="breite"><br>
    <button name="bt_add">Rechteck hinzufügen</button>
</form>

<h2>Rechtecke</h2>
<?php
for($i = 0; $i < count($_SESSION['rechtecke']); $i++)
{
    $r = $_SESSION['rechtecke'][$i];
    echo '<p> Länge: ' . $r->l . '</p>';
}
?>