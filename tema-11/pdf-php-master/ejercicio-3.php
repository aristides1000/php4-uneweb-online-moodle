<?php
  /*
  Establece el tiempo máximo de ejecución del script en segundos.

  Detalles:
  1800 segundos = 30 minutos
  Por defecto PHP tiene un límite de ejecución (normalmente 30 segundos)
  Esto es útil para scripts largos como generación de PDFs complejos
  Si el script excede este tiempo, PHP lo terminará con un error
  */
  set_time_limit(1800);

  set_include_path('./src/'.PATH_SEPARATOR.get_include_path());

  // Incluir la librería PDF-PHP
  require_once('./src/Cezpdf.php'); // si incluyes manualmente
  // O usar require_once('vendor/autoload.php'); Si instalaste via Composer


  // Crear instancia del PDF
  // Crear instancia de Cezpdf correctamente
  $pdf = new Cezpdf('a4', 'portrait');

  // Configurar márgenes (opcional)
  $pdf->ezSetMargins(20, 20, 20, 20);

  // Seleccionar fuente - asegúrate de que la ruta es correcta
  $fontPath = './src/fonts/Courier.afm';
  if (!file_exists($fontPath)) {
    die("Error: El archivo de fuente no existe en: $fontPath");
  }
  $pdf->selectFont($fontPath);

  // Agregar contenido
  $pdf->ezText("Título", 20);
  $pdf->ezSetDy(-10);  // Nota: el método correcto es ezSetDy (case sensitive)
  $pdf->ezText("prueba\n\n", 12);
  $pdf->ezSetDy(-10);
  $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
  $pdf->ezSetDy(-10);
  $pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10);

  // Generar el PDF
  $pdf->ezStream();
?>