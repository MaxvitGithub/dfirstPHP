<?php
$resultsData = [];

// Retrieve GET parameters with fallback defaults
$type_property_code = isset($_GET['type_property_code']) ? $_GET['type_property_code'] : '';
$type_category_code = isset($_GET['type_category_code']) ? $_GET['type_category_code'] : '';
$province           = isset($_GET['province']) ? (int)$_GET['province'] : 0;
$amphur             = isset($_GET['amphur']) ? (int)$_GET['amphur'] : 0;
$min_sqm            = isset($_GET['min_sqm']) ? (int)$_GET['min_sqm'] : 0;
$max_sqm            = isset($_GET['max_sqm']) ? (int)$_GET['max_sqm'] : 1000000;
$minprice           = isset($_GET['minprice']) ? (int)$_GET['minprice'] : 0;
$maxprice           = isset($_GET['maxprice']) ? (int)$_GET['maxprice'] : 1000000000;

include('db/con_site_bar.php');

if(!empty($type_property_code) && !empty($type_category_code)){
    // Corrected SQL Query
    $sql2 = "SELECT * FROM post_property 
            WHERE type_property_code = '$type_property_code'
            AND type_category_code = '$type_category_code'
            AND (province_id = $province OR $province = 0)
            AND (amphur_id = $amphur OR $amphur = 0)
            AND (sqm BETWEEN $min_sqm AND $max_sqm)
            AND (price BETWEEN $minprice AND $maxprice)";

    $result = $mysqli->query($sql2);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $resultsData[] = [
                'img_folder' => htmlspecialchars($row['img_folder'])
            ];
        }
    }

    $add_title = 'ค้นหาข้อมูลทั้งหมดอสังริมทรัพย์ทั้งหมด';

}else{

// Get the search string from the URL (e.g. ?search_string=example)
$search_string = isset($_GET['search_string']) ? trim($_GET['search_string']) : '';

if ($search_string) {
    $add_title = 'ค้นหาข้อมูลทั้งหมดคำว่า '.$search_string ;

// Use real_escape_string to safely escape user input
$escaped_search = $mysqli->real_escape_string($search_string);

// ปรับปรุง SQL query ให้ถูกต้อง title LIKE '%{$escaped_search}%' OR 
$sql = "SELECT * FROM post_property WHERE title LIKE '%{$escaped_search}%' OR code_property LIKE '%{$escaped_search}%'";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    
        // เพิ่มข้อมูลลงในอาร์เรย์ผลลัพธ์
        $resultsData[] = [
            'img_folder' => htmlspecialchars($row['img_folder'])
        ];

    }
} else {

    $search_string = $escaped_search;

    // ระบุเส้นทางของโฟลเดอร์ที่ต้องการสแกน
    $folderPath = 'images/property';

    // ใช้ glob() ดึงไฟล์ที่มีรูปแบบ [foldername]th.txt ในทุกโฟลเดอร์ภายใน images/property
    $files = glob($folderPath . '/*/*th.txt');

    // สร้างอาร์เรย์สำหรับเก็บผลลัพธ์

    foreach ($files as $filename) {
        // ตรวจสอบว่าเป็นไฟล์จริง
        if (is_file($filename)) {
            // โหลดเนื้อหาทั้งหมดของไฟล์
            $content = file_get_contents($filename);
            
            // ตรวจสอบว่ามีคำค้นหาในเนื้อหาหรือไม่
            if (strpos($content, $search_string) !== false) {
                // แยกส่วนของเส้นทางไฟล์เพื่อดึงชื่อโฟลเดอร์ (สมมติว่าอยู่ในตำแหน่ง index 2)
                $parts = explode('/', $filename);
                $idfile = isset($parts[2]) ? $parts[2] : 'unknown';
                
                // เพิ่มข้อมูลลงในอาร์เรย์ผลลัพธ์
                $resultsData[] = [
                    'img_folder' => $idfile
                ];
            }
        }
    }


    }

    // Close the database connection
    $mysqli->close();

    }
}

