<?php

include('db/con_site_bar.php');



$category_code = $property_code = $title_new = $title_new2 = '';

$rent = $rent_2 = $rent_3 = '';



$type_property_code = $_GET['type_property_code'];

$type_category_code = $_GET['type_category_code'];



$pa_code = @$_GET['pa_code'];




switch($_GET['type_category_code']){

	case 'rent':

	$category_code='R';

	break;

	case 'ให้เช่า':

	$category_code='R';

 	$rent='เช่า';

	$rent_2='ให้เช่า';

	break;	



	case 'sale':

	$category_code='S';

	break;	



	case 'ขาย':

	$category_code='S';

	$rent='ขาย';

    $rent_3='ขาย';

	break;

	

	case 'liquidate':

	$category_code='LC';

	break;

	

	case 'เซ้ง':

	$category_code='LC';

	$rent='เซ้ง';

	break;

		

	default:	

	

}



switch($_GET['type_property_code']){

	case 'บ้านเดี่ยว' :

	$property_code='H';	

	if(!empty($_GET['pa_code'])){



        if(!empty($rent_3)){

            $title_new = $rent.'บ้านเดี่ยว '.$pa_code ;


        }else{



            $title_new = 'บ้าน'.$rent.' บ้านเดี่ยว '.$_GET['type_category_code'].' '.$pa_code ;



        }		

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].'  '.$pa_code ;

		

	}else{
		
		$title_new = $rent.'บ้านเดี่ยว ในประเทศไทย';
	

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

		

	}

	break; //---------end

	

	case 'townhouse' :	

	$property_code='T';		

	break;

	case 'ทาวน์เฮ้าส์' :

	$property_code='T';		

	if(!empty($_GET['pa_code'])){

		$title_new='ทาวน์เฮ้าส์'.$rent.' ทาวน์โฮม'.$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new=$rent.'ทาวน์เฮ้าส์ ทาวน์โฮม'.$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}	

	break; //---------end

	

	case 'คอนโด':

	$property_code='C';

	

	if(!empty($_GET['pa_code'])){



		$title_new='คอนโดมิเนียม '.$_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new='คอนโดมิเนียม '.$_GET['type_property_code'].$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}

	

	break; //---------end

	

	case 'commercial-building':

	$property_code='B';

	break;

	case 'ตึกแถว-อาคารพานิชย์':

	$property_code='B';
	

	if(!empty($_GET['pa_code'])){

		$title_new=$rent.'ตึกแถว  อาคารพานิชย์'.$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new=$rent.'ตึกแถว  อาคารพานิชย์'.$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}

	break; //---------end

		

	case 'โกดัง-โรงงาน':

	$property_code='FW';
	

	if(!empty($rent_2)){$rent_2=$rent_2;}else{$rent_2='';}



	if(!empty($_GET['pa_code'])){

	if(!empty($rent_3)){



        // ขาย

        $title_new='โกดัง / โรงงาน '.$rent.' '.$_GET['pa_code'];



    }else{

        // เช่า

        $title_new='โกดัง'.$rent_2.' โรงงาน '.$rent.' '.$_GET['pa_code'];

    }    

    $title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

    

	}else{

        if(!empty($rent_3)){

            $title_new='โกดัง / โรงงาน '.$rent_2.', ใน ประเทศไทย | Dfirst Property';


        }else{

            $title_new='โกดัง'.$rent_2.' โรงงาน '.$rent.', ใน ประเทศไทย | Dfirst Property';


        }		

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}

	

	break; //---------end

		

	

	case 'land':

	$property_code='L';

	break;

	case 'ที่ดิน':

	$property_code='L';

	if(!empty($_GET['pa_code'])){

		$title_new=$_GET['type_category_code'].'ที่ดิน มีที่ดินเปล่า'.$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new=$_GET['type_category_code'].'ที่ดิน มีที่ดินเปล่า'.$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}

	break; //---------end

	

	case 'other':

	$property_code='OT';

	break;

	case 'อื่นๆ':

	$property_code='OT';

	break;

	

	case 'apartment':

	$property_code='AP';

	break;

	case 'อพาทเม้น':

	$property_code='AP';

	if(!empty($_GET['pa_code'])){

		$title_new=$rent.'อพาทเม้น อพาทเม้น'.$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new=$rent.'อพาทเม้น อพาทเม้น'.$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}

	break; //---------end

	

	case 'hotel':

	$property_code='HT';

	break;

	case 'โรงแรม':

	$property_code='HT';

	

	if(!empty($_GET['pa_code'])){

		$title_new=$rent.'โรงแรม โรงแรม'.$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new=$rent.'โรงแรม โรงแรม'.$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}	

	

	break; //---------end

	

	case 'space':

	$property_code='SP';

	break;

	case 'พื้นที่':

	$property_code='SP';

	if(!empty($_GET['pa_code'])){

		$title_new=$rent.'พื้นที่ว่าง พื้นที่'.$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new=$rent.'พื้นที่ว่าง พื้นที่'.$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}

	break; //---------end



	case 'office_building':

	$property_code='BF';

	break;

	case 'สำนักงาน-ออฟฟิศ':

	$property_code='BF';

	if(!empty($_GET['pa_code'])){

		$title_new=$rent.'สำนักงาน ออฟฟิศ'.$_GET['type_category_code'].' '.$_GET['pa_code'];

				

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];

	}else{

		

		$title_new=$rent.'สำนักงาน ออฟฟิศ'.$_GET['type_category_code'];

		

		$title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];

	}

	break;	 //---------end



    case 'showroom':
        $property_code='SR';
    
        break;
    
        case 'โชว์รูม':
        $property_code='SR';    
        if(!empty($_GET['pa_code'])){
    
            $title_new=$rent.'พื้นที่ โชว์รูม'.$_GET['type_category_code'].' '.$_GET['pa_code'];                     
    
            $title_new2 = $_GET['type_property_code'].$_GET['type_category_code'].' '.$_GET['pa_code'];
    
        }else{    
                
            $title_new=$rent.'พื้นที่ โชว์รูม'.$_GET['type_category_code'];           
    
            $title_new2 = $_GET['type_property_code'].$_GET['type_category_code'];
    
        }
    
        break; //---------end



	default:

	

}



