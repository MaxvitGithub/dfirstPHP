<?php include_once('db/con_site_bar.php');

$code_property = '';



$text_get = trim($_GET['title_code_property']);

$parts = explode("-", $text_get);

$count = count($parts);

$code_property = array_pop($parts);



$query_data_post = "SELECT * FROM post_property WHERE code_property='$code_property'";

$data_post = mysqli_query($con, $query_data_post) or die(mysqli_error());

$row_data_post = mysqli_fetch_array($data_post, MYSQLI_ASSOC);

$totalRows_data_post = mysqli_num_rows($data_post);

$mail=$row_data_post['email'];



if(empty($mail)){

	header('Location: https://www.dfirstproperty.com/error');

	exit;

}



if($count == 1){ 


    // กำหนดความยาวสูงสุด (เช่น 50 ตัวอักษร)
$add_title_head = trim($row_data_post['title']);
$max_length = 200;

// ถ้าความยาวของข้อความเกินขีดจำกัด
if (strlen($add_title_head) > $max_length) {
    // หาตำแหน่งช่องว่างสุดท้ายที่อยู่ในช่วงที่ต้องการ
    $last_space = strrpos(substr($add_title_head, 0, $max_length), ' ');
    // ตัดข้อความให้สิ้นสุดที่ช่องว่างนั้น
    $add_title_head = substr($add_title_head, 0, $last_space);
}

    $title_cut =  $add_title_head. '-' . $row_data_post['code_property'];

    $title = preg_replace('/[\'\"\.\*\:\!\@\#\$\%\&\(\)\+\/]+/', ' ', $title_cut);  // Clean special characters
    
    $title_url = preg_replace('/[\,]/', '', trim($title));  // Remove commas
    
    $title_url = preg_replace('/–/', '-', $title_url);  // Replace en dash with hyphen
    
    $title__ = preg_replace("/[\ \-]+/", "-", $title_url);  // Replace multiple spaces or hyphens with a single hyphen
    
    //echo $title__;

    //header('HTTP/1.1 301 Moved Permanently');
    header('Location: https://www.dfirstproperty.com/real-estate/' . $title__);
    
    // Make sure no further script execution happens after the redirect
    exit;


}



$query_user = "SELECT * FROM acount WHERE email='$mail'";

$user = mysqli_query($con, $query_user) or die(mysqli_error());

$row_user = mysqli_fetch_array($user, MYSQLI_ASSOC);

$totalRows_user = mysqli_num_rows($user);

$Mmail=$row_user['email'];


if(empty($Mmail)){

	header('Location: https://www.dfirstproperty.com');

	exit;

}



$dirname = "images/property/".$row_data_post['img_folder'].'/';





switch($row_data_post['type_property_code']){

case 'H':

	$property_code='บ้านเดี่ยว';	

	break;		

	

	case 'T' :

	$property_code='ทาวน์เฮ้าส์';		

	break;

	

	case 'C':

	$property_code='คอนโด';

	break;



	case 'B':

	$property_code='ตึกแถว-อาคารพานิชย์';

	break;

		

	case 'FW':

	$property_code='โกดัง-โรงงาน';		

	break;

	

	case 'L':

	$property_code='ที่ดิน';

	break;

	

	case 'OT':

	$property_code='อื่นๆ';

	break;

	

	case 'apartment':

	$property_code='AP';

	break;

	case 'AP':

	$property_code='อพาทเม้น';

	break;
	

	case 'HT':

	$property_code='โรงแรม';

	break;
	

	case 'SP':

	$property_code='พื้นที่';

	break;
	

	case 'BF':

	$property_code='สำนักงาน-ออฟฟิศ';
    break;


    case 'SR':
        $property_code='โชว์รูม';

	break;	

}


$files_glob = glob("images/property/".$row_data_post['img_folder']."/*.{jpg,gif,png}", GLOB_BRACE);

$num_img_2 = $files_glob[0]; 

