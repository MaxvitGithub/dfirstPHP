<?php

include_once('db/con_site_bar.php');

// Next dropdown list.
$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

if($nextList){
switch($nextList) {
	case 'amphures':
		$provinceID = isset($_GET['provinceID']) ? $_GET['provinceID'] : '';
		$sql = "
			SELECT
				AMPHUR_ID,
				AMPHUR_NAME
			FROM
			amphur
			WHERE PROVINCE_ID= '{$provinceID}';
		";       
		break;
}

// Print the JSON representation of a value


$return_arr = array();
$result = $mysqli -> query($sql);
while ($row = $result -> fetch_array()) {   
    $return_arr[] = array(
        "AMPHUR_ID" => $row['AMPHUR_ID'],
        "AMPHUR_NAME" =>  preg_replace('/[\,\*\(\)]/', '', $row['AMPHUR_NAME'] )             
		);
  }

// Print the JSON representation of a value
echo json_encode($return_arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}

?>
