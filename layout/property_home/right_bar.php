<!-- ด้านข้าง -->

<?php   

  switch($pa_code.$title_pp){ 

  case $pa_code.'กรุงเทพมหานคร': 

    $c_sticky='1';  

    break;

  case 'กรุงเทพมหานคร': 

    $c_sticky='1';  

    break;

  default:

  $c_sticky='';  

} 

if(!empty($c_sticky)){

  $style_sticky= 'style="padding-top: 11px;"';

  

}else{

  $style_sticky= 'class="sticky"';

}

?>

<div class="col-lg-4 ">

  <div <?php echo $style_sticky; ?> >

  <div class="bg-white shadow " >

  <div class="container p-3">

  <h2 class="font20 text-success"><i class="fa fa-location-arrow" aria-hidden="true"></i>ค้นหา พื้นที่ ทำเล ใกล้เคียง</h2>

<div class="font16"> 

<?php

include('db/con_site_bar.php');

$url_property=$_GET['type_property_code'];

$url_category=$_GET['type_category_code'];

if(!empty($_GET['pa_code'])){$province=$_GET['pa_code'];}

if(!empty($province)){

//check // province_name

$sql = "SELECT * FROM post_property WHERE  type_property_code='$property_code' AND type_category_code='$category_code' AND province_name LIKE '%$province%'";

$result = mysqli_query($con, $sql);

$row_province = mysqli_fetch_array($result, MYSQLI_ASSOC);



if(!empty($row_province['province_id'])){

	$province_id=$row_province['province_id'];

//check // province_name GROUP amphur_id

$result = mysqli_query($con, "SELECT * FROM post_property WHERE type_property_code='$property_code' AND type_category_code='$category_code' AND province_id='$province_id'  GROUP BY amphur_id");

$row_province = mysqli_fetch_array($result, MYSQLI_ASSOC);

$home_province=$row_province['amphur_name'];



echo '<span><a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.$home_province.'" class="text-dark" title="'.$url_property.$url_category.' '.$home_province.'">'.$url_property.$url_category.' '.$home_province.'</a></span><br>';

while($row_province = mysqli_fetch_array($result)){

$amphur_name2 = preg_replace("/[\*]/", "", trim($row_province['amphur_name']));

if($amphur_name2 == 'ลำลูกกา(สาขาตำบลคูคต)'){

  $amphur_name2 = 'คูคต';

}


echo '<span><a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.$amphur_name2.'" class="text-dark" 

title="'.$url_property.''.$url_category.' '.$row_province['amphur_name'].'">'.$url_property.$url_category.' '.$row_province['amphur_name'].'</a></span><br>';

}

}else{

///end province_name 	

$result = mysqli_query($con, "SELECT * FROM post_property WHERE type_property_code='$property_code' AND type_category_code='$category_code' AND amphur_name LIKE '%$province%'");

$row_amphur = mysqli_fetch_array($result, MYSQLI_ASSOC);



if(!empty($row_amphur['province_id'])){

  $province_name=$row_amphur['province_id'];

}


if(!empty($province_name)){

$result = mysqli_query($con, "SELECT * FROM post_property WHERE type_property_code='$property_code' AND type_category_code='$category_code' AND province_id ='$province_name' GROUP BY amphur_id");


$row_amphur = mysqli_fetch_array($result, MYSQLI_ASSOC);	

$home_province=$row_amphur['province_name'];

    echo '<a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.$home_province.'" class="text-dark" ><span>'.$url_property.$url_category.' '.$home_province.'</span></a><br>';

	while($row_amphur = mysqli_fetch_array($result, MYSQLI_ASSOC)){

    $amphur_name3 = preg_replace("/[\*]/", "", trim($row_amphur['amphur_name']));
    if($amphur_name3 == 'ลำลูกกา(สาขาตำบลคูคต)'){

      $amphur_name3 = 'คูคต';
    
    }

    echo '<a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.$amphur_name3.'" class="text-dark" title="'.$row_amphur['amphur_name'].'"><span>'.$url_property.$url_category.' '.str_replace('*', '', $row_amphur['amphur_name']).'</span></a><br>'; }

}else{

  ///end  $_GET['pa_code']

  

  $result = mysqli_query($con, "SELECT * FROM post_property WHERE type_property_code='$property_code' AND type_category_code='$category_code' GROUP BY province_id");

  $row_amphur = mysqli_fetch_array($result, MYSQLI_ASSOC);

  $home_province=$row_amphur['province_name'];

      echo '<a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.$home_province.'" class="text-dark" title="'.$url_property.$url_category.' '.$home_province.'"><span>'.$url_property.$url_category.' '.$home_province.'</span></a><br>';

    while($row_amphur = mysqli_fetch_array($result, MYSQLI_ASSOC)){

      echo '<a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.trim($row_amphur['province_name']).'" class="text-dark" title="'.$url_property.$url_category.' '.$row_amphur['province_name'].'"><span>'.$url_property.$url_category.' '.$row_amphur['province_name'].'</span></a><br>'; }

  

  }



}



}else{

///end  $_GET['pa_code']


$result = mysqli_query($con, "SELECT * FROM post_property WHERE type_property_code='$property_code' AND type_category_code='$category_code' GROUP BY province_id");

$row_amphur = mysqli_fetch_array($result, MYSQLI_ASSOC);

$home_province=$row_amphur['province_name'];

    echo '<a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.$home_province.'" class="text-dark" title="'.$url_property.$url_category.' '.$home_province.'"><span>'.$url_property.$url_category.' '.$home_province.'</span></a><br>';

	while($row_amphur = mysqli_fetch_array($result, MYSQLI_ASSOC)){

	  echo '<a href="https://www.dfirstproperty.com/'.$url_property.'-'.$url_category.'/'.trim($row_amphur['province_name']).'" class="text-dark" title="'.$url_property.$url_category.' '.$row_amphur['province_name'].'"><span>'.$url_property.$url_category.' '.$row_amphur['province_name'].'</span></a><br>'; }



} 

?>

</div>

</div>



<div class="p-2">

  <nav>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">

      <a class="nav-item nav-link font14" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" title="nav-link"><i class="fas fa-angle-double-down"></i></a>

    

    </div>

  </nav>

  <div class="tab-content p-2 bg-white" id="nav-tabContent" style="font-size:12px;">

      <div class="tab-pane fade show bg-white" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <span style="font-size:12px;">

        <?php echo 'เรารวบรวมประกาศ'.$rent.' '.$sibar.' คุณสามารถค้นหา 

        อสังหาริมทรัพย์ ในประเทศไทย พร้อมทั้ง ที่ตั้ง รูปภาพ ราคา เพื่อให้คุณสามารถตัดสินใจเลือกประกาศ'.$rent.$_GET['type_property_code'].' ของคุณได้อย่างมั่นใจ.'; ?>

      </span>

      </div>  

  </div>

</div>



</div>

</div>

</div>