if ($num_img_2) {
    $num_img_2 = substr($num_img_2, 7);  // Remove the 'images/' part from the file path
}


?>

<?php

if(!empty($row_data_post['page_view'])){

    $page_view=$row_data_post['page_view']+1;

}else{

    $page_view=1;

}



$code_property=$row_data_post['code_property'];



// Check connection



$sqlpage = "UPDATE post_property SET page_view = '$page_view' WHERE code_property = '$code_property'";

$con->query($sqlpage);

$con->close();





$seo_category=trim($row_data_post['type_category']);

$seo_p=trim($row_data_post['province_name']);

$seo_a=trim($row_data_post['amphur_name']);

$seo_change=' ประเภทอสังหาฯ: '.$property_code.''.$seo_category.','.$property_code.$seo_a.','.$property_code.$seo_p;




?>

<!DOCTYPE html>

<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#28a745" />

    <title><?php

echo $title_schema = preg_replace('/[\"\'\(\)\*\:]/', '', trim($row_data_post['title']));

?></title>

    <meta name="description" content="<?php include_once 'layout/meta.php'; ?><?php echo $seo_change; ?>" />

    <meta name="robots" content="INDEX,FOLLOW" />

    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large" />

    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large" />



    <link rel="canonical"
        href="<?php echo $url_meta='https://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']); ?>">

    <link rel="alternate" hreflang="x-default" href="<?php echo $url_meta; ?>" />

    <meta content="https://www.facebook.com/Dfirst-property-689042971121011/" property="fb:profile_id">

    <meta content="th_TH" property="og:locale">

    <meta content="Dfirst Property" property="og:site_name">

    <meta content="website" property="og:type">

    <meta content="<?php echo $url_meta; ?>" property="og:url">

    <meta content="<?php echo $title_schema ?>" property="og:title">

    <meta content="<?php include_once 'layout/meta.php'; ?><?php echo $seo_change; ?>" property="og:description">

    <meta content="https://www.images.dfirstproperty.com/<?php echo $num_img_2 ?>" property="og:image">



    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:site" content="@929hfbizProperty">

    <meta name="twitter:creator" content="@929hfbizProperty">

    <meta name="twitter:title" content="<?php echo $title_schema; ?>">

    <meta name="twitter:description" content="<?php include_once 'layout/meta.php'; ?><?php echo $seo_change; ?>">

    <meta name="twitter:image" content="https://www.images.dfirstproperty.com/<?php echo $num_img_2 ?>">


    <?php include_once('layout/dns.php'); ?>

    <link rel="preload" as="image" href="https://www.images.dfirstproperty.com/<?php echo $num_img_2 ?>">

    <?php include_once ('seo/GoogleTagHead.php'); ?>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Product",
        "name": "<?php echo $title_schema; ?>",
        "image": "https://www.images.dfirstproperty.com/<?php echo $num_img_2 ?>",
        "description": "<?php include_once 'layout/meta.php'; ?><?php echo $seo_change; ?>",
        "sku": "<?php echo $row_data_post['code_property']; ?>",
        "offers": {
            "@type": "Offer",
            "url": "<?php echo $url_meta; ?>",
            "priceCurrency": "THB",
            "price": "<?php echo preg_replace('/[\\'\",.*()]/', '', $row_data_post['price_sale']); ?>",
            "availability": "https://schema.org/InStock"
        }
    }
    </script>



    <?php

switch($row_data_post['type_property_code']){

	case 'FW':

	$store='store';

	break;

	case 'SP':

	$store='store';

	break;

	default:

	$store='LocalBusiness';	

	

	}

?>



    <!-- jQuery for Fotorama -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" defer></script>

<!-- Fotorama from CDNJS -->
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" onload="this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css"></noscript>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js" defer></script>



</head>



