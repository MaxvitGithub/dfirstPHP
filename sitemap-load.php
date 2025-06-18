<?php 

include_once('db/con_site_bar.php');

header("Content-type: text/xml; charset=UTF-8");

echo '<?xml version="1.0" encoding="UTF-8"?>';

$date = date('Y-m-d');

function generateUrls($mysqli, $typePropertyCode, $typeCategoryCode, $typeName) {
    $date = date('Y-m-d');
    $urls = '';

    // Group by province_name
    $sql = "SELECT DISTINCT province_name FROM post_property WHERE type_property_code=? AND type_category_code=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ss', $typePropertyCode, $typeCategoryCode);
        $stmt->execute();
        
        // Bind result variables
        $stmt->bind_result($province_name);

        while ($stmt->fetch()) {
            $urls .= '
<url>
    <loc>https://www.dfirstproperty.com/' . htmlspecialchars($typeName, ENT_XML1, 'UTF-8') . '/' .
                preg_replace("/[\s(\)\*]/", "", htmlspecialchars($province_name, ENT_XML1, 'UTF-8')) . '</loc>
    <lastmod>' . $date . '</lastmod>
</url>';
        }
        $stmt->close();
    } else {
        die('Prepare failed: ' . htmlspecialchars($mysqli->error));
    }

    // Group by amphur_name
    $sql = "SELECT DISTINCT amphur_name FROM post_property WHERE type_property_code=? AND type_category_code=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ss', $typePropertyCode, $typeCategoryCode);
        $stmt->execute();
        
        // Bind result variables
        $stmt->bind_result($amphur_name);

        while ($stmt->fetch()) {
            $urls .= '
<url>
    <loc>https://www.dfirstproperty.com/' . htmlspecialchars($typeName, ENT_XML1, 'UTF-8') . '/' .
                preg_replace("/[\s(\)\*]/", "", htmlspecialchars($amphur_name, ENT_XML1, 'UTF-8')) . '</loc>
    <lastmod>' . $date . '</lastmod>
</url>';
        }
        $stmt->close();
    } else {
        die('Prepare failed: ' . htmlspecialchars($mysqli->error));
    }

    return $urls;
}




function generateTitle($mysqli, $typePropertyCode, $typeCategoryCode, $typeName, $locations) {
    $date = date('Y-m-d');
    $urlsT = '';
    
    // สร้าง array เพื่อเก็บ URL ที่ไม่ซ้ำกัน
    $urlSet = [];

    foreach ($locations as $typeTitle) {
        $sql2 = "SELECT DISTINCT title FROM post_property WHERE type_property_code=? AND type_category_code=? AND title LIKE ?";

        if ($stmt2 = $mysqli->prepare($sql2)) {
            $likeTitle = "%$typeTitle%";

            $stmt2->bind_param('sss', $typePropertyCode, $typeCategoryCode, $likeTitle);
            $stmt2->execute();

            // Bind result variables
            $stmt2->bind_result($title);

            while ($stmt2->fetch()) {
                if (isset($title) && $title) {
                    // สร้าง URL
                    $url = 'https://www.dfirstproperty.com/' . htmlspecialchars($typeName, ENT_XML1, 'UTF-8') . '/' . htmlspecialchars($typeTitle, ENT_XML1, 'UTF-8');
                    
                    // เพิ่ม URL ลงใน array ถ้ายังไม่เคยมี
                    if (!in_array($url, $urlSet)) {
                        $urlSet[] = $url;

                        // สร้าง XML สำหรับ URL
                        $urlsT .= '
<url>
    <loc>' . $url . '</loc>
    <lastmod>' . $date . '</lastmod>
</url>';
                    }
                }
            }

            $stmt2->close();
        } else {
            die('Prepare failed: ' . htmlspecialchars($mysqli->error));
        }
    }

    return $urlsT;
}



$locations = [

    'พร้อมสระว่ายน้ำ', 'ใกล้bts', 'ฟรีโซน', 'แหลมฉบัง', 'พื้นที่สีม่วง', 'กิ่งแก้ว', 'เทพารักษ์', 'โรจนะ', 'ในนิคมโรจนะ',

    'อ้อมน้อย', 'โกดังเก็บของ',

    'พร้อมออฟฟิศ', 'อ่อนนุช', 'ศรีนครินทร์', 'บางปลา', 'บางนาตราด', 'ถนนบางนาตราด', 'บางนา-ตราด', 'ใกล้สนามบิน',

    'พัฒนาชนบท', 'นวนคร', 'ตลาดไท', 'ไอยรา', 'เพิ่มสิน', 'หทัยราษฎร์', 'ลาดพร้าว', 'ลาดพร้าว 71', 'ลาดพร้าว 101',

    'โพธิ์แก้ว', 'รังสิต', 'คลอง1', 'คลอง2', 'คลอง4', 'คลอง5', 'คลอง 1', 'คลอง 2', 'คลอง 4', 'คลอง 7',

    'คลอง 8', 'คลองหนึ่ง', 'คลองสอง', 'คลองสาม', 'คลองสี่', 'ให้เช่าโกดัง', 'พร้อมห้องพัก', 'คลังสินค้าให้เช่า',

    'ติดถนนใหญ่', 'ขนาดเล็ก', 'ราคาถูก', 'ลาซาล', 'สุขุมวิท', 'กม19', 'กม23', 'แพรกษา', 'บางปู', 'อยุธยา',

    'มอเตอร์เวย์', 'บางคูวัด', 'อมตะ', 'รามอินทรา', 'พัฒนาการ', 'ปิ่นทอง', 'ลำลูกกาคลอง 5', 'ลำลูกกาคลอง 7',

    'Free Zone', 'Mini Factory', 'ขนาด 500', '200 ตรม', '300 ตรม', '400 ตรม', '500 ตรม', '1000 ตรม', '1500 ตรม',

    '2000 ตรม', '10000 ตรม', '20000 ตรม', '30000 ตรม'

];



