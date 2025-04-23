<?php
  include("./src/jpgraph.php");
  include("./src/jpgraph_line.php");
  $datos1 = array(9, 5, 12, 11, 6, 10, 9, 11, 10, 4, 7, 3);
  $datos2 = array(5, 7, 1, 11, 13, 4, 9, 6, 12, 7, 1, 4);
  $grafico = new Graph(400, 300, "auto");
  $grafico->SetScale("textlin");
  $grafico->title->Set("Ejemplo JpGraph");
  $grafico->xaxis->title->Set("Eje X");
  $grafico->yaxis->title->Set("Eje Y");
  $lineplot1 = new LinePlot($datos1);
  $lineplot1->SetColor("red");
  $lineplot2 = new LinePlot($datos2);
  $lineplot2->SetColor("green");
  $grafico->Add($lineplot1);
  $grafico->Add($lineplot2);
  $grafico->Stroke();
?>