<body class="images_bg_body">

    <main>

        <?php include_once 'layout/in_css.php'; ?>

        <?php include_once ('seo/GoogleTagBody.php'); ?>

        <?php include_once('layout/menu_top.php'); ?>

        <br>

        <br>

        <br>

        <nav aria-label="breadcrumb" role="navigation">

            <ol itemscope itemtype="http://schema.org/BreadcrumbList"
                class="breadcrumb container-lg bg-transparent font14">

                <!-- Home Breadcrumb -->
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="https://www.dfirstproperty.com/" class="text-success" itemprop="item">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span itemprop="name">หน้าแรก</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>

                <?php 
                // Set up the type of property (Rent or Sale)
                $type_rent = '';
                if (isset($row_data_post['type_category']) && $row_data_post['type_category'] == 'ให้เช่า') {
                    $type_rent = 'เช่า';  // Rent
                }

                // Determine property code and format it correctly
                $type_property_del = isset($property_code) ? $property_code : '';
                if ($type_property_del == 'โกดัง-โรงงาน') {
                    $type_property_del = $type_rent . str_replace('-', ' ', $property_code); // Convert hyphen to space for 'โกดัง-โรงงาน'
                }
                ?>

                <!-- Property Type and Category Breadcrumb -->
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="<?php echo 'https://www.dfirstproperty.com/' . htmlspecialchars($property_code, ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($row_data_post['type_category'], ENT_QUOTES, 'UTF-8'); ?>"
                        class="text-success" itemprop="item">
                        <span
                            itemprop="name"><?php echo htmlspecialchars(trim($property_code . $row_data_post['type_category']), ENT_QUOTES, 'UTF-8'); ?></span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>

                <?php 
                // Handle province breadcrumb
                $province_name = isset($row_data_post['province_name']) ? $row_data_post['province_name'] : '';

                
                ?>

                <!-- Province Breadcrumb -->
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="<?php echo 'https://www.dfirstproperty.com/' . htmlspecialchars($property_code, ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($row_data_post['type_category'], ENT_QUOTES, 'UTF-8') . '/' . htmlspecialchars(trim($province_name)); ?>"
                        class="text-success" itemprop="item">
                        <span
                            itemprop="name"><?php echo htmlspecialchars($province_name, ENT_QUOTES, 'UTF-8'); ?></span>
                    </a>
                    <meta itemprop="position" content="3" />
                </li>

                <?php 
                // Handle amphur (district) breadcrumb
                $amphur_name = isset($row_data_post['amphur_name']) ? preg_replace("/[\*]/", "", $row_data_post['amphur_name']) : '';
                $amphur_name = preg_replace('/[\'",.*()]/', ' ', $amphur_name); // Clean up unwanted characters
                if (strpos($amphur_name, 'คูคต') !== false) {
                    $amphur_name = 'คูคต';
                }
                ?>

                <!-- Amphur Breadcrumb -->
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="<?php echo 'https://www.dfirstproperty.com/' . htmlspecialchars($property_code, ENT_QUOTES, 'UTF-8') . '-' . htmlspecialchars($row_data_post['type_category'], ENT_QUOTES, 'UTF-8') . '/' . htmlspecialchars($amphur_name, ENT_QUOTES, 'UTF-8'); ?>"
                        class="text-success" itemprop="item">
                        <span itemprop="name"><?php echo htmlspecialchars($amphur_name, ENT_QUOTES, 'UTF-8'); ?></span>
                    </a>
                    <meta itemprop="position" content="4" />
                </li>

                <!-- Title Breadcrumb (final breadcrumb) -->
                <li class="breadcrumb-item" aria-current="page">
                    <span><?php echo htmlspecialchars($title_schema, ENT_QUOTES, 'UTF-8'); ?></span>
                </li>

            </ol>

        </nav>



        <div class="container-lg" style="margin-top:-25px;">

            <h1 class="font18 mt-2" itle="<?php echo $title_schema; ?>"><?php echo $title_schema; ?></h1>

            <div class="row">

                <div class="col-md-7">

                    <div class="col-12 p-0">

                        <div class="bg-white mb-3 p-3"><?php 

