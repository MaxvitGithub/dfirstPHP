<br>
<h3 align="left" class="text-success roboto_font font24 container-lg">อสังหาริมทรัพย์แนะนำ </h3>

<hr class="m-0 border-success">
<div class="bg-light">
    <div class="container-lg">

        <div class="row">

            <?php do{ if(!empty($row_data_post['title'])){ ?>
            <!-- strat -->
            <div class="col-md-6 col-lg-4 roboto_font" style="padding-top:10px;">
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
                    <div>

                        <div align="center" style="background-image: linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%);"
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
    <img src="https://www.images.dfirstproperty.com/'.$num_img.'" class="img_info"  alt="'.$row_data_post['title'].'"   itemprop="image"></a>';
    }else{
    echo '<img src="//www.images.dfirstproperty.com/not-available.jpg" class="img_info">';
    }
?>

                        </div>

                    </div>

                    <div class="p-2 bg-white font14">
                        <i class="fa fa-share text-success" aria-hidden="true"></i> <span><a href="<?php

$title_cut = trim($row_data_post['title']) . '-' . $row_data_post['code_property'];                  
$title = preg_replace('/[\'\"\.\*\:\!\@\#\$\%\&\(\)\+\/]{1,10}+/', ' ', $title_cut);
$title_url = preg_replace('/[\,]/', '', trim($title)); 
$title_url = preg_replace('/–/', '-', $title_url);  
$title_url = preg_replace("/[\ \-]+/", "-", $title_url);
echo 'https://www.dfirstproperty.com/real-estate/' . $title_url; ?>" itemprop="url" class=" text-dark stretched-link"
                                title="<?php echo $row_data_post['title']; ?>">
                                <?php echo $row_data_post['title']; ?></a></span>
                        <br>

                        <span class="">
                            <i class="fa fa-home text-success" aria-hidden="true"></i>
                            <?php echo $row_data_post['type_property']; ?>
                            <br>
                            <i class="fa fa-map-marker text-success" aria-hidden="true"></i>
                            <?php echo $row_data_post['province_name'].',&nbsp;';  echo  preg_replace("/[\(\)\.\*]/", "", $row_data_post['amphur_name']); ?>
                            <br>


                            <?php  switch($row_data_post['type_property_code']){ 
        case 'FW': 
		break;
		case 'L': 
		break;
        default:
?>
                            <i class="fas fa-bed text-success"></i> <?php if(!empty($row_data_post['beds'])){
		echo $row_data_post['beds'];
		}else{echo '-';} ?> ห้องนอน
                            <i class="fas fa-shower text-success"></i> <?php if(!empty($row_data_post['baths'])){
		echo $row_data_post['baths'];
		}else{echo '-';} ?> ห้องน้ำ
                            <i class="fas fa-car text-success"></i> <?php if(!empty($row_data_post['parking'])){
		echo $row_data_post['parking'];
		}else{echo '-';} ?> ที่จอดรถ
                            <br>
                            <?php } ?>

                            <i class="far fa-square text_p_info text-success"></i>
                            <?php if(!empty($row_data_post['rai'])){echo number_format($row_data_post['rai']);}else{echo'-';} ?>
                            <?php if(!empty($language)){echo 'rai';}else{echo ' ไร่';} ?>
                            |
                            <?php if(!empty($row_data_post['sqw'])){echo number_format($row_data_post['sqw']);}else{echo'-';} ?>
                            <?php if(!empty($language)){echo 'sqw';}else{echo ' ตรว.';} ?>
                            |
                            <?php 
$sqm =preg_replace("/[\"\'\.\*\,\/\-]/", "", trim($row_data_post['sqm']));
if(!empty($row_data_post['sqm'])){echo number_format($sqm);}else{echo'-';} ?>
                            <?php if(!empty($language)){echo 'sqm';}else{echo ' ตร.ม.';} ?>


                        </span>

                        <div class="border-top">
                            <div class="d-flex">
                                <span
                                    class="p-1 align-self-center text-secondary font14"><?php echo $row_data_post['type_category'].$row_data_post['type_property']; ?></span>
                                <div class="ml-auto p-1 align-self-center font18 text-red">
                                    <font class="font14">฿</font><?php


$price = preg_replace('/[\'",.*()]/', '', trim($row_data_post['price']));

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
            <?php }} while ($row_data_post = mysqli_fetch_array($data_post, MYSQLI_ASSOC)); ?>


        </div>
    </div>