// page number

$perpage = '16';

$page_get = explode('?page=', $_SERVER['REQUEST_URI']);

if(!empty($page_get[1])){$page_head = $page_get[1];}

if(!empty($page_head)){

    if($page_head!=0){

        $page = $page_head-1;

        $start =  $perpage * $page; 

        $numone=$page+1;

        $swith=$page_head;

        }

 }else{ 

    $start = '0';

    $numone= '1';

    $page= '1';

    $swith= '0';

}



if(!empty($_GET['pa_code'])){	



switch($pa_code){

	case 'สุขุมวิท':

	$pa_code='เขตวัฒนา';

	break;	

	case 'bts-สะพานควาย':

	$pa_code='เขตพญาไท';

	break;	

	case 'เทพารักษ์':

	$pa_code='บางพลี';

	break;

	case 'ใกล้-ตลาดไท':

	$pa_code='คลองหลวง';

	break;	

    case 'พระนครศรีอยุธยา':

        $pa_code='อยุธยา';
    
    break;
    

	default:

	$pa_code;



}





$query_data_post = mysqli_query($con, "SELECT * FROM post_property WHERE amphur_name = '$pa_code' AND type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC Limit $start, $perpage");

$row_data_post = mysqli_fetch_array($query_data_post, MYSQLI_ASSOC);

$totalRows_data_post = mysqli_num_rows($query_data_post);



$query_one = mysqli_query($con, "SELECT * FROM post_property WHERE amphur_name = '$pa_code' AND type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC");

$total_one = mysqli_num_rows($query_one);





$query_data_post_2 = mysqli_query($con, "SELECT * FROM post_property WHERE amphur_name = '$pa_code' AND type_property_code='$property_code' AND type_category_code='$category_code'");

$row_data_post_2 = mysqli_fetch_array($query_data_post_2, MYSQLI_ASSOC);

$totalRows_data_post_2 = mysqli_num_rows($query_data_post_2);



if(empty($row_data_post['amphur_name']))

{



$query_data_post = mysqli_query($con, "SELECT * FROM post_property WHERE province_name = '$pa_code' AND type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC Limit $start, $perpage");

$row_data_post = mysqli_fetch_array($query_data_post, MYSQLI_ASSOC);

$totalRows_data_post = mysqli_num_rows($query_data_post);



$query_one = mysqli_query($con, "SELECT * FROM post_property WHERE province_name = '$pa_code' AND type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC");

$total_one = mysqli_num_rows($query_one);

}



if(empty($row_data_post['province_name'])){



$query_data_post = mysqli_query($con, "SELECT * FROM post_property WHERE title LIKE '%$pa_code%' AND type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC Limit $start, $perpage");

$row_data_post = mysqli_fetch_array($query_data_post , MYSQLI_ASSOC);

$totalRows_data_post = mysqli_num_rows($query_data_post);



$query_one = mysqli_query($con, "SELECT * FROM post_property WHERE title LIKE '%$pa_code%' AND type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC");

$total_one = mysqli_num_rows($query_one);



}




}else{

	

$property_code;

$category_code;



$query_data_post = mysqli_query($con, "SELECT * FROM post_property WHERE type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC Limit $start, $perpage");

$row_data_post = mysqli_fetch_array($query_data_post , MYSQLI_ASSOC);

$totalRows_data_post = mysqli_num_rows($query_data_post);



$query_one = mysqli_query($con, "SELECT * FROM post_property WHERE type_property_code='$property_code' AND type_category_code='$category_code' ORDER BY hot_sale DESC, date DESC, time DESC");

$total_one = mysqli_num_rows($query_one);



$pa_code = "";

}

   if(empty($row_data_post['title'])){

	header('Location: https://www.dfirstproperty.com/error');

  }

  