// img sold out

if(!empty($row_data_post['sold_out'])){

// echo '

// <span class="sold_out_view">

// <img src="https://www.images.dfirstproperty.com/sold-out.png" alt="Sold out">

// </span>

// ';

}?>

                            <div align="center" class="fotorama bg-white" data-allowfullscreen="native"
                                data-nav="thumbs"><?php

$extensions = ['jpg', 'gif', 'png'];
$files = [];

// Ensure the folder path is safe (you might sanitize $row_data_post['img_folder'] before using it)
$folderPath = "images/property/" . $row_data_post['img_folder'];

// Loop through each extension and fetch matching files
foreach ($extensions as $extension) {
    $pattern = $folderPath . "/*.$extension";
    $matchingFiles = glob($pattern);
    
    if (!empty($matchingFiles)) {
        $files = array_merge($files, $matchingFiles);
    }
}

// If no images were found
if (empty($files)) {

    echo '<a href="https://www.images.dfirstproperty.com/not-available.jpg">
        <img src="https://www.images.dfirstproperty.com/not-available.jpg"
            alt="No images available" width="640" height="360" loading="lazy" decoding="async" fetchpriority="high" />
    </a>';

} else {
    rsort($files);  // Sort the files in reverse order (newest first)
    $ii = 1;  // Initialize counter for image numbering
    
    // Loop through and display each image
    foreach ($files as $image) {
        $image = substr($image, 7);  // Remove 'images/' prefix from path
        $fetch = ($ii === 1) ? ' fetchpriority="high"' : '';
        echo '<a href="https://www.images.dfirstproperty.com/'.$image.'">
                 <img src="https://www.images.dfirstproperty.com/'.$image.'"'
                      .' alt="'.$row_data_post['title'].' ภาพที่ '.$ii.'"'
                      .' width="640" height="360" loading="lazy" decoding="async"'.$fetch.' />'
              .'</a>';
        $ii++;
    }
}
?>
                            </div>





                            <br>

                            <span class="font16"><?php echo'มีข้อมูลดังนี้'; ?></span>

                            <br>

                            <!-- รายละเอียด -->



                            <?php 

                            

                            include_once('layout/detail_view/insert_deatil.php'); 



                               echo 'รหัสทรัพย์: '.$row_data_post['code_property']; 

                            

                            ?>





                        </div>

                        <div class="p-2">

                            <span class="float-left" style="font-size: 20px;"><i class="fas fa-print" aria-hidden="true"></i></span>





                            <span class="float-right">
                                <button type="button" onclick="myFunction()" title="Copy to Clipboard" class="btn btn-link p-0" aria-label="Copy Link" style="font-size: 20px;">
                                    Copy Link <i class="fas fa-clone" aria-hidden="true"></i>
                                </button>
                            </span>

                            <input type="text" class="form-control" aria-label="Property URL"
                                value="https://www.dfirstproperty.com/real-estate/<?php echo $row_data_post['code_property']; ?>"
                                id="myInput" required>

                        </div>



                    </div>

                </div>



                <!-- strat sibar -->

                <div class="col-md-5">

                    <div class="col-12 p-0">

                        <div class="bg-white mb-3">



                            <?php 

if(empty($row_data_post['price'])){ 

$hidden='style="display: none;"';

 }else{

$hidden='' ;

 }

 $price =preg_replace('/[\'",.*()]/', '', $row_data_post['price']);

 $price_salee =preg_replace('/[\'",.*()]/', '', $row_data_post['price_sale']);

 

 if($row_data_post['type_category_code'] == 'S'){	 

	if($price <= $price_salee){

		$hidden_='';

	}else{

		$hidden_='style="display: none;"';

	}

			

	}else{



		if($price >= 3000000){

			$hidden_='style="display: none;"';

		}else{

			$hidden_='';

		}



	 }	



