<?php
class oRG_BDConector //CREAMOS LA CLASE
{
  var $servidor; //ATRIBUTOS
  var $usuario;
  var $password;
  var $bd;
  var $consulta;
  var $enlace;
  var $resultado;
  var $error;

  function oRG_BDConector($ser, $usu, $pass, $base) //CONSTRUCTOR
  {
    $this->servidor = $ser;
    $this->usuario = $usu;
    $this->password = $pass;
    $this->bd = $base;
  }
  function oConectar() //METODO CONECTAR CON LA BASE DE DATOS
  {
    $this->enlace = mysqli_connect($this->servidor, $this->usuario, $this->password);
    mysqli_select_db($this->enlace, $this->bd);
    return $this->enlace;
  }
  function oEjecutar($query) //METODO PARA EJECUTAR UNA SENTENCIA
  {
    $this->consulta = mysqli_query($this->enlace, $query) or die('Error: ' . mysql_error());
    return $this->consulta;
  }
  function oUltimo() //UN METODO OPCIONAL
  {
    return mysqli_insert_id($this->enlace); //mysqli_insert_id devuelve directamente el                   identificador de la última inserción
  }
  function oNumreg() //METODO QUE CALCULA EL NUMERO DE FILAS EN LA TABLA
  {
    $this->total = mysqli_num_rows($this->consulta);
    return $this->total;
  }
  function oDatosarray($consulta = NULL) //METODO QUE EXTRAE EN UN ARREGLO
  {
    if ($consulta) $this->consulta = $consulta;
    $this->resultado = mysqli_fetch_array($this->consulta);
    return $this->resultado;
  }
  public function oLimpiaconsulta() //OTROS METODOS QUE NOS PUEDEN SERVIR A FUTURO
  {
    mysqli_free_result($this->consulta); //mysql_free_result Libera la memoria del Resultado
  }
  public function oCerrarconexion()
  {
    mysqli_close($this->enlace); //cerrar la conexión con la bd
  }
}
//INSTANCIAMOS LA CLASE, PRIMERO CREAMOS EL OBJETO
$con = new oRG_BDConector('localhost', 'root', '', 'php4');
$con->oConectar(); //INVOCAMOS EL METODO A USAR
$sql = $con->oEjecutar("SELECT * FROM cliente");
//echo $con->oNumreg();

while ($row = mysqli_fetch_array($sql)) {
  echo $row[0] . " " . $row[1] . "<br>";  //se imprime todas las filas extraidas de la de base de datos
}
$con->oLimpiaconsulta();
$con->oCerrarconexion();
