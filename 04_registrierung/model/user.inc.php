<?php
class User 
{
    public int $id;
    public string $vorname;
    public string $nachname;
    public string $email;
    public string $passwort;
    public DateTime $geburtsdatum;
    public bool $is_admin;

    public function __construct(int $id, string $vorname,
                                string $nachname, string $email,
                                string $passwort, DateTime $geburtsdatum,
                                bool $is_admin)
    {
        $this->id = $id;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->email = $email;
        $this->passwort = $passwort;
        $this->geburtsdatum = $geburtsdatum;
        $this->is_admin = $is_admin;
    }
}
?>