include('db/con_site_bar.php');

// Extract the 'img_folder' values from the array
$folders = array_column($resultsData, 'img_folder');

// Check if $folders is not empty before processing
if (empty($folders)) {
    
    header('Location: https://www.dfirstproperty.com/error');
    
} 

$folderList = "'" . implode("','", $folders) . "'";
$itemsPerPage = 36;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$startFrom = ($current_page - 1) * $itemsPerPage;

// SQL query to search for files
$sqlfile = "SELECT * FROM post_property 
            WHERE img_folder IN ($folderList)
            ORDER BY id_property DESC
            LIMIT $startFrom, $itemsPerPage";

// Execute the query
$result = $mysqli->query($sqlfile);

// Check for query errors
if (!$result) {
    die("Query failed: " . $mysqli->error);
}
    // Fetch and process the results
    $rowData = $result->fetch_assoc();
    

?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="th">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Tag Manager -->

    <script>
    (function(w, d, s, l, i) {

        w[l] = w[l] || [];

        w[l].push({

            'gtm.start': new Date().getTime(),

            event: 'gtm.js'

        });

        var f = d.getElementsByTagName(s)[0],

            j = d.createElement(s),

            dl = l != 'dataLayer' ? '&l=' + l : '';

        j.async = true;

        j.src =

            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;

        f.parentNode.insertBefore(j, f);

    })(window, document, 'script', 'dataLayer', 'GTM-P72KH24');
    </script>

    <!-- End Google Tag Manager -->

    <title> <?php     

    echo  str_replace("คุณค้นหาในประกาศคำว่า", "ค้นหาประกาศ ", $add_title);



    ?> </title>

    <meta name="description"
        content="<?php echo $add_title; ?> โรงงาน โกดัง คลังสินค้า ซื้อขาย บ้าน บ้านเดี่ยว คอนโด คอนโดมิเนียม และ อสังหาริมทรัพย์ อื่นๆ">

    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large" />

    <link rel="canonical"
        href="<?php echo $url_meta='https://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']); ?>">

    <?php include_once('layout/dns.php'); ?>

    <script type='application/ld+json'>
    {

        "@context": "https://schema.org",

        "@graph": [{

            "@type": "CollectionPage",

            "@id": "<?php echo htmlspecialchars($url_meta, ENT_QUOTES, 'UTF-8'); ?>#webpage",

            "url": "<?php echo htmlspecialchars($url_meta, ENT_QUOTES, 'UTF-8'); ?>",

            "inLanguage": "th",

            "name": "<?php echo htmlspecialchars($add_title, ENT_QUOTES, 'UTF-8'); ?>",

            "description": "<?php echo htmlspecialchars($add_title, ENT_QUOTES, 'UTF-8'); ?> โรงงาน โกดัง คลังสินค้า ซื้อขาย บ้าน บ้านเดี่ยว คอนโด คอนโดมิเนียม และ อสังหาริมทรัพย์ อื่นๆ",

            "publisher": {
                "@type": "Organization",
                "name": "DFirst Property"
            }

        }]

    }
    </script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt&display=swap">

</head>



