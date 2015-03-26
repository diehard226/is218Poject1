<?php
$csv = array();
// open csvfile

if (($handle = fopen("hd2013.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
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
//Gets the page value which are the unitID
$page = intval($_GET['page']);
//Gets the UnitID into an array
$csvID=array();
$z=0;
$counter = count($csv[0]);
while($z < $counter){
	array_push($csvID,$csv[0][$z]);
	$z++;
}
//checks if the page needs to be cleared for the table of information
$x = 1;
while($x < $num){
	if($page == $csv[$x][0]){
		$u=0;
		ob_end_clean();
		
		while ($u < $counter){
			//echo's out the table
			echo "<b>".$csv[0][$u]."</b>". " " . $csv[$x][$u] ."<br/> \n";
			$u++;
		}
		
		break;
	}
	$x++;
}
?>