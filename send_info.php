<?php
include_once('db/con_site_bar.php');
if(empty($_POST['code_property'])){

	echo '<script> location.replace("//www.dfirstproperty.com/"); </script>';

}else{
	$code_property = $_POST['code_property'];

}

$sql2 = "SELECT * FROM post_property WHERE code_property='$code_property'";
$result = $mysqli -> query($sql2);
$row_data = $result -> fetch_assoc();


// Perform query
if($_POST['chek_number'] == $_POST['chek_ok'] && $_POST['url'] != '' ){

	if($result->num_rows > 0){
		$phone=trim($_POST['phone']);
		$name_user=trim($_POST['name_user']);
		$line_id=trim($_POST['line_id']);
		$message=trim($_POST['message']);
		$title_h=trim($row_data['title']);
		$price=trim($_POST['price_user']);
		$name_owner=trim($row_data['name_owner']);
		$phone_owner=trim($row_data['phone_owner']);
		$pro_amp = $row_data['province_name'].$row_data['amphur_name'];
		
		$ex_property = $row_data['ex_property'];		
		$url_send = $_POST['url'];
		
		$date_api = date('d-m-Y');
		$time_api = date('H:i');

		$addtext = 'https://www.dfirstproperty.com/images/property/'.$row_data['img_folder'].'/address.txt';

		$myfile = @file_get_contents($addtext);
		$address_owner = @preg_replace('/[\%\&]/', '-', $myfile);
		$address_owner2 = @preg_replace('/[\%\&]/', '-', $row_data['address_owner']);

		
		$line_token = 'Ca0DfPEvcg2lGLniYtH2CMv9N33nmgMxQidbXlNCdwt';
					if(!empty($line_token)){ /// check token						
						$line_token;	
						// $phone_api = 1;
						// $coin_api = 1;
						// $name_late_api = 1;
						// $address_api = 1;
						// $district_api = 1;
						// $amphur_api = 1;
						// $province_api = 1;
						// $zip_code_api = 1;
						// $line_token = 'L0r34Hn0iFDVRsb0W1tvn08S680NvagI3QQuJc6ywQI';
	
						$url        = 'https://notify-api.line.me/api/notify';                    
						$headers    = [
										'Content-Type: application/x-www-form-urlencoded',
										'Authorization: Bearer '.$line_token
									];
						$fields     = 'message=ลูกค้าติดต่อ
วันที่: '.$date_api.' เวลา: '.$time_api.' น.
----------------------
ชื่อ: '.$name_user.'
เบอร์: '.$phone.'
ไลน์: '.$line_id.'
----------------------
message: 
'.$message.'
----------------------
ราคา: '.$price.'
เขตพื้นที่: '.$pro_amp.'
----------------------
เจ้าของทรัพย์ชื่อ: '.$name_owner.'
เบอร์เจ้าของ: '.$phone_owner.'
----------------------
สถานที่: '.$address_owner.'
'.@$address_owner2.'
'.$ex_property.'
----------------------
คลิกลิ้งค์ด่านล่างนี้';                    
				$ch = curl_init();
				curl_setopt( $ch, CURLOPT_URL, $url);
				curl_setopt( $ch, CURLOPT_POST, 1);
				curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields);
				curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec( $ch );
				curl_close( $ch );			
						// var_dump($result);
						// $result = json_decode($result,TRUE); 

						echo '
						<center><h2> <font color="green">ติดแจ้งทางเว็บไซต์สำเร็จ</font>  รอสักครู่...</h2></center>						
						<meta http-equiv="refresh" content="1;url='.$url_send.'">
						';
			}
			$url        = 'https://notify-api.line.me/api/notify';                    
						$headers    = [
										'Content-Type: application/x-www-form-urlencoded',
										'Authorization: Bearer '.$line_token
									];
	$fields     = 'message=
https://www.dfirstproperty.com/real-estate/'.$code_property;		
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $url);
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields);
			curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			$result = curl_exec( $ch );
			curl_close( $ch );					
			
	$mysqli -> close();	

	}
	
	} elseif ($_POST['chek_number'] != $_POST['chek_ok']) {
		# code...
		echo '<center><h2> <font color="red">กรอกรหัสไม่ตรง </font> <br> รอสักครู่...</h2></center>						
						<meta http-equiv="refresh" content="3;url='.$_POST['url'].'">';
	}
?>