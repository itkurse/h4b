<?php
/**
 * Diese Klasse enthält Funktionen um User in der Datenbank
 * einzufügen, auszulesen, bearbeiten, und zu löschen. 
 * Sie enthält ebenso den User-Login. 
 */
class UserService 
{
    // Über diese Variable können alle Funktionen dieses 
    // Objekts auf die DB-Connection zugreifen 
    private PDO $conn; 
    public function __construct(PDO $conn)
    {
        $this->conn = $conn; 
    }


    // Erstellt einen neuen User in der Datenbank
    // Gibt die ID des neuen Users zurück
    public function createUser(string $vorname, string $nachname,
                                DateTime $geburtsdatum, string $email,
                                string $passwort, bool $is_admin) : int 
    {
        // Prepared Statement
        $ps = $this->conn->prepare('
            INSERT INTO user 
            (vorname, nachname, email, passwort, geburtsdatum, is_admin)
            VALUES
            (:vorname, :nachname, :email, :passwort, :geburtsdatum, :is_admin)
        ');
        // Platzhalter (Named Parameters, z. B. :vorname) mit 
        // den eigentlichen Werten ersetzen
        // Schutz gegen SQL Injections!
        $ps->bindValue('vorname', $vorname);
        $ps->bindValue('nachname', $nachname);
        $ps->bindValue('email', $email);
        $ps->bindValue('passwort', $passwort);

        // Geburtsdatum!
        $ps->bindValue('geburtsdatum', $geburtsdatum->format('Y-m-d'));

        $ps->bindValue('is_admin', $is_admin);

        // SQL-Befehl an die Datenbank senden
        $ps->execute();

        // Welche ID hat die Datenbank generiert?
        $userId = $this->conn->lastInsertId();

        return $userId;
    }



    // Lädt alle User aus der Datenbank und gibt sie als Array 
    // von Objekten der Klasse User zurück
    public function getUsers() : array 
    {
        $ps = $this->conn->prepare('
            SELECT * 
            FROM user
        ');
        $ps->execute();

        $users = [];
        while($row = $ps->fetch())
        {
            $geburtsdatum = DateTime::createFromFormat('Y-m-d', $row['geburtsdatum']);
            $user = new User($row['id'], $row['vorname'], $row['nachname'],
                        $row['email'], $row['passwort'], $geburtsdatum, 
                        $row['is_admin']);
            $users[] = $user; 
        }
        return $users; 
    }


}
?>