<body class="images_bg_body">

    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P72KH24" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="https://www.css.dfirstproperty.com/web.css">

    <link rel="stylesheet" href="https://www.css.dfirstproperty.com/wickedcss.min.css">

    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css"
        onload="this.rel='stylesheet'" />


    <?php include_once('layout/menu_top.php'); ?>


    </div>


    <div style="background-image: linear-gradient(180deg, #ebedee 0%, #fdfbfb 100%);">

        <br />

        <br />

        <br />



        <nav aria-label="breadcrumb">

            <ol class="breadcrumb container-lg bg-transparent font14" itemscope
                itemtype="http://schema.org/BreadcrumbList">

                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

                    <a href="https://www.dfirstproperty.com/" class="text-success " itemprop="item">

                        <i class="fa fa-home" aria-hidden="true"></i> <span itemprop="name">หน้าแรก </span></a>

                    <meta itemprop="position" content="1" />

                </li>

                <li class="breadcrumb-item">

                    <span> <?php echo $add_title; ?> </span>

                </li>




            </ol>

            <center>



                <h1 class="text-center container-lg font18 text-dark" title="<?php echo $add_title; ?>">

                    <?php echo $add_title; ?> </h1>

            </center>

        </nav>



        <div class="bg-light border-bottom show_700">

            <div class="container-lg p-1">

                <div class="d-flex justify-content-center">



                    <form action="/real-estate" method="GET">



                        <ul class="nav nav-pills" id="pills-tab" role="tablist">



                            <li class="nav-item">

                                <select class="form-control rounded-0 form-h" name="type_property_code">

                                    <?php

                            if(!empty($_GET['type_property_code'])){

                                echo '<option value="'.$_GET['type_property_code'].'">->'.$rowData['type_property'].'</option>';

                            }

                            ?>

                                    <option value="">ทุกที่อยู่อาศัย</option>

                                    <option value="H">บ้านเดี่ยว/บ้านแฝด</option>

                                    <option value="T">ทาวน์เฮ้าส์/ทาวน์โฮม</option>

                                    <option value="C">คอนโดมิเนียม</option>

                                    <option value="AP">อพาทเม้น</option>

                                    <option value="B">ตึกแถว/อาคารพานิชย์</option>

                                    <option value="BF">อาคารสำนักงาน/โฮมออฟฟิศ</option>

                                    <option value="FW">โกดัง/โรงงาน/สโตร์</option>

                                    <option value="SP">พื้นที่ให้เช่า</option>

                                    <option value="L">ที่ดิน</option>

                                    <option value="HT">โรงแรม</option>



                                </select>

                            </li>



                            <li class="nav-item">



                                <select class="form-control rounded-0 form-h" name="type_category_code">

                                    <?php

                            if(!empty($_GET['type_category_code'])){

                                echo '<option value="'.$_GET['type_category_code'].'">->'.$rowData['type_category'].'</option>';

                            }

                            ?>

                                    <option value="R"> ให้เช่า </option>

                                    <option value="S"> ขาย </option>

                                    <option value="LC"> เซ้ง </option>

                                </select>

                            </li>



                            <li class="nav-item">

                                <select id="province-type" name="province" class="form-control rounded-0 form-h">

                                    <?php

if (isset($_GET['province']) && $_GET['province'] > 0) {



    $sqlpro = "SELECT * FROM post_property WHERE province_id = '".$_GET['province']."'";

    $resultpro = $mysqli->query($sqlpro);

    $row = $resultpro->fetch_assoc();



    echo '<option value="'.$row['province_id'].'">->'.$row['province_name'].'</option>';  


}



echo '<option value="0">ทุกจังหวัด</option>';


$sqlprovin = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";

$resultprovin = $mysqli->query($sqlprovin);

if ($resultprovin->num_rows > 0) {

    // Output data of each row

    while ($rowprovin = $resultprovin->fetch_assoc()) {

        echo '<option value="' . $rowprovin['PROVINCE_ID'] . '"> ' . $rowprovin['PROVINCE_NAME'] . ' </option>';

    }

}



?>



                                </select>

                            </li>

                            <li class="nav-item">

                                <select name="amphur" id="amphur-type" class="form-control rounded-0 form-h">

                                    <?php

 if(isset($_GET['amphur']) && $_GET['amphur'] > 0) {

    echo '<option value="0">-> '.$rowData['amphur_name'].'</option>';

}