?>

                            <div <?php echo $hidden; ?> class="card-header font22">

                                <div class="row">

                                    <div <?php echo $hidden_; ?> class="col-3">

                                        <center><span class="text-info"> ให้เช่า </span></center>

                                    </div>

                                    <div class="col-9">

                                        <span class="text-info">

                                            <font class="font18">฿</font>

                                            <?php 

  

        if( $row_data_post['type_category_code'] == 'R' ){

            $price = preg_replace('/[\'",.*()]/', '', $row_data_post['price']);

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

        }elseif($row_data_post['type_category_code'] == 'S' || $row_data_post['type_category_code'] == 'LC'){

            $price = preg_replace('/[\'",.*()]/', '', $row_data_post['price_sale']);



            if(empty($price)){

                $price = preg_replace('/[\'",.*()]/', '', $row_data_post['price']);

            }



            if($price == NULL || $price == 0 ){

                echo 'สอบถามราคา';



            } else {



            if($price <= 500000){

                echo number_format($price).' /เดือน';

            }else{

                echo number_format($price).' บาท';

            }

            }

        }

	?>

                                        </span>

                                    </div>

                                </div>

                            </div>

                            <?php 

if(!empty($row_data_post['price_sale'])){

echo '<div class="card-header font22">  

<div class="row">

<div class="col-3">

<center><span class="text-danger"> ขาย </span></center>

</div>

<div class="col-9 text-danger">  

<span><font class="font18">฿</font> '.number_format($row_data_post['price_sale']).'	</span>

</div></div>

</div>';

}



?>

                            <div class="card-body p-2 ">

                                <div class="p-2">

                                    <font color="green" size="+1">

                                        <?php if(!empty($language)){echo'Code:';}else{echo 'รหัสทรัพย์:';} ?>

                                        <?php echo $row_data_post['code_property']; ?>

                                    </font>

                                    <i class="far fa-eye-slash" aria-hidden="true"></i>

                                    <?php echo $row_data_post['page_view']; ?> ผู้เข้าชม

                                    <br>

                                    <hr>



                                    <span>

                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>

                                        <?php echo preg_replace('/[\'",.*()]/', '', $row_data_post['amphur_name']); ?>,

                                        <?php echo $row_data_post['province_name']; ?>

                                    </span>

                                    <br>

                                    <span>

                                        <i class="fas fa-align-justify" aria-hidden="true"></i>

                                        <?php echo $property_code; ?><?php echo $row_data_post['type_category']; ?>

                                    </span>

                                    <br>



                                    <i class="far fa-square text_p_info" aria-hidden="true">

                                        <span
                                            class="font18"><?php if(!empty($row_data_post['rai'])){echo number_format($row_data_post['rai']).' ไร่ |';} ?></span>



                                        <span
                                            class="font18"><?php if(!empty($row_data_post['sqw'])){echo number_format($row_data_post['sqw']).' ตารางวา |';} ?></span>



                                        <span
                                            class="font18"><?php if(!empty($row_data_post['sqm'])){echo number_format($row_data_post['sqm']).' ตารางเมตร';} ?></span>

                                    </i>



                                    <br>

                                    <span>



                                        <span class="font18"><?php if(!empty($row_data_post['beds'])){

		echo '<i class="fas fa-bed" aria-hidden="true"></i> '.$row_data_post['beds'].' ห้องนอน';	}?></span>

                                        <span class="font18"><?php if(!empty($row_data_post['baths'])){

		echo '<i class="fas fa-shower" aria-hidden="true"></i> '.$row_data_post['baths'].' ห้องน้ำ';

		} ?></span>

                                        <span class="font18"><?php if(!empty($row_data_post['parking'])){

		echo '<i class="fas fa-car" aria-hidden="true"></i> '.$row_data_post['parking'].' ที่จอดรถ';

		} ?></span>

                                    </span>



                                    <!-- <br>

                                #Update <?php echo $row_data_post['date']; ?> -->

                                </div>

                                <br>



                                <div align="center" class="font22 text-success">

                                    <?php 

