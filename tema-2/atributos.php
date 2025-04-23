<?php
class Coche {
  public $marca;          // Accesible desde cualquier lugar
  protected $modelo;      // Accesible solo dentro de la clase y subclases
  private $kilometraje;   // Accesible solo dentro de esta clase

  // Constructor para inicializar atributos
  public function __construct($marca, $modelo, $km) {
      $this->marca = $marca;
      $this->modelo = $modelo;
      $this->kilometraje = $km;
  }
}

$miCoche = new Coche("Toyota", "Corolla", 50000);
echo $miCoche->marca; // Funciona (public)
echo $miCoche->modelo; // Error (protected)
echo $miCoche->kilometraje; // Error (private)
?>