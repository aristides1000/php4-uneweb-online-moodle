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

  /*
    Configura las rutas donde PHP busca los archivos a incluir.

    Agrega el directorio ./src/ al principio de la lista de rutas de inclusión
    PATH_SEPARATOR es una constante que usa ; en Windows o : en Unix/Linux
    get_include_path() obtiene la configuración actual de rutas
    Esto hace que PHP busque archivos primero en ./src/ y luego en las rutas normales
  */
  set_include_path('./src/'.PATH_SEPARATOR.get_include_path());

  // Incluir la librería PDF-PHP
  require_once('./src/Cezpdf.php'); // si incluyes manualmente
  // O usar require_once('vendor/autoload.php'); Si instalaste via Composer


  // Crear instancia del PDF
  // Crear instancia de Cezpdf correctamente
  /*
    'a4': Especifica el tamaño del papel (también podría ser 'letter', 'legal', etc.)

    'portrait': Establece la orientación de la página (vertical). Alternativa: 'landscape' (horizontal)

    Qué hace: Crea un nuevo documento PDF con tamaño A4 en orientación vertical
  */
  $pdf = new Cezpdf('a4', 'portrait');

  // Configurar márgenes (opcional)
  /*
    Parámetros en orden: (superior, inferior, izquierdo, derecho)

    Unidades: Los valores están en puntos (1 punto = 1/72 de pulgada ≈ 0.35mm)

    Qué hace: Establece márgenes de 20 puntos en todos los lados del documento
  */
  $pdf->ezSetMargins(20, 20, 20, 20);

  // Seleccionar fuente - asegúrate de que la ruta es correcta
  $fontPath = './src/fonts/Courier.afm';
  if (!file_exists($fontPath)) {
    die("Error: El archivo de fuente no existe en: $fontPath");
  }
  /*
    $fontPath: Ruta al archivo de fuente (.afm)

    Qué hace: Carga y establece la fuente que se usará para el texto. En este caso, 'Courier'
  */
  $pdf->selectFont($fontPath);

  // Agregar contenido
  /*
    "Título": Texto a mostrar

    20: Tamaño de fuente en puntos

    Qué hace: Escribe el texto "Título" con tamaño de 20 puntos en la posición actual
  */
  $pdf->ezText("Título", 20);
  /*
    -10: Cantidad de puntos a mover (negativo = hacia arriba, positivo = hacia abajo)

    Qué hace: Mueve la posición de escritura 10 puntos hacia arriba (reduce el espacio entre líneas)
  */
  $pdf->ezSetDy(-10);  // Nota: el método correcto es ezSetDy (case sensitive)
  $pdf->ezText("prueba\n\n", 12);
  $pdf->ezSetDy(-10);
  /*
    <b>Fecha:</b>: Texto en negrita (formato básico HTML)

    date("d/m/Y"): Función PHP que devuelve la fecha actual en formato día/mes/año

    10: Tamaño de fuente

    Qué hace: Escribe "Fecha: [fecha actual]" con "Fecha:" en negrita y tamaño 10pt
  */
  $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
  $pdf->ezSetDy(-10);
  $pdf->ezText("<b>Hora:</b> ".date("H:i:s"), 10); // Similar al anterior pero muestra la hora actual en formato horas:minutos:segundos

  // Generar el PDF
  $pdf->ezStream();
?>