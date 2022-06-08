<?php
/*
Klassen werden geschrieben um eigene Datentypen zu definieren
Klassen bündeln auch Daten, und man kann ihnen Tätigkeiten
in der Form von Methoden hinzufügen. 

Klassen repräsentieren etwas, z. B. Produkt, Kunde, Person, ...
Beim Erstellen von Klassen werden Informationen in logischen
Einheiten gruppiert

--> Kundennummer, Name, Adresse wird in der Klasse "Kunde"  
zusammengefast
--> Artikelnummer, Name, Preis wird in der Klasse "Produkt"
zusammengefasst. 

Die Klasse ist wie ein Bauplan, Objekte sind konkrete Beispiele
Objekt der Klasse Kunde: 5, Hansi, Hauptstraße 7
Objekt der Klasse Kunde: 22, Susi, Anderer Weg 8
Objekt der Klasse Produkt: 1122, Kugelschreiber, 6

Klasse und Objekte sind Themen der OOP 
OOP (Objektorientierte Programmierung)

Konzepte der OOP:
- Vererbung (inheritance)
- Polymorphie (polymorphism): Vielseitigkeit
- Kapselung (encapsulation)

Die Klasse beschreibt die Struktur, dann verwenden wir
die Klasse um Objekte der Klasse zu instanziieren.
Instanziieren bedeutet erstelle ein Objekt der Klasse

Welche Informationen beim Anlegen einer Klasse?
- Name: Wie nenne ich die Klasse? was möchte ich modellieren?
- Eigenschaften: welche Infos (Variablen) möchte ich speichern?
- Konstruktor: Startwerte der Eigenschaften zu initialisieren
- Tätigkeiten: welche Methoden soll jedes Objekt haben?
*/

class Produkt 
{
    // Eigenschaften
    public int $artikelnummer; 
    public string $bezeichnung;
    public float $preis; 

    // Konstruktor: wird jedes mal aufgerufen wenn ein neues
    // Objekt erzeugt wird
    public function __construct(int $artikelnummer, 
                                string $bezeichnung,
                                float $preis)
    {
        $this->artikelnummer = $artikelnummer;
        $this->bezeichnung = $bezeichnung;
        $this->preis = $preis;
    }
}

// Objekte der Klasse "Produkt" erzeugen
$p1 = new Produkt(5, "Tisch", 99.99);
$p2 = new Produkt(99, 'Stift', 0.8);

echo $p1->bezeichnung . '<br>';

// Bezeichnung ändern
$p1->bezeichnung = 'Grosser Tisch';
echo $p1->bezeichnung . '<br>';

?>