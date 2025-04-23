<?php
class Calculadora {
  // Atributos
  public $numero1;
  public $numero2;

  // Constructor
  public function __construct($num1, $num2) {
    $this->numero1 = $num1;
    $this->numero2 = $num2;
  }

  // Método para sumar
  public function sumar() {
    return $this->numero1 + $this->numero2;
  }

  // Método para restar
  public function restar() {
    return $this->numero1 - $this->numero2;
  }

  // Método estático (no necesita instancia)
  public static function multiplicar($a, $b) {
    return $a * $b;
  }
}

$calc = new Calculadora(10, 5);
echo $calc->sumar(); // 15
echo "<br>";
echo $calc->restar(); // 5
echo "<br>";

// Método estático (no requiere instancia)
echo Calculadora::multiplicar(3, 4); // 12
?>