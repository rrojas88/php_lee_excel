<?php


function insertRow ( $connect, $code, $currency, $countries )
{
	$sql = "INSERT INTO currencies (code, currency, countries) VALUES (?, ?, ?)";
	$stmt= $connect->prepare($sql);
	$stmt->execute([$code, $currency, $countries ]);
	
	$lastInsertId = $connect->lastInsertId();
	return $lastInsertId;
}


$num = 0;
for( $row = 2; $row <= $highestRow; $row++ ){
	$num++;
	$code = $sheet->getCell('A'.$row)->getValue();
	$currency = $sheet->getCell('B'.$row)->getValue();
	$countries = $sheet->getCell('C'.$row)->getValue();

	$row_id = insertRow( $connect, $code, $currency, $countries );

	echo 'RowID = ' . $row_id . '<br />';
}
echo '<p>Fin Script</p><br />'.$salto;

?>
