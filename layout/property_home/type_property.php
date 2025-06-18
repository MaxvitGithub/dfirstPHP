<?php if(empty($_GET['pa_code'])){$pa_code=$url_property; $pa_code2="";}else{$pa_code=$_GET['pa_code']; $pa_code2=$_GET['pa_code'];}

if($property_code == 'FW'){
?>

<div class="jumbotron border border-success">
    <header>
        <h2 class="display-4 text-success" ><?php echo $url_property.$url_category.' '.$pa_code2; ?></h2>
        <p>รองรับทุกธุรกิจ คลังสินค้าให้เช่าทั่วไทย เช่าง่าย ราคาถูก</p>
        <hr class="my-2">
    </header>    
    <section>
        <h2>ทำไมต้องเช่าโกดัง-โรงงาน?</h2>
        <ul>
            <li><strong>ลดต้นทุน</strong> – ไม่ต้องลงทุนสร้างเอง ประหยัดค่าใช้จ่าย</li>
            <li><strong>พร้อมใช้งาน</strong> – มีระบบสาธารณูปโภคครบ เช่น ไฟฟ้า ประปา ถนนคอนกรีต</li>
            <li><strong>ยืดหยุ่น</strong> – เลือกขนาดและระยะเวลาการเช่าได้ตามต้องการ</li>
            <li><strong>ทำเลดี</strong> – ใกล้แหล่งขนส่ง ทางด่วน รถไฟฟ้า หรือท่าเรือ</li>
        </ul>
    </section>    
    <section>
        <h2>ทำเลที่ดีที่สุดสำหรับโกดัง-โรงงานให้เช่า</h2>
        <h3>🔹 <?php echo $url_property.$url_category.' '.$pa_code2; ?></h3>
        <p>ทำเลใกล้ถนนหลัก เช่น <?php echo $pa_code; ?></p>
        <h3>🔹 โกดังให้เช่าในโซนอีอีซี (EEC)</h3>
        <p>เหมาะสำหรับธุรกิจที่ต้องการขยายการผลิต ใกล้นิคมอุตสาหกรรม</p>
        <h3>🔹 โกดังให้เช่าใกล้สนามบินและท่าเรือ</h3>
        <p>เหมาะสำหรับธุรกิจนำเข้า-ส่งออก รองรับโลจิสติกส์</p>
    </section>    
    <section>
        <h2>เช็คก่อนเช่าโกดัง-โรงงาน ควรดูอะไรบ้าง?</h2>
        <ul>
            <li>ขนาดพื้นที่เพียงพอหรือไม่?</li>
            <li>รับน้ำหนักพื้นได้ตามต้องการหรือไม่?</li>
            <li>มีที่จอดรถเพียงพอหรือไม่?</li>
            <li>ระบบไฟฟ้า 3 เฟส หรือไม่?</li>
            <li>ความสูงหลังคา รองรับเครื่องจักรได้หรือไม่?</li>
        </ul>
    </section>
</div>

<?php }else{ ?>

<div class="jumbotron border border-success">

  <h3 class="display-4 text-success" style="font-size: 22px;">ประเภทอสังหาฯ <?php echo $url_property.$url_category.' '.$pa_code2; ?></h3>

  <hr class="my-2">

  <p class="lead" style="font-size: 16px;"><?php echo $url_property.$url_category.' '.$pa_code2; ?> คือ เป็นอสังหาริมทรัพย์สำหรับ<?php echo $url_category; ?> จะอยู่ในพื้นที่<?php echo $pa_code; ?> รวมไปถึงบริเวณใกล้เคียง</p>

  <p style="font-size: 16px;">พร้อมให้ข้อมูลที่ค้นหา ตอบโจทย์ความต้องการของลูกค้าได้ เรายินดีให้บริการ</p>  

</div>

<?php
}
?>