<?php
  class Imagen
  {
    private $src; //atributos
    private $width;
    private $height;

    public function __construct($src, $width, $height) // CONSTRUCTOR
    {
      $this -> src = $src;
      $this -> width = $width;
      $this -> height = $height;
    }

    public function imprimir() //METODO
    {
      echo '<img src="' . $this->src . '" width="' . $this -> width . '" height="' . $this -> height . '" />';
    }
  }

  $logo = new Imagen("./1.png", "75px", "auto"); //OBJETO
  $logo -> imprimir(); //INVOCAMOS EL METODO
?>