<?php
class Vehiculo{

public $matricula;
private $color;
private $serialMotor;
protected $encendido;

    public function encender(){
        $this->encendido = true;
        echo 'Vehiculo encendido <br />';
    }
    public function apagar(){
    $this->encendido = false;
    echo 'Vehiculo apagado <br />';
    }
}

class Camion extends Vehiculo{

private $carga;
    public function cargar($cantidadCargar){
        $this->carga = $cantidadCargar;
        echo 'Se ha cargado cantidad: '. $cantidadCargar. ' <br />';
    }
    public function verificarEncendido(){
        if ($encendido == true){
            echo 'Camion encendido <br />';
        } else {
            echo 'Camion apagado <br />';
        }
    }
}

class Autobus extends Vehiculo{

private $pasajeros;
    public function subirPasajeros($cantidad_pasajeros){
        $this->pasajeros = $cantidad_pasajeros;
        echo 'Se han subido '.$cantidad_pasajeros.' pasajeros <br />';
    }
    public function verificarEncendido(){
        if ($encendido == true){
            echo 'Autobus encendido <br />';
        }else{
            echo 'Autobus apagado <br />';
        }
    }
}

$camion = new Camion();    // encender() es un metodo de la clase padre
$camion->encender();         // pero al ser un metodo publico es herado por la clase hijo
// en este caso Camion y por lo tanto puede ser llamado desde un objeto de Camion

$camion->cargar(10);                // Lo mismo que ocurre con el metodo encender() se
$camion->verificarEncendido();   // aplica para la propiedad de matricula y el metodo apagar.
$camion->matricula = 'xyz1';     //  Son metodos y propiedades publicas por lo tanto el hijo las hereda
$camion->apagar();

$autobus = new Autobus();
$autobus->encender();
$autobus->subirPasajeros(5);
$autobus->verificarEncendido();
$autobus->matricula = 'rfg5678';
$autobus->apagar();