?>

<?php

$extensions = ['jpg', 'gif', 'png'];



// Create an empty array to store file names

$files_2 = [];

// Loop through each extension and append matching files to the array

foreach ($extensions as $extension) {

    $pattern = "images/property/" . $row_data_post['img_folder'] . "/*.$extension";

    $matchingFiles = glob($pattern);

    

    if (!empty($matchingFiles)) {

        $files_2 = array_merge($files_2, $matchingFiles);

    }

}

rsort($files_2);





if(!empty($files_2)){

	$num_img_2 = $files_2[0];

    $num_img_2 = substr($num_img_2,7);

}else{

	$num_img_2 = '';

}

?>
<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#28a745" />

    <?php

if(!empty($pa_code)){$pa_code=$pa_code;}else{$pa_code='';};



$query_title = mysqli_query($con, "SELECT * FROM post_property WHERE amphur_name='$pa_code' ");

$row_title = mysqli_fetch_array($query_title , MYSQLI_ASSOC);

 if(!empty($row_title['province_name'])){

 $title_pp = $row_title['province_name'];

 }



  if(!empty($title_pp)){ $title_pp = ', '.$title_pp;}else{$title_pp='';}



  $title_seo = str_replace('เขต', '', str_replace('-', '', $title_new)).$title_pp;  



  $title_search = str_replace('เขต', '', $title_new2).str_replace(',', '', $title_pp);



  $sibar=str_replace('เขต', '', $title_new2).$title_pp;



 

?><title><?php echo str_replace('เขต', '', str_replace('-', ' ', trim($title_seo))); ?></title>

    <?php 

if(!empty($_GET['pa_code'])){$pp_code=$_GET['pa_code'];}else{$pp_code='';}



switch($title_new2){

  case 'โกดัง-โรงงานให้เช่า':

  $title_c_n="โกดังเช่า โรงงานให้เช่า";

  $title_c_d="โกดังเช่า โรงงานให้เช่า";

  break;

  

  default:

  $title_c_n=$title_new2;

}

if(!empty($title_c_d)){$title_c_d=', '.$title_c_d;}else{$title_c_d='';}

if(!empty($_GET['pa_code'])){ $seo_pa=trim($_GET['type_property_code']).$rent_2.' '.$_GET['pa_code'].$title_c_d;}else{$seo_pa=trim($_GET['type_property_code']);}

