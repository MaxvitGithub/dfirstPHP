<?php
// Set delay 1 second. 
sleep(1);

include_once('../db/con_site_bar.php');

// // Create connection connect to mysql database
// $dbCon = mysqli_connect('localhost', 'root', '') ;

// // Select database.
// mysqli_select_db($dbCon, 'adoxy_first');

// // Set encoding.
// mysqli_set_charset($dbCon,"utf8");

// Next dropdown list.
$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {
	case 'amphur':
		$provinceID = isset($_GET['provinceID']) ? $_GET['provinceID'] : '';
		$sql = "
			SELECT
				AMPHUR_ID,
				AMPHUR_NAME,
				AMPHUR_NAME_ENG
			FROM
				amphur
			WHERE PROVINCE_ID = '{$provinceID}'
			ORDER BY CONVERT(AMPHUR_NAME_ENG USING TIS620) ASC;
		";
		break;
	case 'tumbon':
		$amphurID = isset($_GET['amphurID']) ? $_GET['amphurID'] : '';
		$sql = "
			SELECT
				DISTRICT_ID,
				DISTRICT_NAME
			FROM
				district
			WHERE AMPHUR_ID = '{$amphurID}'
			ORDER BY CONVERT(DISTRICT_NAME USING TIS620) ASC;
		";
		break;
}

$data = array();
$result = $mysqli -> query($sql);
while($row = $result -> fetch_assoc()) {
	$data[] = $row;
}

// Print the JSON representation of a value
echo json_encode($data);
?>
