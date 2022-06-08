<?php
class Rechteck
{
    // 2 Eigenschaften
    public float $l;
    public float $b;
    // Konstruktor
    public function __construct(float $laenge, float $breite)
    {
        // Zuweisung der Parameter auf die Eigenschaften
        $this->l = $laenge;
        $this->b = $breite;
    }
    // Methoden
    // Berechnet die Fläche des Rechtecks
    public function getFlaeche()
    {
        return $this->l * $this->b;
    }
}
?>