$sqm =str_replace(',', '', $price =str_replace('.', '', trim($row_data_post['sqm'])));

switch($row_data_post['type_property_code']){

	

	case 'FW' :

	if(!empty($sqm )){

	echo 'พื้นที่ '.number_format( $sqm ).' ตารางเมตร';

	}else{

	if(!empty($sqm )){

	echo 'พื้นที่ '.number_format( $sqm ).' ตารางวา';			

		}	

	}

	

}

?>

                                </div>



                                <hr>

                                <div class="p-2">

                                    <span
                                        class="card-title font18"><?php if(!empty($language)){echo'Contact Agent';}else{echo'ติดต่อ Agent';} ?></span>

                                    <br>

                                    <span class="card-text font16">Name: <?php echo $row_user['name']; ?>

                                        <?php echo $row_user['surname']; ?></span>

                                    <br>

                                    <span class="card-text font14">Email:

                                        <?php 

                                    if( $row_user['email'] == 'nat.dfirstasset@gmail.com'){

                                        echo "shalom.nat89@gmail.com";

                                    }

                                    ?></span>

                                </div>

                                <div class="p-2">

                                    <div class="form-row">

                                        <div class="form-group col">



                                            <a href="http://line.me/ti/p/~0971823805">

                                                <div class="btn btn-block btn-success">@ Line_id</div>

                                            </a>



                                        </div>



                                        <div class="form-group col">

                                            <a href="tel:0815823485">

                                                <div class="btn btn-block btn-info">

                                                    <i class="fas fa-phone-volume" aria-hidden="true"></i>

                                                    081-582-3485



                                                </div>

                                            </a>



                                        </div>





                                    </div>

                                    <hr>

                                    <strong class="text-danger">ติดต่อเราด่วน :</strong>



                                    <form action="send_info.php" method="post" class="form-row">

                                        <div class="col-12">

                                            <div class="row">

                                                <div class="form-group col">

                                                    <label>Name</label>

                                                    <input type="text" class="form-control" name="name_user"
                                                        placeholder="Name" required>

                                                </div>



                                                <div class="form-group col">

                                                    <label>Phone</label>

                                                    <input type="number" class="form-control" name="phone"
                                                        placeholder="Phone" required>

                                                </div>

                                            </div>

                                        </div>



                                        <div class="col-12">

                                            <div class="row">

                                                <div class="form-group col">

                                                    <label>Line/WeChat</label>

                                                    <input type="text" class="form-control" name="line_id"
                                                        placeholder="ID_line">

                                                </div>

                                            </div>

                                        </div>



                                        <input type="text" hidden="yes" name="code_property"
                                            value="<?php echo $row_data_post['code_property'];?>">

                                        <div class="form-group col-12">

                                            <label for="myMessage">message</label>

                                            <textarea class="form-control" id="myMessage" name="message" rows="3"><?php echo trim($row_data_post['title']); ?>

     <?php if(!empty($language)){echo'Price:';}else{echo 'ราคา:';} ?>

   ฿<?php if(!empty($row_data_post['price'])){

	   echo number_format($row_data_post['price']);

	   }else{echo'0';} ?>

    </textarea>

                                        </div>

                                        <input type="text" hidden="yes" name="url"
                                            value="https://www.dfirstproperty.com<?php echo $_SERVER['REQUEST_URI']; ?>">

                                        <input type="text" hidden="yes" name="price_user" value="<?php 

  if( $row_data_post['type_category_code'] == 'R' ){

    $price = preg_replace('/[\'",.*()]/', '', $row_data_post['price']);

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

}elseif($row_data_post['type_category_code'] == 'S' || $row_data_post['type_category_code'] == 'LC'){

    $price = preg_replace('/[\'",.*()]/', '', $row_data_post['price_sale']);



    if(empty($price)){

        $price = preg_replace('/[\'",.*()]/', '', $row_data_post['price']);

    }



    if($price == NULL || $price == 0 ){

        echo 'สอบถามราคา';



    } else {



    if($price <= 500000){

        echo number_format($price).' /เดือน';

    }else{

        echo number_format($price).' บาท';

    }

    }

}

	?>">



                                        <label class="bg-info font18"> <?php echo $rand_num=rand(10000,99999);?>

                                        </label>

                                        <input type="number" name="chek_ok" class="form-control"
                                            placeholder="Number Check" required>



                                        <input type="text" hidden="yes" name="chek_number"
                                            value="<?php echo $rand_num; ?>">

                                        <br>

                                        <input type="submit" value="ส่งข้อความด่วน!!" class="btn btn-block btn-danger">

                                    </form>

                                </div>





                            </div>

                        </div>



                    </div>

                </div>

                <br>



                <!-- ด้านล่าง -->



                <?php