?>

    <meta name="description"
        content="<?php echo $detail= trim($title_seo).', '.($total_one).' ผลการที่ค้นหาประกาศ พร้อมทำเล แผนที่ และรายละเอียดครบถ้วน '.$seo_pa; ?>" />

    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large" />
    <meta name="googlebot" content="index, follow">

    <?php include_once('layout/dns.php'); ?>

    <link rel="preload" as="image" href="https://www.images.dfirstproperty.com/<?php echo $num_img_2 ?>">


    <link rel="canonical"
        href="<?php echo $url_meta='https://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']); ?>">

    <link rel="alternate"
        href="<?php echo $url_meta='https://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']); ?>"
        hreflang="x-default" />

    <link rel="alternate"
        href="<?php echo $url_meta='https://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']); ?>"
        hreflang="th" />



    <meta content="https://www.facebook.com/Dfirst-property-689042971121011/" property="fb:profile_id">

    <meta content="th_TH" property="og:locale">

    <meta content="Dfirst Property" property="og:site_name">

    <meta content="website" property="og:type">

    <meta content="<?php echo $url_meta; ?>" property="og:url">

    <meta content="<?php echo trim($title_seo) ?>" property="og:title">

    <meta content="<?php echo $detail; ?>" property="og:description">

    <meta content="https://www.images.dfirstproperty.com/<?php echo $num_img_2 ?>" property="og:image">



    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:site" content="@DfirstProperty">

    <meta name="twitter:creator" content="@DfirstProperty">

    <meta name="twitter:title" content="<?php echo $title_seo; ?>">

    <meta name="twitter:description" content="<?php echo $detail; ?>">

    <meta name="twitter:image" content="https://www.images.dfirstproperty.com/<?php echo $num_img_2 ?>">


    <?php include_once ('seo/GoogleTagHead.php'); ?>

    <?php if(empty($title_pp)){

        if(empty($pp_code)){

            $Schema_Place ='"addressRegion": "ประเทศไทย"';

        }else{

            $Schema_Place ='"addressRegion": "'.trim(preg_replace("/#\s+#/", "", $row_data_post['province_name'])).'"';  

        }        



    }else{

        $Schema_Place ='"addressLocality": "'.preg_replace("/[\(\)\.\*\(#\s+#)]/", "", $row_data_post['amphur_name']).'",

        "addressRegion": "'.trim(preg_replace("/#\s+#/", "", $row_data_post['province_name'])).'",

        "streetAddress": "'.trim(preg_replace("/[\(\)\.\*\(#\s+#)]/", "", $row_data_post['amphur_name'])).', '.trim($row_data_post['province_name']).'"

        ';



    } ?>



<script type='application/ld+json'>
{
    "@context": "https://schema.org",
    "@graph": [{
        "@type": "WebPage",
        "@id": "<?php echo htmlspecialchars($url_meta, ENT_QUOTES, 'UTF-8'); ?>#webpage",
        "url": "<?php echo htmlspecialchars($url_meta, ENT_QUOTES, 'UTF-8'); ?>",
        "inLanguage": "th",
        "name": "<?php echo htmlspecialchars(trim($title_seo), ENT_QUOTES, 'UTF-8'); ?>",
        "description": "<?php echo htmlspecialchars($detail, ENT_QUOTES, 'UTF-8'); ?>",
        "publisher": {
            "@type": "Organization",
            "name": "DFirst Property",
            "url": "https://www.dfirstproperty.com"
        }
    }]
}
</script>



</head>



<body class="images_bg_body">

    <main>

        <?php include('menu.php'); include_once ('layout/in_css.php'); include_once ('seo/GoogleTagBody.php'); include_once('layout/menu_top.php'); ?>

        <div style="background-image: linear-gradient(180deg, #ebedee 0%, #fdfbfb 100%);">

            <br />

            <br />

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb container-lg bg-transparent font14" itemscope
                    itemtype="http://schema.org/BreadcrumbList">

                    <!-- Home Breadcrumb -->
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope
                        itemtype="http://schema.org/ListItem">
                        <a href="https://www.dfirstproperty.com/" class="text-success" itemprop="item">
                            <i class="fa fa-home" aria-hidden="true"></i> <span itemprop="name">หน้าแรก</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>

                    <?php 
        $type_property_del = $_GET['type_property_code'] ?? 'โกดัง-โรงงาน'; // Default value for missing type_property_code

        // Check if province name exists and build the breadcrumb
        if (!empty($row_data_post_2['amphur_name'])) {

            // Property Type and Category Breadcrumb
            echo '
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="https://www.dfirstproperty.com/'.$_GET['type_property_code'].'-'.$_GET['type_category_code'].'" class="text-success" itemprop="item">
                    <span itemprop="name">'.htmlspecialchars($type_property_del . ' ' . $_GET['type_category_code']).'</span>
                </a>
                <meta itemprop="position" content="2" />
            </li>';

            // Province Breadcrumb
            echo '
            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="https://www.dfirstproperty.com/'.$_GET['type_property_code'].'-'.$_GET['type_category_code'].'/'.trim($row_data_post_2['province_name']).'" class="text-success" itemprop="item">
                    <span itemprop="name">'.htmlspecialchars(trim($row_data_post_2['province_name'])).'</span>
                </a>
                <meta itemprop="position" content="3" />
            </li>';

            // Amphur (District) Breadcrumb
            echo '
            <li class="breadcrumb-item" aria-current="page">
                <span>'.htmlspecialchars(preg_replace('/[\'",.*()]/', ' ', $row_data_post_2['amphur_name'])).'</span>
            </li>';

        } else { // Handle when no amphur_name is present

            // If 'pa_code' is not empty, display appropriate breadcrumb
            if (empty($_GET['pa_code'])) {
                echo '
                <li class="breadcrumb-item" aria-current="page">
                    <span>'.htmlspecialchars($type_property_del . ' ' . $_GET['type_category_code']).'</span>
                </li>';
            } else {
                // Type and Category Breadcrumb
                echo '
                <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a href="https://www.dfirstproperty.com/'.$_GET['type_property_code'].'-'.$_GET['type_category_code'].'" class="text-success" itemprop="item">
                        <span itemprop="name">'.htmlspecialchars($type_property_del . ' ' . $_GET['type_category_code']).'</span>
                    </a>
                    <meta itemprop="position" content="2" />
                </li>';

                // pa_code Breadcrumb
                echo '
                <li class="breadcrumb-item" aria-current="page">
                    <span>'.htmlspecialchars($pa_code).'</span>
                </li>';
            }
        }
    ?>

                </ol>




                <center>

                    <h1 title="<?php echo @number_format($total_one); ?> ค้นหาประกาศ <?php echo $title_search; if(empty($_GET['pa_code'])){

	echo ' ใน ประเทศไทยทั้งหมด';} ?>" class="text-center container-lg font18"><?php echo @number_format($total_one); ?>

                        ค้นหาประกาศ <?php echo $title_search;

