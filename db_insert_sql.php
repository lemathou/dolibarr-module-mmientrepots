<?php

require_once 'main_load.inc.php';

$etg = ['A', 'B', 'C', 'D'];
$pla_nb1 = 5;
$pla_nb2 = 8;
$loc_nb1 = 1;
$loc_nb2 = 10;

$sql_i = [];
foreach($etg as $i) for($j=$pla_nb1;$j<=$pla_nb2;$j++) for($k=$loc_nb1;$k<=$loc_nb2;$k++) {
	$code = $i.'-'.('0'.$j).'-'.($k<10 ?'00' :'0').$k;
	$sql_i[] = '("'.$code.'", "'.$code.'", 1)';
}

$sql = 'INSERT INTO '.MAIN_DB_PREFIX.'c_entrepot_loc
	(`code`, `label`, `active`)
	VALUES '.implode(', ', $sql_i);
echo '<p>'.$sql.'</p>';

if (isset($_GET['insert']))
	$q = $db->query($sql);