if (isset($_GET['province']) && $_GET['province'] > 0) {

        

    $sqlpro = "SELECT * FROM amphur WHERE PROVINCE_ID = ".$_GET['province']."";

    $resultpro = $mysqli->query($sqlpro);   



   

    echo '<option value="0">ทุกอำเภอ/เขต</option>';



    if ($resultpro->num_rows > 0) {

        // Output data of each row

        while ($rowpro = $resultpro->fetch_assoc()) {        

           

            echo '<option value="' . $rowpro['AMPHUR_ID'] . '"> ' .  preg_replace('/[\,\*\(\)]/', '', $rowpro['AMPHUR_NAME']) . ' </option>';

        }

    }

    

    

}else{



    echo '<option value="0">ทุกอำเภอ/เขต</option>';

}

?>





                                </select>

                            </li>





                            <li class="nav-item">

                                <a class="form-control rounded-0 font14 form-h nav-link" id="pills-home-tab"
                                    data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
                                    aria-selected="true">ข้อมูลเพิ่มเติม <i class="fa fa-caret-down"
                                        aria-hidden="true"></i></a>

                            </li>

                            <li class="nav-item">



                                <button type="submit" class="form-control rounded-0 font14 btn-success form-h">

                                    ค้นหา

                                </button>



                            </li>



                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                <div align="center" class="card rounded-0">

                                    <div class="card-body d-flex justify-content-center bg-primary">

                                        <div class="form-row">



                                            <?php



if($rowData['type_property_code'] == 'FW'){

    echo '

    <div class="col-auto p-0 div-form" >

   <select class="form-control rounded-0 font14 form-h" name="min_sqm">

  <option value="1">พื้นที่ต่ำสุด (ตร.ม.)</option>

  <option value="1">0</option>

  <option value="300">300</option>

  <option value="500">500</option>       

  <option value="1000">1,000</option>

  <option value="1500">1,500</option>

  <option value="2000">2,000</option>

  <option value="3000">3,000</option>

  <option value="5000">5,000</option>

  <option value="10000">10,000</option>

  <option value="20000">20,000</option>

  <option value="50000">50,000</option>

  <option value="100000">100,000</option>

  <option value="1">ไม่จำกัดพื้นที่</option>

</select>

</div>

<div class="col-auto p-0 div-form" >

   <select class="form-control rounded-0 font14 form-h" name="max_sqm">

 <option value="1000000">พื้นที่สูงสุด (ตร.ม.)</option>

 <option value="300">300</option>

  <option value="500">500</option>       

  <option value="1000">1,000</option>

  <option value="1500">1,500</option>

  <option value="2000">2,000</option>

  <option value="3000">3,000</option>

  <option value="5000">5,000</option>

  <option value="10000">10,000</option>

  <option value="20000">20,000</option>

  <option value="50000">50,000</option>

  <option value="100000">100,000</option>

  <option value="200000">200,000</option>

  <option value="1000000">ไม่จำกัดพื้นที่</option>

</select>

</div>

';

}

