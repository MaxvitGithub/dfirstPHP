<div class="container-lg p-1">

    <div class="d-flex justify-content-center">

        <form action="/real-estate" method="get">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <select class="form-control rounded-0 font14 form-h" name="type_property_code">
                
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
                    <select style="width:140px;" class="form-control rounded-0 font14 form-h" name="type_category_code">

                                        <option value="R"> ให้เช่า </option>
                                        <option value="S"> ขาย </option>
                                        <option value="LC"> เซ้ง </option>
                                        
                    </select>
                </li>

                <li class="nav-item">
                    <select class="form-control rounded-0 font14 form-h" id="province-type" name="province">

                        <?php include_once('db/con_site_bar.php'); ?>
<?php
 echo '<option value="0">ทุกจังหวัด</option>';

 $sqlprovin = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
 $resultprovin = $mysqli->query($sqlprovin);
 if ($resultprovin->num_rows > 0) {

     // Output data of each row
     while ($rowprovin = $resultprovin->fetch_assoc()) {

         echo '<option value="' . $rowprovin['PROVINCE_ID'] . '"> ' . $rowprovin['PROVINCE_NAME'] . ' </option>';

     }
 }

?>    </select>
                </li>
                <li class="nav-item">
                    <select class="form-control rounded-0 font14 form-h" name="amphur" id="amphur-type">

                        <option value="0">ทุกเขต/ทุกอำเภอ</option>

                    </select><span id="waitAmphur"></span>
                </li>

                <li class="nav-item">

                    <a class="form-control rounded-0 font14 form-h nav-link" id="pills-home-tab" data-toggle="pill"
                        href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">ข้อมูลเพิ่มเติม <i
                            class="fa fa-caret-down" aria-hidden="true"></i></a>

                </li>
                <li class="nav-item">

                    <button type="submit" class="form-control rounded-0 font14 btn-success form-h" /> ค้นหา </button>

                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div align="center" class="card rounded-0">
                        <div class="card-body d-flex justify-content-center bg-primary">
                            <div class="form-row">
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
                                <div class="col-auto p-0 div-form">
                                    <button type="submit"
                                        class="form-control rounded-0 font-12 btn-light border form-h" /> <i
                                        class="fa fa-search" aria-hidden="true"></i> </button>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </form>


    </div>

</div>
</div>
<!--END search -->