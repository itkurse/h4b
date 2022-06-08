<?php

// PDO: eine Art der Datenbankverbindung 
// (eine Alternative zum mysqli)
function db_connection() : PDO {
    try {
        // try: hier schreiben was möglicherweise einen Fehler auslösen könnte

        $host = 'localhost';
        $dbName = 'users0405222';
        $username = 'root';
        $password = '';

        // Die Datenbankverbindung aufbauen
        $connection = new PDO("mysql:dbname=$dbName; host=$host", 
                                $username, $password);
        // DB-Connection so konfigurieren, dass auch Fehlermeldungen ausgegeben werden
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Connection zurückgeben
        return $connection;

    } catch (PDOException $e){
        // catch-Block wird nur ausgeführt wenn im try ein Fehler geschah
        // catch() <-- in den runden Klammern der Fehltertyp angegeben 
        // auf den man reagieren möchte

        // Im Fehlerfall: Script beenden, Fehlermeldung ausgeben
        exit($e->getMessage());
    }
}
?>