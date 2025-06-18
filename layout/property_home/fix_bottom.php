<div>
  <!-- Fixed Bottom Navigation -->
  <div class="fixed-bottom shadow-sm border-top show_bottom hight-menu bg-light roboto_font" style="height: 55px;">
    <div class="container-lg-lg p-0" align="center">
      <div class="row">
        <a href="https://www.dfirstproperty.com/<?= $_GET['type_property_code'] . '-' . $_GET['type_category_code'] ?>" class="b_link col p-0">
          <div class="p-0" style="margin-top: 6px;">
            <i class="fa fa-pager font18 text-success"></i>
            <p class="font12 text-dark" style="margin-top: -4px;">หน้าแรก</p>
          </div>
        </a>
        <a href="tel:0815823485" class="b_link col p-0">
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
        <a href="#" class="b_link col p-0" data-toggle="modal" data-target="#myModal1">
          <div class="p-0" style="margin-top: 6px;">
            <i class="fa fa-binoculars font18 text-success" aria-hidden="true"></i>
            <p class="font12 text-dark" style="margin-top: -4px;">หมวดอสังหา</p>
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

  <!-- Modal1: หมวดหมู่อสังหาริมทรัพย์ -->
  <div id="myModal1" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <p class="modal-title font16 text-success">หมวดหมู่อสังหาริมทรัพย์</p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="container">
            <?php $type_category_code_ = $_GET['type_category_code'] ?? 'ให้เช่า'; ?>
            <div class="row">
              <div class="col-6 col-md-4 p-1 bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'บ้านเดี่ยว-' . $type_category_code_ ?>" title="<?= 'บ้านเดี่ยว ' . $type_category_code_ ?>">
                  <span class="text-white">บ้านเดี่ยว <?= $type_category_code_ ?></span>
                </a>
              </div>
              <div class="col-6 col-md-4 p-1 bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'ทาวน์เฮ้าส์-' . $type_category_code_ ?>" title="<?= 'ทาวน์เฮ้าส์ ' . $type_category_code_ ?>">
                  <span class="text-white">ทาวน์เฮ้าส์ <?= $type_category_code_ ?></span>
                </a>
              </div>
              <div class="col-6 col-md-4 p-1 shadow bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'คอนโด-' . $type_category_code_ ?>" title="<?= 'คอนโด ' . $type_category_code_ ?>">
                  <span class="text-white">คอนโด <?= $type_category_code_ ?></span>
                </a>
              </div>
              <div class="col-6 col-md-4 p-1 shadow bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'ตึกแถว-อาคารพานิชย์-' . $type_category_code_ ?>" title="<?= 'ตึกแถว-อาคารพานิชย์ ' . $type_category_code_ ?>">
                  <span class="text-white">อาคารพานิชย์ <?= $type_category_code_ ?></span>
                </a>
              </div>
              <div class="col-6 col-md-4 p-1 shadow bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'โกดัง-โรงงาน-' . $type_category_code_ ?>" title="<?= 'โกดัง-โรงงาน ' . $type_category_code_ ?>">
                  <span class="text-white">โกดัง-โรงงาน <?= $type_category_code_ ?></span>
                </a>
              </div>
              <div class="col-6 col-md-4 p-1 shadow bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'สำนักงาน-ออฟฟิศ-' . $type_category_code_ ?>" title="<?= 'สำนักงาน-ออฟฟิศ ' . $type_category_code_ ?>">
                  <span class="text-white">สำนักงาน <?= $type_category_code_ ?></span>
                </a>
              </div>
              <div class="col-6 col-md-4 p-1 shadow bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'ที่ดิน-' . $type_category_code_ ?>" title="<?= 'ที่ดิน ' . $type_category_code_ ?>">
                  <span class="text-white">ที่ดิน <?= $type_category_code_ ?></span>
                </a>
              </div>
              <div class="col-6 col-md-4 p-1 shadow bg-info mb-5 border border-dark">
                <a href="https://www.dfirstproperty.com/<?= 'พื้นที่-' . $type_category_code_ ?>" title="<?= 'พื้นที่ ' . $type_category_code_ ?>">
                  <span class="text-white">พื้นที่ <?= $type_category_code_ ?></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: ค้นหาแบบละเอียด -->
  <div class="modal fade" role="dialog" aria-hidden="true" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="/real-estate" method="get">
          <!-- Modal Header -->
          <div class="modal-header">
            <p class="modal-title text-success">ค้นหาแบบละเอียด ( เลือกข้อมูลตามที่ต้องการ )</p>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body form-row" align="center">
            <div class="col-8">
              <select class="form-control font14 mb-2" name="type_property_code">
                <?php if (!empty($_GET['type_property_code'])): ?>
                  <option value="<?= $property_code ?>">-><?= $_GET['type_property_code'] ?></option>
                <?php else: ?>
                  <option value="">ที่อยู่อาศัย</option>
                <?php endif; ?>
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
                <?php if (!empty($_GET['type_category_code'])): ?>
                  <option value="<?= $category_code ?>">-><?= $_GET['type_category_code'] ?></option>
                <?php endif; ?>
                <option value="ให้เช่า">ให้เช่า</option>
                <option value="ขาย">ขาย</option>
                <option value="เซ้ง">เซ้ง</option>
              </select>
            </div>

            <?php if ($property_code == 'FW'): ?>
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
            <?php elseif (in_array($property_code, ['H', 'T', 'C'])): ?>
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
            <?php endif; ?>

            <div class="col-12">
              <select class="form-control font14 mb-2" name="province" id="province-typeM">
                <?php include('db/con_site_bar.php'); ?>
                <?php
                  if (isset($_GET['pa_code']) && $_GET['pa_code']) {
                    $pa_code = $mysqli->real_escape_string($_GET['pa_code']);
                    $sqlscr = "SELECT * FROM post_property WHERE province_name LIKE '%$pa_code%'";
                    $resultscr = $mysqli->query($sqlscr);
                    if ($resultscr && $resultscr->num_rows > 0) {
                      $rowSCr = $resultscr->fetch_assoc();
                      echo '<option value="'.$rowSCr['province_id'].'">->'.$rowSCr['province_name'].'</option>';
                    }
                    echo '<option value="0">ทุกจังหวัด</option>';
                  } else {
                    echo '<option value="0">ทุกจังหวัด</option>';
                  }
                  $sqlprovin = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
                  $resultprovin = $mysqli->query($sqlprovin);
                  if ($resultprovin && $resultprovin->num_rows > 0) {
                    while ($rowprovin = $resultprovin->fetch_assoc()) {
                      echo '<option value="' . $rowprovin['PROVINCE_ID'] . '"> ' . $rowprovin['PROVINCE_NAME'] . ' </option>';
                    }
                  }
                ?>
              </select>
            </div>

            <div class="col-12">
              <select class="form-control font14 mb-2" name="amphur" id="amphur-typeM">
                <?php
                  if (!empty($rowSCr['province_id'])) {
                    echo '<option value="0">ทุกอำเภอ/เขต</option>';
                    $sqlpro = "SELECT * FROM amphur WHERE PROVINCE_ID = '".$rowSCr['province_id']."'";
                    $resultpro = $mysqli->query($sqlpro);
                    if ($resultpro && $resultpro->num_rows > 0) {
                      while ($rowpro = $resultpro->fetch_assoc()) {
                        $ampur_name = preg_replace('/[\,\*\(\)]/', '', $rowpro['AMPHUR_NAME']);
                        echo '<option value="' . $rowpro['AMPHUR_ID'] . '"> ' . $ampur_name . ' </option>';
                      }
                    }
                  } else {
                    echo '<option value="0">ทุกอำเภอ/เขต</option>';
                  }
                ?>
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

          <!-- Modal Footer -->
          <div class="col-auto p-2">
            <button type="submit" class="form-control rounded-0 font-12 btn-success form-h">
              <i class="fa fa-search font16" aria-hidden="true"></i> ค้นหา
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
