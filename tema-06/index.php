<?php
  function sumar($numero1, $numero2){
    if(is_numeric($numero1) and is_numeric($numero2)){//Verificosi son numéricos.
      return $numero1 + $numero2;
    }else{
      throw new Exception('no son numéricos'); //Crea una excepción.
      return 0;
    }
  }
  try{
    echo sumar('dwe', '2eww');//función con cadenas
  }catch(Exception $e){
    echo $e->getMessage();
  }
?>