<?php 
include_once('db/con_site_bar.php');

$query_data_post_A = "SELECT * FROM post_property WHERE pruksa='yes' ORDER BY date DESC, time DESC LIMIT 0,9";
$data_post_A = mysqli_query($con, $query_data_post_A) or die(mysqli_error());
$row_data_post_A = mysqli_fetch_array($data_post_A, MYSQLI_ASSOC);
$totalRows_data_post_A = mysqli_num_rows($data_post_A);

$query_data_post_H = "SELECT * FROM post_property WHERE pruksa='yes' AND type_property_code='H' ORDER BY date DESC, time DESC LIMIT 0,9";
$data_post_H = mysqli_query($con, $query_data_post_H) or die(mysqli_error());
$row_data_post_H = mysqli_fetch_array($data_post_H, MYSQLI_ASSOC);
$totalRows_data_post_H = mysqli_num_rows($data_post_H);


$query_data_post_C = "SELECT * FROM post_property WHERE pruksa='yes' AND type_property_code='C' ORDER BY date DESC, time DESC LIMIT 0,9";
$data_post_C = mysqli_query($con, $query_data_post_C) or die(mysqli_error());
$row_data_post_C = mysqli_fetch_array($data_post_C, MYSQLI_ASSOC);
$totalRows_data_post_C = mysqli_num_rows($data_post_C);


$query_data_post_T = "SELECT * FROM post_property WHERE pruksa='yes' AND type_property_code='T' ORDER BY date DESC, time DESC LIMIT 0,9";
$data_post_T = mysqli_query($con, $query_data_post_T) or die(mysqli_error());
$row_data_post_T = mysqli_fetch_array($data_post_T, MYSQLI_ASSOC);
$totalRows_data_post_T = mysqli_num_rows($data_post_T);


?>

<h3 align="left" class="text-success roboto_font font24 container-lg"> ซื้อ/ขาย/เช่า โครงการพฤกษา</h3>
<hr class="bg-success m-0">

