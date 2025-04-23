<?php
class Producto
{
  public $nombre;
  public $precio;

  public function __construct($nombre, $precio)
  {
    $this->nombre = $nombre;
    $this->precio = $precio;
  }

  public function mostrarInfo()
  {
    return "Producto: $this->nombre, Precio: $this->precio";
  }
}

// Creación de objetos
$producto1 = new Producto("Laptop", 1200);
$producto2 = new Producto("Teléfono", 600);

echo $producto1->mostrarInfo(); // "Producto: Laptop, Precio: 1200"
echo "<br>";
echo $producto2->mostrarInfo(); // "Producto: Teléfono, Precio: 600"
