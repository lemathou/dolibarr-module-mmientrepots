<?php

require_once 'main_load.inc.php';


if (($handle = fopen("inventaire.csv", "r")) === FALSE)
	die();

$cols = fgetcsv($handle, 1000, ";");
while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
	if (empty($l_code = $row[2]))
		continue;
	if (empty($p_ref = $row[0]))
		continue;
	
	$sql = 'UPDATE '.MAIN_DB_PREFIX.'product_extrafields p2
		INNER JOIN '.MAIN_DB_PREFIX.'product p ON p.rowid=p2.fk_object
		INNER JOIN '.MAIN_DB_PREFIX.'c_entrepot_loc l
		SET p2.fk_entrepot_loc = l.rowid
		WHERE l.code="'.$l_code.'" AND p.ref="'.$p_ref.'";';
	echo '<p>'.$sql.'</p>';

	if (isset($_GET['go']))
		$q = $db->query($sql);
}

