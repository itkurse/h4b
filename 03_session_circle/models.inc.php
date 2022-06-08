<?php
class Circle {
    public float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getUmfang() : float 
    {
        return 2.0 * pi() * $this->radius;
    }

    public function getKreisflaeche() : float 
    {
        return pi() * pow($this->radius, 2);
    }
}
?>