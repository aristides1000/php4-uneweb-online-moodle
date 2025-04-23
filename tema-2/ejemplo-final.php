<?php
class Usuario
{
  private $nombre;
  private $email;

  public function __construct($nombre, $email)
  {
    $this->nombre = $nombre;
    $this->email = $email;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function enviarMensaje($mensaje)
  {
    echo "Enviando \'$mensaje\' a $this->email";
  }
}

$usuario = new Usuario("Ana", "ana@ejemplo.com");
echo $usuario->getNombre(); // "Ana"
echo "<br>";
$usuario->enviarMensaje("Hola"); // "Enviando \'Hola\' a ana@ejemplo.com"
