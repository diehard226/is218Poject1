<?php
$csv = array();
// open csvfile
$row = 1;
if (($handle = fopen("hd2013.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
		array_push($csv, $data);
    }
    fclose($handle);
}
//prints college names and hyper links them
$num = count($csv);
$i = 1;
ob_start();
while ($i < $num){
	echo '<a href=?page=' . $csv[$i][0] . '>' .$csv[$i][1].'</a><br/>';
	$i++;
}
$page = intval($_GET['page']);


?>