<div class="container-lg p-2">
    <div class="d-flex justify-content-center container-lg ">

        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active text-success" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                role="tab" aria-controls="nav-home" aria-selected="true">ทั้งหมด</a>
            <a class="nav-item nav-link border-left text-dark" id="nav-profile-tab" data-toggle="tab" href="#nav-condo"
                role="tab" aria-controls="nav-condo" aria-selected="false">คอนโดมิเนียม</a>
            <a class="nav-item nav-link border-left text-dark" id="nav-contact-tab" data-toggle="tab" href="#nav-house"
                role="tab" aria-controls="nav-house" aria-selected="false">บ้านเดี่ยว</a>
            <a class="nav-item nav-link border-left text-dark" id="nav-contact-tab" data-toggle="tab"
                href="#nav-townhouse" role="tab" aria-controls="nav-townhouse" aria-selected="false">ทาวน์เฮ้าส์</a>
        </div>
    </div>


    <div class="p-2">
        <div class="tab-content" id="nav-tabContent">


            <!-- tab1 all-->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">

                    <!-- start info -->

                    <?php do{if(!empty($row_data_post_A['title'])){ ?>
                    <div class="col-md-6 col-lg-4 roboto_font" style="padding-top:10px;">
                        <div class="border rounded-lg shadow">
                            <?php 
switch($row_data_post_A['type_category_code']){
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
$files = glob("images/property/".$row_data_post_A['img_folder']."/*.jpg");
$num_img = $files[0];
if(!empty($num_img)){
echo '<img src="'.$num_img.'" alt="'.$row_data_post_A['title'].'" class="pic_row" itemprop="image">';}else{
echo '<img src="images/not-available.jpg" class="pic_row" itemprop="image">';
}
?>

                                </div>

                            </div>

                            <div class="p-2 bg-white font14">
                                <i class="fa fa-share text-success" aria-hidden="true"></i> <span><a href="<?php

$title_cut =trim($row_data_post_A['title']);
$title = preg_replace('/([\- \/\'\.\*\,\/\(\)]{1,10})/','-',$title_cut);

echo 'real-estate/'.$title.'-'.$row_data_post_A['code_property'];?>" itemprop="url" class=" text-dark stretched-link"
                                        title="<?php echo $row_data_post_A['title']; ?>">
                                        <?php echo $row_data_post_A['title']; ?></a></span>
                                <br>

                                <span class="">
                                    <i class="fa fa-home text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_A['type_property']; ?>
                                    <br>
                                    <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_A['province_name'].',&nbsp;';  echo  preg_replace("/[\(\)\.\*]/", "", $row_data_post_A['amphur_name']); ?>
                                    <br>

                                    <?php  switch($row_data_post_A['type_property_code']){ 
        case 'FW': 
		break;
		case 'L': 
		break;
        default:
?>
                                    <i class="fas fa-bed text-success"></i> <?php if(!empty($row_data_post_A['beds'])){
		echo $row_data_post_A['beds'];
		}else{echo '-';} ?> ห้องนอน
                                    <i class="fas fa-shower text-success"></i> <?php if(!empty($row_data_post_A['baths'])){
		echo $row_data_post_A['baths'];
		}else{echo '-';} ?> ห้องน้ำ
                                    <i class="fas fa-car text-success"></i> <?php if(!empty($row_data_post_A['parking'])){
		echo $row_data_post_A['parking'];
		}else{echo '-';} ?> ที่จอดรถ
                                    <br>
                                    <?php } ?>

                                    <i class="far fa-square text_p_info text-success"></i>
                                    <?php if(!empty($row_data_post_A['rai'])){echo number_format($row_data_post_A['rai']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'rai';}else{echo ' ไร่';} ?>
                                    |
                                    <?php if(!empty($row_data_post_A['sqw'])){echo number_format($row_data_post_A['sqw']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqw';}else{echo ' ตรว.';} ?>
                                    |
                                    <?php 
$sqm =preg_replace("/[\"\'\.\*\,\/\- ]/", "", trim($row_data_post_A['sqm']));
if(!empty($row_data_post_A['sqm'])){echo number_format($sqm);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqm';}else{echo ' ตร.ม.';} ?>


                                </span>

                                <div class="border-top">
                                    <div class="d-flex">
                                        <span
                                            class="p-1 align-self-center text-secondary font14"><?php echo $row_data_post_A['type_category'].$row_data_post_A['type_property']; ?>พฤกษา</span>
                                        <div class="ml-auto p-1 align-self-center font18 text-red">
                                            <font class="font14">฿</font><?php

$price =str_replace(',', '', $price =str_replace('.', '', trim($row_data_post_A['price'])));

if(isset($price)){
	
	if($row_data_post_A['price']){
	switch($row_data_post_A['type_property_code']){
	case 'FW':
	switch($row_data_post_A['type_category']){
	case 'ให้เช่า':
	if($price<=500){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=500){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	case 'SP':
	switch($row_data_post_A['type_category']){
	case 'ให้เช่า':
	if($price<=1500){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=1500){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	case 'L':	
	echo number_format( $price );	
	break;
	
	case 'LC':	
	echo number_format( $price );	
	break;
	
	case 'BF':
	switch($row_data_post_A['type_category']){
	case 'ให้เช่า':	
	if($price<=2000){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=2000){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	
	
	default:
	switch($row_data_post_A['type_category']){
	case 'ให้เช่า':	
	echo number_format( $price ).' /เดือน';
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	}
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
                    <?php }} while ($row_data_post_A = mysqli_fetch_array($data_post_A, MYSQLI_ASSOC)); ?>

                </div>
            </div>

            <!-- tab2 คอนโด-->
            <div class="tab-pane fade" id="nav-condo" role="tabpanel" aria-labelledby="nav-profile-tab">

                <div class="row">

                    <!-- start info -->

                    <?php do{if(!empty($row_data_post_C['title'])){ ?>
                    <div class="col-md-6 col-lg-4 roboto_font" style="padding-top:10px;">
                        <div class="border rounded-lg shadow">
                            <?php 
switch($row_data_post_C['type_category_code']){
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
$files = glob("images/property/".$row_data_post_C['img_folder']."/*.jpg");
$num_img = $files[0];
if(!empty($num_img)){
echo '<img src="'.$num_img.'"  alt="'.$row_data_post_C['title'].'" class="pic_row" itemprop="image">';}else{
echo '<img src="images/not-available.jpg" class="pic_row" itemprop="image">';
}
?>
                                </div>

                            </div>

                            <div class="p-2 bg-white font14">
                                <i class="fa fa-share text-success" aria-hidden="true"></i> <span><a href="<?php

$title_cut =trim($row_data_post_C['title']);
$title = preg_replace('/([\- \/\'\.\*\,\/\(\)]{1,10})/','-',$title_cut);

echo 'real-estate/'.$title.'-'.$row_data_post_C['code_property'];?>" itemprop="url" class=" text-dark stretched-link"
                                        title="<?php echo $row_data_post_C['title']; ?>">
                                        <?php echo $row_data_post_C['title']; ?></a></span>
                                <br>

                                <span class="">
                                    <i class="fa fa-home text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_C['type_property']; ?>
                                    <br>
                                    <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_C['province_name'].',&nbsp;';  echo  preg_replace("/[\(\)\.\*]/", "", $row_data_post_C['amphur_name']); ?>
                                    <br>


                                    <?php  switch($row_data_post_C['type_property_code']){ 
        case 'FW': 
		break;
		case 'L': 
		break;
        default:
?>
                                    <i class="fas fa-bed text-success"></i> <?php if(!empty($row_data_post_C['beds'])){
		echo $row_data_post_C['beds'];
		}else{echo '-';} ?> ห้องนอน
                                    <i class="fas fa-shower text-success"></i> <?php if(!empty($row_data_post_C['baths'])){
		echo $row_data_post_C['baths'];
		}else{echo '-';} ?> ห้องน้ำ
                                    <i class="fas fa-car text-success"></i> <?php if(!empty($row_data_post_C['parking'])){
		echo $row_data_post_C['parking'];
		}else{echo '-';} ?> ที่จอดรถ
                                    <br>
                                    <?php } ?>

                                    <i class="far fa-square text_p_info text-success"></i>
                                    <?php if(!empty($row_data_post_C['rai'])){echo number_format($row_data_post_C['rai']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'rai';}else{echo ' ไร่';} ?>
                                    |
                                    <?php if(!empty($row_data_post_C['sqw'])){echo number_format($row_data_post_C['sqw']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqw';}else{echo ' ตรว.';} ?>
                                    |
                                    <?php 
$sqm =preg_replace("/[\"\'\.\*\,\/\-]/", "", trim($row_data_post_C['sqm']));
if(!empty($row_data_post_C['sqm'])){echo number_format($sqm);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqm';}else{echo ' ตร.ม.';} ?>


                                </span>

                                <div class="border-top">
                                    <div class="d-flex">
                                        <span
                                            class="p-1 align-self-center text-secondary font14"><?php echo $row_data_post_C['type_category'].$row_data_post_C['type_property']; ?>พฤกษา</span>
                                        <div class="ml-auto p-1 align-self-center font18 text-red">
                                            <font class="font14">฿</font><?php

$price =str_replace(',', '', $price =str_replace('.', '', trim($row_data_post_C['price'])));

if(isset($price)){
	
	if($row_data_post_C['price']){
	switch($row_data_post_C['type_property_code']){
	case 'FW':
	switch($row_data_post_C['type_category']){
	case 'ให้เช่า':
	if($price<=500){
	echo number_format( $price ).' /ตร.ม.';
	}else{
	if($price>=500){
	   $sum_price=$price;
	if($sum_price<=2000000){
		echo number_format( $price ).' /เดือน';
	}else{
	    echo number_format( $price );}	
	}}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;

	
	case 'SP':
	switch($row_data_post_C['type_category']){
	case 'ให้เช่า':
	if($price<=1500){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=1500){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	case 'L':	
	echo number_format( $price );	
	break;
	
	case 'LC':	
	echo number_format( $price );	
	break;
	
	case 'BF':
	switch($row_data_post_C['type_category']){
	case 'ให้เช่า':	
	if($price<=2000){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=2000){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	
	
	default:
	switch($row_data_post_C['type_category']){
	case 'ให้เช่า':	
	echo number_format( $price ).' /เดือน';
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	}
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
                    <?php }} while ($row_data_post_C = mysqli_fetch_array($data_post_C, MYSQLI_ASSOC)); ?>

                </div>

            </div>

            <!-- tab3 บ้านเดี่ยว-->
            <div class="tab-pane fade" id="nav-house" role="tabpanel" aria-labelledby="nav-contact-tab">

                <div class="row">

                    <!-- start info -->
                    <?php do{if(!empty($row_data_post_H['title'])){ ?>
                    <div class="col-md-6 col-lg-4 roboto_font" style="padding-top:10px;">
                        <div class="border rounded-lg shadow">
                            <?php 
switch($row_data_post_H['type_category_code']){
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
$files = glob("images/property/".$row_data_post_H['img_folder']."/*.jpg");
$num_img = $files[0];
if(!empty($num_img)){
echo '<img src="'.$num_img.'"  alt="'.$row_data_post_H['title'].'" class="pic_row" itemprop="image">';}else{
echo '<img src="images/not-available.jpg" class="pic_row" itemprop="image">';
}
?>

                                </div>

                            </div>

                            <div class="p-2 bg-white font14">
                                <i class="fa fa-share text-success" aria-hidden="true"></i> <span><a href="<?php

$title_cut =trim($row_data_post_H['title']);
$title = preg_replace('/([\- \/\'\.\*\,\/\(\)]{1,10})/','-',$title_cut);

echo 'real-estate/'.$title.'-'.$row_data_post_H['code_property'];?>" itemprop="url" class=" text-dark stretched-link"
                                        title="<?php echo $row_data_post_H['title']; ?>">
                                        <?php echo $row_data_post_H['title']; ?></a></span>
                                <br>

                                <span class="">
                                    <i class="fa fa-home text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_H['type_property']; ?>
                                    <br>
                                    <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_H['province_name'].',&nbsp;';  echo  preg_replace("/[\(\)\.\*]/", "", $row_data_post_H['amphur_name']); ?>
                                    <br>


                                    <?php  switch($row_data_post_H['type_property_code']){ 
        case 'FW': 
		break;
		case 'L': 
		break;
        default:
?>
                                    <i class="fas fa-bed text-success"></i> <?php if(!empty($row_data_post_H['beds'])){
		echo $row_data_post_H['beds'];
		}else{echo '-';} ?> ห้องนอน
                                    <i class="fas fa-shower text-success"></i> <?php if(!empty($row_data_post_H['baths'])){
		echo $row_data_post_H['baths'];
		}else{echo '-';} ?> ห้องน้ำ
                                    <i class="fas fa-car text-success"></i> <?php if(!empty($row_data_post_H['parking'])){
		echo $row_data_post_H['parking'];
		}else{echo '-';} ?> ที่จอดรถ
                                    <br>
                                    <?php } ?>

                                    <i class="far fa-square text_p_info text-success"></i>
                                    <?php if(!empty($row_data_post_H['rai'])){echo number_format($row_data_post_H['rai']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'rai';}else{echo ' ไร่';} ?>
                                    |
                                    <?php if(!empty($row_data_post_H['sqw'])){echo number_format($row_data_post_H['sqw']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqw';}else{echo ' ตรว.';} ?>
                                    |
                                    <?php 
$sqm =preg_replace("/[\"\'\.\*\,\/\-]/", "", trim($row_data_post_H['sqm']));
if(!empty($row_data_post_H['sqm'])){echo number_format($sqm);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqm';}else{echo ' ตร.ม.';} ?>


                                </span>

                                <div class="border-top">
                                    <div class="d-flex">
                                        <span
                                            class="p-1 align-self-center text-secondary font14"><?php echo $row_data_post_H['type_category'].$row_data_post_H['type_property']; ?>พฤกษา</span>
                                        <div class="ml-auto p-1 align-self-center font18 text-red">
                                            <font class="font14">฿</font><?php

$price =str_replace(',', '', $price =str_replace('.', '', trim($row_data_post_H['price'])));

if(isset($price)){
	
	if($row_data_post_H['price']){
	switch($row_data_post_H['type_property_code']){
	case 'FW':
	switch($row_data_post_H['type_category']){
	case 'ให้เช่า':
	if($price<=500){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=500){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;

	
	case 'SP':
	switch($row_data_post_H['type_category']){
	case 'ให้เช่า':
	if($price<=1500){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=1500){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	case 'L':	
	echo number_format( $price );	
	break;
	
	case 'LC':	
	echo number_format( $price );	
	break;
	
	case 'BF':
	switch($row_data_post_H['type_category']){
	case 'ให้เช่า':	
	if($price<=2000){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=2000){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	
	
	default:
	switch($row_data_post_H['type_category']){
	case 'ให้เช่า':	
	echo number_format( $price ).' /เดือน';
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	}
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
                    <?php }} while ($row_data_post_H = mysqli_fetch_array($data_post_H, MYSQLI_ASSOC)); ?>

                </div>

            </div>


            <div class="tab-pane fade" id="nav-townhouse" role="tabpanel" aria-labelledby="nav-contact-tab">

                <div class="row">

                    <!-- start info -->
                    <?php do{if(!empty($row_data_post_T['title'])){ ?>
                    <div class="col-md-6 col-lg-4 roboto_font" style="padding-top:10px;">
                        <div class="border rounded-lg shadow">
                            <?php 
switch($row_data_post_T['type_category_code']){
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
$files = glob("images/property/".$row_data_post_T['img_folder']."/*.jpg");
$num_img = $files[0];
if(!empty($num_img)){
echo '<img src="'.$num_img.'"  alt="'.$row_data_post_T['title'].'" class="pic_row" itemprop="image">';}else{
echo '<img src="images/not-available.jpg" class="pic_row" itemprop="image">';
}
?>

                                </div>

                            </div>

                            <div class="p-2 bg-white font14">
                                <i class="fa fa-share text-success" aria-hidden="true"></i> <span><a href="<?php

$title_cut =trim($row_data_post_T['title']);
$title = preg_replace('/([\- \/\'\.\*\,\/\(\)]{1,10})/','-',$title_cut);

echo 'real-estate/'.$title.'-'.$row_data_post_T['code_property'];?>" itemprop="url" class=" text-dark stretched-link"
                                        title="<?php echo $row_data_post_T['title']; ?>">
                                        <?php echo $row_data_post_T['title']; ?></a></span>
                                <br>

                                <span class="">
                                    <i class="fa fa-home text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_T['type_property']; ?>
                                    <br>
                                    <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                                    <?php echo $row_data_post_T['province_name'].',&nbsp;';  echo  preg_replace("/[\(\)\.\*]/", "", $row_data_post_T['amphur_name']); ?>
                                    <br>


                                    <?php  switch($row_data_post_T['type_property_code']){ 
        case 'FW': 
		break;
		case 'L': 
		break;
        default:
?>
                                    <i class="fas fa-bed text-success"></i> <?php if(!empty($row_data_post_T['beds'])){
		echo $row_data_post_T['beds'];
		}else{echo '-';} ?> ห้องนอน
                                    <i class="fas fa-shower text-success"></i> <?php if(!empty($row_data_post_T['baths'])){
		echo $row_data_post_T['baths'];
		}else{echo '-';} ?> ห้องน้ำ
                                    <i class="fas fa-car text-success"></i> <?php if(!empty($row_data_post_T['parking'])){
		echo $row_data_post_T['parking'];
		}else{echo '-';} ?> ที่จอดรถ
                                    <br>
                                    <?php } ?>

                                    <i class="far fa-square text_p_info text-success"></i>
                                    <?php if(!empty($row_data_post_T['rai'])){echo number_format($row_data_post_T['rai']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'rai';}else{echo ' ไร่';} ?>
                                    |
                                    <?php if(!empty($row_data_post_T['sqw'])){echo number_format($row_data_post_T['sqw']);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqw';}else{echo ' ตรว.';} ?>
                                    |
                                    <?php 
$sqm =preg_replace("/[\"\'\.\*\,\/\-]/", "", trim($row_data_post_T['sqm']));
if(!empty($row_data_post_T['sqm'])){echo number_format($sqm);}else{echo'-';} ?>
                                    <?php if(!empty($language)){echo 'sqm';}else{echo ' ตร.ม.';} ?>


                                </span>

                                <div class="border-top">
                                    <div class="d-flex">
                                        <span
                                            class="p-1 align-self-center text-secondary font14"><?php echo $row_data_post_T['type_category'].$row_data_post_T['type_property']; ?>พฤกษา</span>
                                        <div class="ml-auto p-1 align-self-center font18 text-red">
                                            <font class="font14">฿</font><?php

$price =str_replace(',', '', $price =str_replace('.', '', trim($row_data_post_T['price'])));

if(isset($price)){
	
	if($row_data_post_T['price']){
	switch($row_data_post_T['type_property_code']){
	case 'FW':
	switch($row_data_post_T['type_category']){
	case 'ให้เช่า':
	if($price<=500){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=500){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;

	
	case 'SP':
	switch($row_data_post_T['type_category']){
	case 'ให้เช่า':
	if($price<=1500){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=1500){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	case 'L':	
	echo number_format( $price );	
	break;
	
	case 'LC':	
	echo number_format( $price );	
	break;
	
	case 'BF':
	switch($row_data_post_T['type_category']){
	case 'ให้เช่า':	
	if($price<=2000){
	echo number_format( $price ).' /ตร.ม.';
	}
	if($price>=2000){
	echo number_format( $price ).' /เดือน';
	}
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	
	}
	break;
	
	
	
	
	default:
	switch($row_data_post_T['type_category']){
	case 'ให้เช่า':	
	echo number_format( $price ).' /เดือน';
	break;
	case 'ขาย':	
	echo number_format( $price );
	break;	
	case 'เซ้ง':	
	echo number_format( $price );
	break;
	}
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
                    <?php }} while ($row_data_post_T = mysqli_fetch_array($data_post_T, MYSQLI_ASSOC)); ?>

                </div>

            </div>



        </div>
    </div>
</div>
</div>
<!--end พฤกษา -->