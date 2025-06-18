<?php

include_once('db/con_site_bar.php');



header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8"?>';



$date = date('Y-m-d');



// Start the XML document

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';



// Static URLs

echo '

    <url>

        <loc>http://www.dfirstproperty.com/</loc>

        <lastmod>' . htmlspecialchars($date, ENT_XML1, 'UTF-8') . '</lastmod>

    </url>

    <url>

        <loc>http://www.dfirstproperty.com/real-estate</loc>

        <lastmod>' . htmlspecialchars($date, ENT_XML1, 'UTF-8') . '</lastmod>

    </url>

';



// Query the database

$sql = "SELECT * FROM post_property ORDER BY id_property DESC";

if ($result = $mysqli->query($sql)) {

    while ($rowData = $result->fetch_assoc()) {

    if (!empty($rowData['title'])) {

    // กำหนดความยาวสูงสุด (เช่น 50 ตัวอักษร)
    $add_title_head = trim($rowData['title']);
    $max_length = 200;

    // ถ้าความยาวของข้อความเกินขีดจำกัด
    if (strlen($add_title_head) > $max_length) {
        // หาตำแหน่งช่องว่างสุดท้ายที่อยู่ในช่วงที่ต้องการ
        $last_space = strrpos(substr($add_title_head, 0, $max_length), ' ');
        // ตัดข้อความให้สิ้นสุดที่ช่องว่างนั้น
        $add_title_head = substr($add_title_head, 0, $last_space);
    }

        $title_cut =  $add_title_head. '-' . $rowData['code_property'];

        $title = preg_replace('/[\'\"\.\*\:\!\@\#\$\%\&\(\)\+\/]+/', ' ', $title_cut);  // Clean special characters
        
        $title_url = preg_replace('/[\,]/', '', trim($title));  // Remove commas
        
        $title_url = preg_replace('/–/', '-', $title_url);  // Replace en dash with hyphen
        
        $title_url = preg_replace("/[\ \-]+/", "-", $title_url);  // Replace multiple spaces or hyphens with a single hyphen


            // Determine the last modified date

            $lastmod = (!empty($rowData['date']) && $rowData['update_now'] !== '0000-00-00') ? $rowData['date'] : $date;


            // Output the URL

            echo '

            <url>

                <loc>https://www.dfirstproperty.com/real-estate/' . htmlspecialchars($title_url, ENT_XML1, 'UTF-8') . '</loc>

                <lastmod>' . htmlspecialchars($lastmod, ENT_XML1, 'UTF-8') . '</lastmod>

            </url>';

        }

    }

    $result->free();

} else {

    // Handle query error

    echo '<!-- Database query failed -->';

}



// End the XML document

echo '</urlset>';

?>

