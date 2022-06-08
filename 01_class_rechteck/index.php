<?php
// Modellierung eines Rechtecks

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

// Objekte der Klasse Rechteck erzeugen
$r1 = new Rechteck(10.0, 2.5);
$r2 = new Rechteck(3, 3);

echo 'Länge: ' . $r1->l . ' Breite: ' . $r1->b 
    . ' Fläche: ' . $r1->getFlaeche() . '<br>';

// Umfang des Rechtecks?
// danach: erstelle ein Array mit Rechtecken und 
// berechne die Fläche aller Rechtecke im Array 

?>