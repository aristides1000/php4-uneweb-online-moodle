<?php
  include("./src/jpgraph.php"); // Incluye el archivo principal de JpGraph que contiene las funciones básicas para crear gráficos
  include("./src/jpgraph_line.php"); // Incluye específicamente las funciones para gráficos de líneas (LinePlot)
  $datos1 = array(9, 5, 12, 11, 6, 10, 9, 11, 10, 4, 7, 3); // Crea el primer conjunto de datos (12 valores numéricos)
  $datos2 = array(5, 7, 1, 11, 13, 4, 9, 6, 12, 7, 1, 4); // Crea el segundo conjunto de datos (12 valores numéricos)

  /*
    Crea un nuevo objeto Graph (el contenedor del gráfico)

      400: Ancho del gráfico en píxeles
      300: Alto del gráfico en píxeles
      "auto": Tamaño automático de caché
  */
  $grafico = new Graph(400, 300, "auto");
  $grafico->SetScale("textlin"); // "textlin": Eje X con texto (automático) y eje Y lineal (valores numéricos)
  $grafico->title->Set("Ejemplo JpGraph"); // Establece el título principal del gráfico
  $grafico->xaxis->title->Set("Eje X"); // Establece el título del eje X (horizontal)
  $grafico->yaxis->title->Set("Eje Y"); // Establece el título del eje Y (vertical)
  $lineplot1 = new LinePlot($datos1); // Crea la primera línea usando los datos de $datos1
  $lineplot1->SetColor("red"); // Establece el color de la primera línea como rojo
  $lineplot2 = new LinePlot($datos2); // Crea la segunda línea usando los datos de $datos2
  $lineplot2->SetColor("green"); // Establece el color de la segunda línea como verde
  $grafico->Add($lineplot1); // Añade la primera línea al gráfico principal
  $grafico->Add($lineplot2); // Añade la segunda línea al gráfico principal
  $grafico->Stroke(); // Genera y muestra/imprime el gráfico final
?>