if($rowData['type_property_code'] == 'H' || $rowData['type_property_code'] == 'T'){

    echo '

    <div class="col-auto p-0 div-form">

   <select class="form-control rounded-0 font14 form-h" name="beds">

  <option value="">ห้องนอน</option>

  <option value="1">1</option>

  <option value="2">2</option>       

  <option value="3">3</option>

  <option value="4">4</option>

  <option value="5">5</option>

  <option value="6+">6+</option>

</select>

</div>

<div class="col-auto p-0 div-form">

   <select class="form-control rounded-0 font14 form-h" name="baths">

  <option value="">ห้องน้ำ</option>

  <option value="1">1</option>

  <option value="2">2</option>       

  <option value="3">3</option>

  <option value="4">4</option>

  <option value="5">5</option>

  <option value="6+">6+</option>

</select>

</div>  

';



}

	 ?>



                                            <div class="col-auto p-0 div-form">

                                                <select class="form-control rounded-0 font14 form-h" name="minprice">

                                                    <option value="1">ราคาต่ำสุด</option>

                                                    <option value="1">0</option>

                                                    <option value="10000">10,000</option>

                                                    <option value="30000">30,000</option>

                                                    <option value="50000">50,000</option>

                                                    <option value="70000">70,000</option>

                                                    <option value="90000">90,000</option>

                                                    <option value="100000">100,000</option>

                                                    <option value="300000">300,000</option>

                                                    <option value="500000">500,000</option>

                                                    <option value="700000">700,000</option>

                                                    <option value="1000000">1,000,000</option>

                                                    <option value="1">ไม่จำกัดราคา</option>

                                                </select>

                                            </div>



                                            <div class="col-auto p-0 div-form">

                                                <select class="form-control rounded-0 font14 form-h" name="maxprice">

                                                    <option value="1000000000">ราคาสูงสุด</option>

                                                    <option value="1000">5,000</option>

                                                    <option value="10000">10,000</option>

                                                    <option value="30000">30,000</option>

                                                    <option value="50000">50,000</option>

                                                    <option value="70000">70,000</option>

                                                    <option value="90000">90,000</option>

                                                    <option value="100000">100,000</option>

                                                    <option value="300000">300,000</option>

                                                    <option value="500000">500,000</option>

                                                    <option value="700000">700,000</option>

                                                    <option value="1000000">1,000,000</option>

                                                    <option value="1000000000">ไม่จำกัดราคา</option>



                                                </select>

                                            </div>

                                            <div class="col-auto p-0 div-form">

                                                <button type="submit"
                                                    class="form-control rounded-0 font-12 btn-light border form-h" />

                                                <i class="fa fa-search" aria-hidden="true"></i> </button>

                                            </div>



                                        </div>

                                    </div>

                                </div>



                            </div>



                    </form>

                </div>

            </div>

        </div>

    </div>





    </div>

    <!-- END nav -->



    <div class="container-lg">

        <div class="row">

            <?php 

// Array title cut

function str_split_unicode($str, $length = 1) {

  $tmp = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);

  if ($length > 1) {

      $chunks = array_chunk($tmp, $length);

      foreach ($chunks as $i => $chunk) {

          $chunks[$i] = join('', (array) $chunk);

      }

      $tmp = $chunks;

  }

  return $tmp;

  // Array title cut

}