$amphur_id=trim($row_data_post['amphur_name']);

$amphur_id_n= str_replace('เขต', '', $amphur_id);

$amphur_id_n= str_replace('เมือง', '', $amphur_id_n);



$type_category_code=$row_data_post['type_category_code'];

$type_property_code=$row_data_post['type_property_code'];



include_once('db/con_site_bar.php');

$query_data_post_B = "SELECT * FROM post_property WHERE title LIKE '%$amphur_id_n%' AND type_category_code = '".$type_category_code."' AND type_property_code = '".$type_property_code."' ORDER BY RAND() LIMIT 0,3";

$result = $mysqli->query($query_data_post_B);

$row_data_post_B = $result->fetch_assoc();



if(empty($row_data_post_B['title'])){

	$div_hidden='hidden="yes"';

}else{

	$div_hidden='';

}

?>

                <h2 <?php echo $div_hidden; ?> class="text-success font22 container-lg mt-3">

                    <?php echo $property_code.''.$row_data_post['type_category'].' '.preg_replace("/[\(\)\*]/", "",str_replace('เขต', '', $row_data_post['amphur_name'])).', '.$row_data_post['province_name']; ?>

                </h2>

                <hr class="border-success">

                <div class="container-lg">

                    <div class="row">



                        <?php do{ if(!empty($row_data_post_B['title'])){ ?>

                        <!-- strat -->

                        <div class="col-md-6 col-lg-4 " style="padding-top:10px;">

                            <div class="border rounded-lg shadow">

                                <?php 

switch($row_data_post_B['type_category_code']){

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

                                <div>



                                    <div align="center"
                                        style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);"
                                        class="image-box">

                                        <?php

$extensions = ['jpg', 'gif', 'png'];



// Create an empty array to store file names

$files = [];

// Loop through each extension and append matching files to the array

foreach ($extensions as $extension) {

    $pattern = "images/property/" . $row_data_post_B['img_folder'] . "/*.$extension";

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



echo '<img itemprop="image" src="https://www.images.dfirstproperty.com/'.$num_img.'" width="100%" alt="'.$row_data_post_B['title'].'" class="img_info" loading="lazy" decoding="async">';}else{

echo '<img src="images/not-available.jpg" alt="Not-images" loading="lazy" decoding="async">';

}

?>



                                    </div>



                                </div>



                                <div class="p-2 bg-white font14">

                                    <i class="fa fa-share text-success" aria-hidden="true"></i> <span><a href="<?php



$title_cut = trim($row_data_post_B['title']) . '-' . $row_data_post_B['code_property'];                  

$title = preg_replace('/[\'\"\.\*\:\!\@\#\$\%\&\(\)\+\/]{1,10}+/', ' ', $title_cut);

$title_url = preg_replace('/[\,]/', '', trim($title)); 

$title_url = preg_replace('/–/', '-', $title_url);  

$title_url = preg_replace("/[\ \-]+/", "-", $title_url);



echo 'https://www.dfirstproperty.com/real-estate/'.$title_url;?>" itemprop="url" class=" text-dark stretched-link"
                                            title="<?php echo $row_data_post_B['title']; ?>" target="_blank" rel="noopener noreferrer">

                                            <?php echo $row_data_post_B['title']; ?></a></span>

                                    <br>



                                    <span class="">

                                        <i class="fa fa-home text-success" aria-hidden="true"></i>

                                        <?php echo $row_data_post_B['type_property']; ?>

                                        <br>

                                        <i class="fa fa-map-marker text-success" aria-hidden="true"></i>

                                        <?php echo $row_data_post_B['province_name'].',&nbsp;';  echo  preg_replace("/[\(\)\.\*]/", "", $row_data_post_B['amphur_name']); ?>

                                        <br>



                                        <?php

                                if($row_data_post_B['type_property_code'] == 'FW' ||

                                $row_data_post_B['type_property_code'] == 'BF' ||

                                $row_data_post_B['type_property_code'] == 'SP' ||

                                $row_data_post_B['type_property_code'] == 'L'  ||

                                $row_data_post_B['type_property_code'] == 'L'                              

                                ){                         }else{                                  



                                    echo '<i class="fas fa-bed text-success" aria-hidden="true"></i> '.$row_data_post_B['beds'].' ห้องนอน ';

                                    echo '<i class="fas fa-shower text-success" aria-hidden="true"></i> '.$row_data_post_B['baths'].' ห้องน้ำ ';

                                    echo '<i class="fas fa-car text-success" aria-hidden="true"></i> '.$row_data_post_B['parking'].' ที่จอดรถ ';      

                                    echo '<br>';                                                

                                }





?>



                                        <span class="font16">



                                            <?php

$sqm =preg_replace('/[\'",.*()]/', '', trim($row_data_post_B['sqm']));

$rai = preg_replace('/[\'",.*()]/', '',$row_data_post_B['rai']);

$sqw = preg_replace('/[\'",.*()]/', '',$row_data_post_B['sqw']);



if ($sqm > 0  || $rai > 0 || $sqw > 0 ){



    echo '<i class="far fa-square text_p_info text-success" aria-hidden="true"></i> ';



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



                                    <div class="border-top">

                                        <div class="d-flex">

                                            <span
                                                class="p-1 align-self-center text-secondary font14"><?php echo $row_data_post_B['type_category'].$row_data_post_B['type_property']; ?></span>

                                            <div class="ml-auto p-1 align-self-center font18 text-red">

                                                <font class="font14">฿</font><?php





$price = preg_replace('/[\'",.*()]/', '', $row_data_post_B['price']);



    if( $row_data_post['type_category_code'] == 'R' ){

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

    }elseif($row_data_post['type_category_code'] == 'S' || $row_data_post['type_category_code'] == 'LC'){



        if($price == NULL || $price == 0 ){

 

            echo 'สอบถามราคา';

 

        }else{



            echo number_format($price).' บาท';



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

                        <?php }} while ($row_data_post_B = $result->fetch_assoc()); ?>

                    </div>

                </div>

            </div>

            <!-- end conten -->





            <br>

            <button type="button" onclick="topFunction()" id="myBtn" class="bg-success" aria-label="Scroll to top">
                <i class="fas fa-angle-up show_700" aria-hidden="true"></i>
            </button>



        </div>



    </main>

    <?php 

include_once('layout/detail_view/fix_bottom.php');



include_once('menu.php');

echo $footer;



include_once('layout/js_footer.php');




?>



<script>
    // Copy text functionality
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        navigator.clipboard.writeText(copyText.value);
    }

    // Scroll to top functionality
    var myButton = document.getElementById("myBtn");

    // Toggle button visibility based on scroll position
    window.onscroll = function() {
        myButton.style.display = (document.documentElement.scrollTop > 20) ? "block" : "none";
    };

    // Scroll to the top of the page
    function topFunction() {
        document.documentElement.scrollTop = 0;
    }

    // Add 'js' class for enhanced functionality
    document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, '') + ' js';
</script>





</body>



</html>