if(empty($_GET['pa_code'])){ echo ' ใน ประเทศไทยทั้งหมด'; }?></h1>

                </center>

            </nav>



            <div class="bg-light border-bottom show_700">

                <div class="container-lg p-1">

                    <div class="d-flex justify-content-center">



                        <form action="/real-estate" method="get">



                            <ul class="nav nav-pills" id="pills-tab" role="tablist">

                                <li class="nav-item">

                                    <select class="form-control rounded-0 form-h" name="type_property_code">

                                        <?php

                            if(!empty($_GET['type_property_code'])){

                                echo '<option value="'.$property_code.'">->'.$_GET['type_property_code'].'</option>';

                            }else{

                                echo '<option value="">ที่อยู่อาศัย</option>';

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

                    echo '<option value="'.$category_code.'">->'.$_GET['type_category_code'].'</option>';

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



if (isset($_GET['pa_code']) && $_GET['pa_code']) {



    $pa_code = $mysqli->real_escape_string($_GET['pa_code']);



    $sqlscr = "SELECT * FROM post_property WHERE province_name LIKE '%$pa_code%'";



        // Execute the query

      $resultscr = $mysqli->query($sqlscr);

      $rowSCr = $resultscr->fetch_assoc();



        // Check if there are any results

        if ($resultscr->num_rows > 0) {



                // Process each row of data

                echo '<option value="'.$rowSCr['province_id'].'">->'.$rowSCr['province_name'].'</option>';

                echo '<option value="0">ทุกจังหวัด</option>';

           

        } else {



        // No results found

           if($row_data_post_2['province_name']){



            echo '<option value="'.$row_data_post_2['province_id'].'">->'.$row_data_post_2['province_name'].'</option>';



           }

           

            echo '<option value="0">ทุกจังหวัด</option>';

        }



        // Close the statement

        

    } else {

        // Handle the error if the statement couldn't be prepared

        echo '<option value="0">ทุกจังหวัด</option>';

    }   

   



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

  

  if (!empty($rowSCr['province_id'])) {

  

    echo '<option value="0">ทุกอำเภอ/เขต</option>';  

    $sqlpro = "SELECT * FROM amphur WHERE PROVINCE_ID = '".$rowSCr['province_id']."'";

    $resultpro = $mysqli->query($sqlpro); 

  

    if (!empty($resultpro)) {

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



                                    <input type="submit" value="ค้นหา"
                                        class="form-control rounded-0 font14 btn-success form-h">





                                </li>



                            </ul>

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">

                                    <div align="center" class="card rounded-0">

                                        <div class="card-body d-flex justify-content-center bg-primary">

                                            <div class="form-row">



                                                <?php

if($row_data_post['type_property_code'] == 'FW'){

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

if($row_data_post['type_property_code'] == 'H' || $row_data_post['type_property_code'] == 'T'){

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

                                                    <select class="form-control rounded-0 font14 form-h"
                                                        name="minprice">

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

                                                    <select class="form-control rounded-0 font14 form-h"
                                                        name="maxprice">

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



        <div class="container-lg">

            <div class="row">

                <div class="col-lg-8">

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

                        <?php do{ if(!empty($row_data_post['title'])){ ?>

                        <!-- strat -->

                        <div class="col-md-6 col-lg-6 mt-3">

                            <div class="border rounded-lg shadow">

                                <?php 

switch($row_data_post['type_category_code']){

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

                                <div align="center"
                                    style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);"
                                    class="image-box">

                                    <?php

$extensions = ['jpg', 'gif', 'png'];



// Create an empty array to store file names

$files = [];

// Loop through each extension and append matching files to the array

foreach ($extensions as $extension) {

    $pattern = "images/property/" . $row_data_post['img_folder'] . "/*.$extension";

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

<img src="https://www.images.dfirstproperty.com/'.$num_img.'" class="img_info"  alt="'.htmlspecialchars($row_data_post['title']).'"   itemprop="image"></a>';

}else{

echo '<img src="https://www.images.dfirstproperty.com/not-available.jpg" class="img_info">';

}

?>



                                    <?php 

// img sold out

if(!empty($row_data_post['sold_out'])){

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



    // กำหนดความยาวสูงสุด (เช่น 150 ตัวอักษร)
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


echo 'https://www.dfirstproperty.com/real-estate/'.$title__;?>" itemprop="url" class=" text-dark stretched-link"
                                            title="<?php echo $row_data_post['title']; ?>" target="_blank">

                                            <span itemprop="name"><?php 

// Open Source!

$s = $row_data_post['title']; 

$a =str_split_unicode($s);

//print_r(array_slice($a,0,10));

$new_array= array_slice($a,0,90);

foreach($new_array as $val){ echo $val; }




?>

                                            </span>

                                        </a>

                                    </span>

                                    <br>



                                    <span class="" itemscope itemtype="https://schema.org/PostalAddress">

                                        <span itemprop="streetAddress">

                                            <i class="fa fa-map-marker text-success" aria-hidden="true"></i>

                                            <?php   echo  preg_replace("/[\(\)\.\*]/", "", $row_data_post['amphur_name']).', '.$row_data_post['province_name']; ?>

                                            <br>

                                        </span>



                                        <?php

                                if($row_data_post['type_property_code'] == 'FW' ||

                                $row_data_post['type_property_code'] == 'BF' ||

                                $row_data_post['type_property_code'] == 'SP' ||

                                $row_data_post['type_property_code'] == 'L'  ||

                                $row_data_post['type_property_code'] == 'L'                              

                                ){                         }else{                                  



                                    echo '<i class="fas fa-bed text-success"></i> '.$row_data_post['beds'].' ห้องนอน ';

                                    echo '<i class="fas fa-shower text-success"></i> '.$row_data_post['baths'].' ห้องน้ำ ';

                                    echo '<i class="fas fa-car text-success"></i> '.$row_data_post['parking'].' ที่จอดรถ ';      

                                    echo '<br>';                                                

                                }





?>

                                        <span class="font16">



                                            <?php

$sqm =preg_replace('/[\'",.*()]/', '', trim($row_data_post['sqm']));

$rai = preg_replace('/[\'",.*()]/', '',$row_data_post['rai']);

$sqw = preg_replace('/[\'",.*()]/', '',$row_data_post['sqw']);



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

 





if($row_data_post['type_property_code'] == 'FW'){

echo $row_data_post['type_category'].' โกดัง โรงงาน, '.preg_replace('/[\'",.*()]/', '', str_replace("เขต", "", $row_data_post['amphur_name']));



}else{

   echo $row_data_post['type_category'].' '.str_replace("/", " ", $row_data_post['type_property']).' '.preg_replace('/[\'",.*()]/', '', str_replace("เขต", "", $row_data_post['amphur_name']));

}

 ?>

                                    </span>



                                    <div class="border-top">

                                        <div class="d-flex">

                                            <div class="ml-auto p-1 align-self-center font18 text-red">฿<?php 

                                

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



                                            </div>



                                        </div>



                                    </div>







                                </div>





                            </div>

                        </div>

                        <!-- END -->

                        <?php }} while ($row_data_post = mysqli_fetch_array($query_data_post, MYSQLI_ASSOC)); ?>





                    </div>

                    <br>





                    <!-- END p-0 -->



                    <br>

                    <br>



                    <div class="d-flex justify-content-center">

                        <?php





$forsum = '3';



$total_ = $total_one / $perpage;

$total_page = ceil($total_);



if($totalRows_data_post == $perpage){

   

	$sumfor = $page+$forsum;



}else{



	$sumfor='1';

}



if(!empty($_GET['pa_code'])){

$url = $_GET['type_property_code'].'-'. $_GET['type_category_code'].'/'.$_GET['pa_code'];



 }else{



$url = $_GET['type_property_code'].'-'. $_GET['type_category_code'];



}



?>

                        <nav aria-label="Page navigation example">

                            <ul class="pagination pagination-lg">



                                <?php



$pagedel = $numone-1;

switch($swith){

case '0' :

$pagedel='';

break;

case '1' :

$pagedel='';

break;

default :

$pagedel = '?page='.$pagedel.'';

}



if($pagedel){

echo '

<li class="page-item">

<a class="page-link " href="'.$url.$pagedel.'" aria-label="Previous">

<span aria-hidden="true">&laquo; </span>

</a>

</li>

';

}



?>



                                <?php



echo '<li class="page-item active"><a class="page-link " href="'.$url.'?page='.$numone.'">หน้าที่ '.$numone.'</a></li>';





                if($total_page >= $sumfor){

                    for($i = $numone+1; $i <= $sumfor ;$i++){

                        echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$i.'">'.$i.'</a></li>';

                    }

                }else{

                    for($i = $numone+1; $i <= $total_page ;$i++){

                        echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$i.'">'.$i.'</a></li>';

                    }

                }

                

            

if($totalRows_data_post == $perpage){

$pagesum = $numone+1;

echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$pagesum.'" aria-label="Next"><span aria-hidden="true"> &raquo;</span>

      </a>

	  </li>';

}



mysqli_close($con);

?>

                            </ul>

                        </nav>

                    </div>

                </div>



                <!-- ด้านข้าง -->

                <?php include('layout/property_home/right_bar.php'); ?>

            </div>



            <!-- type_property ด้านล่าง -->

            <?php include('layout/property_home/type_property.php'); ?>

            <br />





        </div>

        <div onclick="topFunction()" id="myBtn" class="bg-success show_700">

            <i class="fas fa-angle-up show_700"></i>

        </div>



    </main>

    <?php 



include('layout/property_home/fix_bottom.php');

include('menu.php');



echo $footer;



include_once 'layout/js_footer.php';

?>



<script>
    $(document).ready(function() {
        var s = $(".sticky");
        var pos = s.position();

        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();

            // Apply 'stickyNew' class based on scroll position
            if (windowpos >= pos.top && windowpos >= 220) {
                s.addClass("stickyNew");
            } else {
                s.removeClass("stickyNew");
            }

            // Remove 'stickyNew' class when window scroll position is beyond 2750
            if (windowpos >= 2750) {
                s.removeClass("stickyNew");
            }
        });
    });
</script>

<script>
    // Get the button
    var mybutton = document.getElementById("myBtn");

    // Show button when scroll position is greater than 20px
    window.onscroll = function() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    };

    // Scroll to top function
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<script>
    // Adding 'js' class to the document element, removing 'no-js' class.
    document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, '') + ' js';
</script>




</body>



</html>