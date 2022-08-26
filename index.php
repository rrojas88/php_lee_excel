<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// ===========================================
// =========== CONFIGURAR ====================
$entorno_ejecucion = 'local';

echo '** Conectado a : ' . $entorno_ejecucion;


if( ! isset( $_GET['maestra'] ) ){
	exit('<p>Error, defina en URL la variable: "maestra"</p>');
}

// ===========================================
// =========== CONFIGURAR ====================
$master = 'Maestra Aca!!!!';
// ===========================================

$maestra = $_GET['maestra'];

echo '<p>Maestra URL: '.$maestra.'<br />';
echo 'Maestra Configurada: '.$master.'</p>';

if( $master != $maestra ){
	exit('<p>Las maestras no coinciden</p>');
}


if( $master == 'Monedas' )
{
	$include = 'currencies.php';
	$archivo = "monedas.xlsx";
}
/*
elseif( $master == 'Idiomas' )
{
	$include = 'languages.php';
	$archivo = "idiomas.xlsx";
}
*/
else
{
	exit('<p>Maestra No existe</p>');
}



require_once 'phpExcel/Classes/PHPExcel.php';

require_once 'conexion.php';


$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0);

$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();

$separa = ' | ';
$salto = '<br />';


echo '==== ' . $highestRow;
require_once $include;

?>