?>

            <?php 



            

                do{  

                    if(!empty($rowData['title'])){

                

            ?>

            <!-- strat -->

            <div class="col-md-4 col-lg-4 mt-3">

                <div class="border rounded-lg shadow">

                    <?php 

switch($rowData['type_category_code']){

	case 'R':

	echo '<div class="position-absolute bg-info p-2 text-white show_rs" style="z-index:2;"><span>ให้เช่า</span></div>';

	break;

	case 'S':

	echo '<div class="position-absolute bg-danger p-2 text-white show_rs" style="z-index:2;"><span>ขาย</span></div>';

	break;

	case 'LC':

	echo '<div class="position-absolute bg-info p-2 text-white show_rs" style="z-index:2;"><span>เซ้ง</span></div>';

	break;

}

?>

                    <div align="center" style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);"
                        class="image-box">



                        <?php

$extensions = ['jpg', 'gif', 'png'];



// Create an empty array to store file names

$files = [];

// Loop through each extension and append matching files to the array

foreach ($extensions as $extension) {

    $pattern = "images/property/" . $rowData['img_folder'] . "/*.$extension";

    $matchingFiles = glob($pattern);

    

    if (!empty($matchingFiles)) {

        $files = array_merge($files, $matchingFiles);

    }

}

rsort($files);



if(!empty($files)){

$num_img = $files[0];

$num_img = substr($num_img,7);

$data = getimagesize($files[0]);

$width = $data[0];

$height = $data[1];



echo '<a itemscope itemtype="https://schema.org/Photograph" href="https://www.images.dfirstproperty.com/'.$num_img.'" >

<img src="https://www.images.dfirstproperty.com/'.$num_img.'" class="img_info"  alt="'.$rowData['title'].'"   itemprop="image"></a>';

}else{

echo '<img src="//www.images.dfirstproperty.com/not-available.jpg" class="img_info">';

}

?>

                        <?php 

// img sold out

if(!empty($rowData['sold_out'])){

echo '<span  class="available text-danger bg-light border-top"><i class="fas fa-times-circle"></i> <strong>Unavailable</strong>

</span>';

}else{

  echo '

<span  class="available text-success bg-light border-top"><i class="fas fa-check-circle pulse"></i> <strong>Available</strong>

</span>

  ';

}?> </div>



                    <div style="background-color: #fff; font-size: 14px; padding: 8px;"><i
                            class="fa fa-share text-success" aria-hidden="true"></i>

                        <span itemscope itemtype="https://schema.org/Place">

                            <a href="<?php  
echo 'https://www.dfirstproperty.com/real-estate/'.$rowData['code_property']; 
?>" itemprop="url" class="text-dark stretched-link" title="<?php echo $rowData['title']; ?>" target="_blank">

                                <span itemprop="name"><?php 

// Open Source!

$s = $rowData['title']; 

$a =str_split_unicode($s);



//print_r(array_slice($a,0,10));

$new_array= array_slice($a,0,90);

foreach($new_array as $val){

echo $val; }

if(!empty($_GET['pa_code'])){$ppt_code=', '.$_GET['pa_code'];}else{$ppt_code='';}

echo $ppt_code;

?>

                                </span>

                            </a>

                        </span>

                        <br>



                        <span class="" itemscope itemtype="https://schema.org/PostalAddress">

                            <span itemprop="streetAddress">

                                <i class="fa fa-map-marker text-success" aria-hidden="true"></i>

                                <?php   echo  preg_replace("/[\(\)\.\*]/", "", $rowData['amphur_name']).', '.$rowData['province_name']; ?>

                                <br>

                            </span>



                            <?php

                                if($rowData['type_property_code'] == 'FW' ||

                                $rowData['type_property_code'] == 'BF' ||

                                $rowData['type_property_code'] == 'SP' ||

                                $rowData['type_property_code'] == 'L'  ||

                                $rowData['type_property_code'] == 'L'                              

                                ){                         }else{                                  



                                    echo '<i class="fas fa-bed text-success"></i> '.$rowData['beds'].' ห้องนอน ';

                                    echo '<i class="fas fa-shower text-success"></i> '.$rowData['baths'].' ห้องน้ำ ';

                                    echo '<i class="fas fa-car text-success"></i> '.$rowData['parking'].' ที่จอดรถ ';      

                                    echo '<br>';                                                

                                }





?>



                            <span class="font16">



                                <?php

$sqm =preg_replace('/[\'",.*()]/', '', trim($rowData['sqm']));

$rai = preg_replace('/[\'",.*()]/', '',$rowData['rai']);

$sqw = preg_replace('/[\'",.*()]/', '',$rowData['sqw']);



if ($sqm > 0  || $rai > 0 || $sqw > 0 ){



    echo '<i class="far fa-square text_p_info text-success"></i> ';



if($rai > 0){

    echo @number_format($rai).' ไร่. ';

}

if($sqw > 0){

    echo @number_format($sqw).' ตรว. ';

}



if($sqm > 0){

    echo @number_format($sqm).' ตารางเมตร ';

    

}

}



?>







                            </span>



                        </span>

                        <!-- itemtype -->



                        <br>





                        <span class="p-1  text-secondary font14">

                            <?php 

 





if($rowData['type_property_code'] == 'FW'){

echo $rowData['type_category'].' โกดัง โรงงาน, '.preg_replace('/[\'",.*()]/', '', str_replace("เขต", "", $rowData['amphur_name']));



}else{

   echo $rowData['type_category'].' '.str_replace("/", " ", $rowData['type_property']).' '.preg_replace('/[\'",.*()]/', '', str_replace("เขต", "", $rowData['amphur_name']));

}

 ?>

                        </span>



                        <div class="border-top">

                            <div class="d-flex">

                                <div class="ml-auto p-1 align-self-center font18 text-red">฿<?php 

                                           



            if( $rowData['type_category_code'] == 'R' ){

                $price = preg_replace('/[\'",.*()]/', '', $rowData['price']);

                if($price <= 1500 && $price > 0){

        

                    echo number_format($price).' /ตรม.';

            

                }elseif($price >= 1000000){

            

                    echo number_format($price).' บาท';

            

                }elseif($price > 0){

            

                    echo number_format($price).' /เดือน';            

                }

                if($price == NULL || $price == 0 ){            

                    echo 'สอบถามราคา';

            

                }

            }elseif($rowData['type_category_code'] == 'S' || $rowData['type_category_code'] == 'LC'){

                $price = preg_replace('/[\'",.*()]/', '', $rowData['price_sale']);



                if(empty($price)){

                    $price = preg_replace('/[\'",.*()]/', '', $rowData['price']);

                }



                if($price == NULL || $price == 0 ){

            

                    echo 'สอบถามราคา';

            

                }else{      

                    if($price <= 500000){



                        echo number_format($price).' /เดือน';



                    }else{

            

                        echo number_format($price).' บาท';

            

                    }

                }                        

                

        

            }







?>



                                </div>



                            </div>



                        </div>







                    </div>





                </div>

            </div>

            <!-- END -->

            <?php 

            } } while ($rowData = $result->fetch_assoc()); 

           



        

            

            ?>







        </div>







    </div>



    <br />



    </div>





    <?php



    $sql_total = "SELECT COUNT(*) as id_property FROM post_property WHERE img_folder IN ($folderList) ";

    $result_total = $mysqli->query($sql_total);

    $row_total = $result_total->fetch_assoc();

    $total_pages = ceil($row_total["id_property"] / $itemsPerPage);


    $range = 2;

    $start_range = $current_page - $range;

    $end_range = $current_page + $range;

    $end_range = min($total_pages, $end_range); // Ensure the end range doesn't exceed the total pages

    $start_range = max(1, $end_range - $range * 2); // Ensure the start range doesn't go below page 1



    // Display the pagination links keyword=&cattype=1&headtype=&province=0&amphur=0



    $fullURL = $_SERVER['REQUEST_URI'];

    $cleanString = preg_replace('/&page=?\d+/', '', $fullURL);





    echo '<nav aria-label="Page navigation">

            <ul class="pagination pagination-lg justify-content-center">';



    if ($current_page > 1) {     

        echo '<li class="page-item"><a href="'.$cleanString.'&page=' . ($current_page - 1) . '" class="page-link">&laquo;</a></li>';

    }



    for ($i = $start_range; $i <= $end_range; $i++) {

        if ($i == $current_page) {

            echo '<li class="page-item active"><span class="page-link"> หน้า '.$i.'</span></li>';

        } else {

            echo '<li class="page-item"><a href="'.$cleanString.'&page='.$i.'" class="page-link">'.$i.'</a></li>';

        }

    }



    if ($current_page < $total_pages) {

    

        echo '<li class="page-item"><a href="'.$cleanString.'&page=' . ($current_page + 1) . '" class="page-link">&raquo;</a></li>';



    }



    echo '</ul>

        </nav>';






?>





    <div onclick="topFunction()" id="myBtn" class="bg-success"><i class="fas fa-angle-up show_700"></i></div>




    <?php 



include('layout/index_home/fix_bottom.php');

include('menu.php');



echo $footer;

include_once 'layout/js_footer.php';

 ?>





    <script type="text/jscript">
    //Get the button

    var mybutton = document.getElementById("myBtn");



    // When the user scrolls down 20px from the top of the document, show the button

    window.onscroll = function() {

        scrollFunction()

    };



    function scrollFunction() {

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

            mybutton.style.display = "block";

        } else {

            mybutton.style.display = "none";

        }

    }



    // When the user clicks on the button, scroll to the top of the document

    function topFunction() {

        document.body.scrollTop = 0;

        document.documentElement.scrollTop = 0;

    }
    </script>



</body>



</html>