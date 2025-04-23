<?php
  require_once ('./src/jpgraph.php'); // Carga el archivo principal de la librería JpGraph que contiene las funciones básicas para crear gráficos
  require_once ('./src/jpgraph_bar.php'); // Carga específicamente las funciones para gráficos de barras (BarPlot)

  // Creamos el grafico
  $datos=array(6,5,8,6); // Crea un array con los valores numéricos que representarán las alturas de las barras
  $labels=array("pepe","juanita","Maria","Luis"); // Crea un array con las etiquetas que se mostrarán en el eje X (nombres de trabajadores)


  /*
    Crea un nuevo objeto Graph (el contenedor del gráfico)

    500: Ancho del gráfico en píxeles
    400: Alto del gráfico en píxeles
    'auto': Tamaño automático de caché
  */
  $grafico = new Graph(500, 400, 'auto');
  $grafico->SetScale("textlin"); // "textlin": Eje X con texto (labels) y eje Y lineal (valores numéricos)
  $grafico->title->Set("Ejemplo de Grafica"); // Establece el título principal del gráfico
  $grafico->xaxis->title->Set("trabajadores"); // Establece el título del eje X (eje horizontal)
  $grafico->xaxis->SetTickLabels($labels); // Asigna las etiquetas al eje X usando el array $labels creado antes
  $grafico->yaxis->title->Set("Horas Trabajadas"); // Establece el título del eje Y (eje vertical)

  $barplot1 =new BarPlot($datos);// Crea un gráfico de barras (BarPlot) usando los datos del array $datos
  $barplot1->SetWidth(30); // 30 pixeles de ancho para cada barra

  $grafico->Add($barplot1); // Añade el gráfico de barras al gráfico principal
  $grafico->Stroke(); // Genera y muestra/imprime el gráfico final
?>