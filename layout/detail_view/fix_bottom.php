<div>
<div class="fixed-bottom shadow-sm border-top show_bottom hight-menu bg-light roboto_font" style="height: 55px;" >
<div align="center" class="h_show_bottom container-lg-lg p-0" >
<div class="row ">
<a href="https://www.dfirstproperty.com/<?php echo $property_code.'-'.$seo_category.'/'.$seo_p; ?>" class="b_link col p-0">
<div class="p-0" style="margin-top: 6px;">
<i class="fa fa-pager font18 text-success"></i>
<p class="font12 text-dark" style="margin-top: -4px;" >หน้าแรก</p>
</div>
</a>

<a href="tel:0815823485" class="b_link col p-0" >
<div class="p-0" style="margin-top: 6px;">
<i class="fa fa-phone font18 text-danger pulse" aria-hidden="true"></i>
<p class="font12 text-dark" style="margin-top: -4px;">โทรด่วน</p>
</div>
</a>

<a href="http://line.me/ti/p/~0971823805" class="b_link col p-0">
<div class="p-0" style="margin-top: 6px;">
<i class="fab fa-line font18 text-success"></i>
<p class="font12 text-dark" style="margin-top: -4px;">ส่งไลน์</p>
</div>
</a>


<a href="#" class="b_link col p-0" data-toggle="modal" data-target="#myModal">
<div class="p-0" style="margin-top: 6px;">
<i class="fa fa-search font18 text-success" aria-hidden="true"></i>
<p class="font12 text-dark" style="margin-top: -4px;">ค้นหา</p>
</div>
</a>


</div>
</div>
</div>




<!-- The Modal -->
  <div class="modal fade" role="dialog" aria-hidden="true"  id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="/real-estate" method="get">
        <!-- Modal Header -->
        <div class="modal-header">
          <p class="modal-title text-success">ค้นหาแบบละเอียด ( เลือกข้อมูลตามที่ต้องการ )</p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <div align="center" class="modal-body form-row">
         

    
    
<div class="col-8">
<select class="form-control font14 mb-2" name="type_property_code">

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
    </div>

    <div class="col-4">
       <select class="form-control font14 mb-2" name="type_category_code">
    
      <option value="R">ให้เช่า</option>
       <option value="S">ขาย</option>            
        <option value="LC">เซ้ง</option>
    </select>
    </div>
   
 <?php


  
  if($row_data_post['type_property_code'] == 'FW'){
		echo '
		<div class="col-6">
       <select class="form-control font14 mb-2" name="min_sqm">
      <option value="1">พื้นที่ต่ำสุด (ตร.ม.)</option>
      <option value="1">0</option>
      <option value="500">500</option>       
      <option value="1000">1,000</option>
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
    <div class="col-6">
       <select class="form-control font14 mb-2" name="max_sqm">
     <option value="1000000">พื้นที่สูงสุด (ตร.ม.)</option>
      <option value="500">500</option>       
      <option value="1000">1,000</option>
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
  if($row_data_post['type_property_code'] == 'H' || $row_data_post['type_property_code'] == 'T' || $row_data_post['type_property_code'] == 'C'){
		echo '
		<div class="col-6">
       <select class="form-control font14 mb-2" name="beds">
      <option value="">ห้องนอน</option>
      <option value="1">1</option>
      <option value="2">2</option>       
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6+">6+</option>
    </select>
    </div>
    <div class="col-6">
       <select class="form-control font14 mb-2" name="baths">
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
                 
  <div class="col-12">
       <select class="form-control font14 mb-2" name="province" id="province-typeM">
  <?php 
  include('db/con_site_bar.php');

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
    </div>
    
    <div class="col-12">
    <select class="form-control font14 mb-2" name="amphur" id="amphur-typeM">   

    <option value="0">ทุกอำเภอ/เขต</option>
    
    </select>
    
    </div>
    
     <div class="col-6">
       <select class="form-control font14 mb-2" name="minprice">
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
    
      <div class="col-6">
       <select class="form-control font14 mb-2" name="maxprice">
      <option value="1000000000">ราคาสูงสุด</option>
       <option value="1000">1,000</option>
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
         
    </div>
        
        
        <!-- Modal footer -->
        
          <div class="col-auto p-2">
     <button type="submit" class="form-control rounded-0 font-12 btn-success form-h" >
     <i class="fa fa-search font16" aria-hidden="true"></i> ค้นหา </button>
     </div>
        
        </form>
        
      </div>
    </div>
  </div>
</div>
<!-- END fix bottom -->