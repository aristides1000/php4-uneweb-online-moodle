<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tema 4</title>
</head>
<body>
  <?php
    class nombreClase
    {
        function metodoA()
        {
            return "llamaste métodoA";
        }

        function metodoB($parametro1)
        {
            return "llamaste metodoB".$parametro1;
        }
    }

    $obj = new nombreClase(); //se crea el objeto
    echo $obj->metodoA(); //se utiliza el metodoA
    echo "<br>";
    echo $obj->metodoB(" parámetro");//se utiliza el metodoB con su parametro
    echo "<br>";
    $retorno = $obj->metodoB(" Hola");
    echo $retorno;
  ?>
</body>
</html>