<?php
// Erstelle für jede DB-Tabelle eine Klasse:
// Tabellenname --> Klassennamen
// Aus jeder Spalte der Tabelle --> Eigenschaft der Klasse

class User {
    // Eigenschaften der Klasse
    public int $id;
    public string $email;
    public string $passwort;
    public string $vorname;
    public string $nachname;
    public bool $is_admin;

    public function __construct(int $id, string $email, 
                                string $passwort, string $vorname, 
                                string $nachname, bool $is_admin)
    {
        $this->id = $id;
        $this->email = $email;
        $this->passwort = $passwort;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->is_admin = $is_admin;
    }
}

?>