$UrlWeb = "https://www.dfirstproperty.com";



echo '

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>

        <loc>' . $UrlWeb . '/โกดัง-โรงงาน-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'FW', 'R', 'โกดัง-โรงงาน-ให้เช่า')

    . generateTitle($mysqli, 'FW', 'R', 'โกดัง-โรงงาน-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/โกดัง-โรงงาน-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'FW', 'S', 'โกดัง-โรงงาน-ขาย')

    . generateTitle($mysqli, 'FW', 'S', 'โกดัง-โรงงาน-ขาย', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/บ้านเดี่ยว-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'H', 'R', 'บ้านเดี่ยว-ให้เช่า')

    . generateTitle($mysqli, 'H', 'R', 'บ้านเดี่ยว-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/บ้านเดี่ยว-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'H', 'S', 'บ้านเดี่ยว-ขาย')

    . generateTitle($mysqli, 'H', 'S', 'บ้านเดี่ยว-ขาย', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/ตึกแถว-อาคารพานิชย์-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'B', 'R', 'ตึกแถว-อาคารพานิชย์-ให้เช่า')

    . generateTitle($mysqli, 'B', 'R', 'ตึกแถว-อาคารพานิชย์-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/ตึกแถว-อาคารพานิชย์-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'B', 'S', 'ตึกแถว-อาคารพานิชย์-ขาย')

    . generateTitle($mysqli, 'B', 'S', 'ตึกแถว-อาคารพานิชย์-ขาย', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/ทาวน์เฮ้าส์-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'T', 'R', 'ทาวน์เฮ้าส์-ให้เช่า')

    . generateTitle($mysqli, 'T', 'R', 'ทาวน์เฮ้าส์-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/ทาวน์เฮ้าส์-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'T', 'S', 'ทาวน์เฮ้าส์-ขาย')

    . generateTitle($mysqli, 'T', 'S', 'ทาวน์เฮ้าส์-ขาย', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/สำนักงาน-ออฟฟิศ-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'BF', 'R', 'สำนักงาน-ออฟฟิศ-ให้เช่า')

    . generateTitle($mysqli, 'BF', 'R', 'สำนักงาน-ออฟฟิศ-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/สำนักงาน-ออฟฟิศ-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'BF', 'S', 'สำนักงาน-ออฟฟิศ-ขาย')

    . generateTitle($mysqli, 'BF', 'S', 'สำนักงาน-ออฟฟิศ-ขาย', $locations)

    . '

     <url>

        <loc>' . $UrlWeb . '/โชว์รูม-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'SR', 'R', 'โชว์รูม-ให้เช่า')

    . generateTitle($mysqli, 'SR', 'R', 'โชว์รูม-ให้เช่า', $locations)

    . '


    <url>

        <loc>' . $UrlWeb . '/พื้นที่-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'SP', 'R', 'พื้นที่-ให้เช่า')

    . generateTitle($mysqli, 'SP', 'R', 'พื้นที่-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/พื้นที่-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'SP', 'S', 'พื้นที่-ขาย')

    . generateTitle($mysqli, 'SP', 'S', 'พื้นที่-ขาย', $locations)

    . '
    

    <url>

        <loc>' . $UrlWeb . '/ที่ดิน-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'L', 'R', 'ที่ดิน-ให้เช่า')

    . generateTitle($mysqli, 'L', 'R', 'ที่ดิน-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/ที่ดิน-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'L', 'S', 'ที่ดิน-ขาย')

    . generateTitle($mysqli, 'L', 'S', 'ที่ดิน-ขาย', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/คอนโด-ให้เช่า</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'C', 'R', 'คอนโด-ให้เช่า')

    . generateTitle($mysqli, 'C', 'R', 'คอนโด-ให้เช่า', $locations)

    . '

    <url>

        <loc>' . $UrlWeb . '/คอนโด-ขาย</loc>

        <lastmod>' . $date . '</lastmod>

    </url>'

    . generateUrls($mysqli, 'C', 'S', 'คอนโด-ขาย')

    . generateTitle($mysqli, 'C', 'S', 'คอนโด-ขาย', $locations)

    . '

</urlset>';

?>

