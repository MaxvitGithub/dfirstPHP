<?php

include_once('db/con_site_bar.php');



$query_data_post = "SELECT * FROM post_property WHERE hot_sale='yes' ORDER BY RAND() LIMIT 0,12";

$data_post = mysqli_query($con, $query_data_post) or die(mysqli_error());

$row_data_post = mysqli_fetch_array($data_post, MYSQLI_ASSOC);

$totalRows_data_post = mysqli_num_rows($data_post);



$dirname = "images/property/".$row_data_post['img_folder'].'/';

$num_img_2 = "images/property/".$row_data_post['img_folder'].'/'.$row_data_post['img_folder'].'.jpg';

$language='';

?>

<!DOCTYPE html>

<html lang="th">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include_once('seo/GoogleTagHead.php'); ?>

    <title><?php echo $title_seo='Dfirst Property เว็บไชต์อสังหาริมทรัพย์'; ?></title>



    <meta name="description"

        content="<?php echo $detail= 'รวมประกาศอสังหาริมทรัพย์ เช่น ซื้อขาย บ้าน บ้านเดี่ยว คอนโด คอนโดมิเนียม โรงงาน โกดัง  คลังสินค้า โครงการพฤกษา โครงการใหม่ ทาวน์เฮ้าส์ อาคารพานิชย์ สำนักงาน ออฟฟิศ พร้อมให้คำปรึกษาเกี่ยวอสังหาริมทรัพย์'; ?>" />

    <?php include_once('layout/meta_all.php'); ?>

    <?php include_once('layout/dns.php'); ?>

    <script type='application/ld+json'>
    {
        "@context": "https://schema.org",
        "@graph": [{
            "@type": "WebPage",
            "@id": "<?php echo htmlspecialchars($url_meta, ENT_QUOTES, 'UTF-8'); ?>#webpage",
            "url": "<?php echo htmlspecialchars($url_meta, ENT_QUOTES, 'UTF-8'); ?>",
            "inLanguage": "th",
            "name": "Dfirst Property เว็บไชต์อสังหาริมทรัพย์",
            "description": "<?php echo htmlspecialchars($detail, ENT_QUOTES, 'UTF-8'); ?>",
            "publisher": {
                "@type": "Organization",
                "name": "DFirst Property"
            }
        }]
    }
    </script>

 

</head>



<body>

    <?php include_once('seo/GoogleTagBody.php'); ?>

    <?php include_once('layout/in_css.php'); ?>





    <?php include_once('layout/menu_top.php'); ?>



    <!-- Strat container -->

    <div class="show_700">

        <di>

            <br>

            <br>

            <br>

            <br>



            <?php include_once('layout/index_home/search.php'); ?>





            <div class="bg-light">

                <hr class="m-0 show_700" />

                <br class="show_700">

                <div class="show_bottom">

                    <br>

                    <br>

                    <br>

                    <br>



                </div>



                <?php include_once('layout/index_home/property_sell_rent.php') ?>



                <?php include_once('layout/index_home/property_new.php') ?>



                

                <br>

            </div>

            

  <div class="jumbotron border border-success container">

  <h2 class="display-4 text-success" style="font-size: 24px;">ประเภทอสังหาฯ และ รับจำนอง ขายฝาก</h2>

  <hr class="my-2">

  <p class="lead" style="font-size: 18px;"> ในกรุงเทพปริมณฑล และ ต่างจังหวัดสามารถสอบถามได้ โดยทีมงาน มืออาชีพ</p>

  <p style="font-size: 18px;">พร้อมให้ข้อมูลที่ค้นหา ตอบโจทย์ความต้องการของลูกค้าได้ เรายินดีให้บริการ</p>  

</div>



    </div>





    <div onclick="topFunction()" id="myBtn" class="bg-success show_700">

        <i class="fas fa-angle-up show_700"></i>

    </div>



    <?php 

include_once('layout/index_home/fix_bottom.php');

include_once('menu.php');

echo $footer;  



include_once('layout/js_footer.php');

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