<?php
$file_txt = $dirname.$row_data_post['img_folder'].'th.txt';

function removeSpecialCharacters($inputString) {
    $pattern = '/[\'",.)]/';
    $replacement = '';
    return preg_replace($pattern, $replacement, $inputString);
}

function replaceKeywords($content, $replacements) {
    return str_replace($replacements['old'], $replacements['new'], $content);
}


// Check if the file exists
if (file_exists($file_txt)) {
    // Open the file for reading
    $objFopen = fopen($file_txt, 'r');

    // Check if the file was successfully opened
    if ($objFopen) {
        // Read the contents of the file
        $fileContent = fread($objFopen, filesize($file_txt));

        // Close the file
        fclose($objFopen);

        $replacements = array(
            'old' => [
                '0944109908', '0925857834', 'คุณเอก', '092-5857834', $row_data_post['amphur_name']

            ],
            'new' => [
                '097-1823-805', '097-1823-805','คุณนัท', '097-1823-805',
                '<a href="/' . $property_code . '-' . $row_data_post['type_category'] . '/' . removeSpecialCharacters($row_data_post['amphur_name']) . '" class="text-success" title="' . $property_code . '-' . $row_data_post['type_category'] . ' ' . removeSpecialCharacters($row_data_post['amphur_name']) . '">' . removeSpecialCharacters($row_data_post['amphur_name']) . '</a>',                '<a href="/' . $property_code . '-' . $row_data_post['type_category'] . '/นวนคร" class="text-success" title="นวนคร">นวนคร</a>'
            
            ]); 
            
        if ($row_data_post['type_property_code'] == 'FW') {
        $replacements = array(
            'old' => [               
            
            /// Start
            'ท่าเรือแหลมฉบัง',
            'คลังสินค้าให้เช่า', 'ให้เช่าโกดัง', 'ให้เช่าโรงงาน',
            'บางนา-ตราด', 'โกดังให้เช่า', 
            '<a href="/real-estate?search_string=โกดังให้เช่า" class="text-success" title="โกดังให้เช่า">โกดังให้เช่า</a> ฟรีโซน',
            'เขตฟรีโซน', 'โกดังใหม่ให้เช่า', 'โกดัง ให้เช่า','พื้นที่สีม่วง', 'นิคมอุตสาหกรรม',
            'พัฒนาชนบท', 'สนามบินสุวรรณภูมิ', 'รามอินทรา',          
            'ใกล้ตลาดไท', 'นวนคร', 'โรงงานให้เช่า', 'โรงงาน ให้เช่า', 'ถนนเทพารักษ์','แพรกษา','บางปู',
            '<a href="/real-estate?search_string=นิคมอุตสาหกรรม" class="text-success" title="โกดัง โรงงาน นิคมอุตสาหกรรม">นิคมอุตสาหกรรม</a><a href="/โกดัง-โรงงาน-ให้เช่า/บางปู" class="text-success" title="โกดัง โรงงาน บางปู">บางปู</a>'        
            /// END    		
            
            ,'0944109908', '0925857834', 'คุณเอก', '092-5857834', $row_data_post['amphur_name']
            
            ],
            'new' => [            
            
            /// Start
            '<a href="/โกดัง-โรงงาน-ให้เช่า/ท่าเรือแหลมฉบัง" class="text-success" title="โกดัง โรงงาน ท่าเรือแหลมฉบัง">ท่าเรือแหลมฉบัง</a>',	
            '<a href="/real-estate?search_string=คลังสินค้าให้เช่า" class="text-success" title="คลังสินค้าให้เช่า">คลังสินค้าให้เช่า</a>',			
            '<a href="/real-estate?search_string=ให้เช่าโกดัง" class="text-success" title="ให้เช่าโกดัง">ให้เช่าโกดัง</a>',
            '<a href="/real-estate?search_string=ให้เช่าโรงงาน" class="text-success" title="ให้เช่าโรงงาน">ให้เช่าโรงงาน</a>',            
            '<a href="/real-estate?search_string=บางนา-ตราด" class="text-success" title="โกดัง บางนา-ตราด">บางนา-ตราด</a>',
            '<a href="/real-estate?search_string=โกดังให้เช่า" class="text-success" title="โกดังให้เช่า">โกดังให้เช่า</a>',            
            '<a href="/โกดัง-โรงงาน-ให้เช่า/ฟรีโซน" class="text-success" title="โกดังให้เช่า ฟรีโซน">โกดังให้เช่า ฟรีโซน</a>',
            '<a href="/real-estate?search_string=เขตฟรีโซน" class="text-success" title="โกดัง เขตฟรีโซน">เขตฟรีโซน</a>',
            '<a href="/real-estate?search_string=โกดังใหม่ให้เช่า" class="text-success" title="โกดังใหม่ให้เช่า">โกดังใหม่ให้เช่า</a>',
            '<a href="/real-estate?search_string=โกดัง+ให้เช่า" class="text-success" title="โกดัง ให้เช่า">โกดัง ให้เช่า</a>',           
            '<a href="/โกดัง-โรงงาน-ให้เช่า/พื้นที่สีม่วง" class="text-success" title="โกดัง โรงงาน พื้นที่สีม่วง">พื้นที่สีม่วง</a>',
            '<a href="/real-estate?search_string=นิคมอุตสาหกรรม" class="text-success" title="โกดัง โรงงาน นิคมอุตสาหกรรม">นิคมอุตสาหกรรม</a>',
            '<a href="/real-estate?search_string=พัฒนาชนบท" class="text-success" title="โกดัง พัฒนาชนบท">พัฒนาชนบท</a>',
            '<a href="/real-estate?search_string=สนามบินสุวรรณภูมิ" class="text-success" title="โกดัง โรงงาน สนามบินสุวรรณภูมิ">สนามบินสุวรรณภูมิ</a>',
            '<a href="/โกดัง-โรงงาน-ให้เช่า/รามอินทรา" class="text-success" title="โกดัง รามอินทรา">รามอินทรา</a>',
            '<a href="/โกดัง-โรงงาน-ให้เช่า/ใกล้-ตลาดไท" class="text-success" title="โกดัง ใกล้-ตลาดไท">ใกล้ตลาดไท</a>',              
            '<a href="/โกดัง-โรงงาน-ให้เช่า/นวนคร" class="text-success" title="โกดัง นวนคร">นวนคร</a>',
            '<a href="/real-estate?search_string=โรงงานให้เช่า" class="text-success" title="โรงงานให้เช่า">โรงงานให้เช่า</a>',
            '<a href="/real-estate?search_string=โรงงาน+ให้เช่า" class="text-success" title="โรงงาน ให้เช่า">โรงงาน ให้เช่า</a>',
            '<a href="/โกดัง-โรงงาน-ให้เช่า/ถนนเทพารักษ์" class="text-success" title="โกดัง ถนนเทพารักษ์">ถนนเทพารักษ์</a>',
            '<a href="/โกดัง-โรงงาน-ให้เช่า/แพรกษา" class="text-success" title="โกดัง โรงงาน แพรกษา">แพรกษา</a>',
            '<a href="/โกดัง-โรงงาน-ให้เช่า/บางปู" class="text-success" title="โกดัง โรงงาน บางปู">บางปู</a>',
            '<a href="/โกดัง-โรงงาน-ให้เช่า/นิคมอุตสาหกรรมบางปู" class="text-success" title="โกดัง โรงงาน นิคมอุตสาหกรรมบางปู">นิคมอุตสาหกรรมบางปู</a>'
                          
            /// END    
            , '097-1823-805', '097-1823-805','คุณนัท', '097-1823-805',
            '<a href="/' . $property_code . '-' . $row_data_post['type_category'] . '/' . removeSpecialCharacters($row_data_post['amphur_name']) . '" class="text-success" title="' . $property_code . '-' . $row_data_post['type_category'] . ' ' . removeSpecialCharacters($row_data_post['amphur_name']) . '">' . removeSpecialCharacters($row_data_post['amphur_name']) . '</a>',                '<a href="/' . $property_code . '-' . $row_data_post['type_category'] . '/นวนคร" class="text-success" title="นวนคร">นวนคร</a>'
            
            ]
        );   

    }
                

        $fileContent = replaceKeywords($fileContent, $replacements);
        // Conditional replacements based on type_property_code

        echo nl2br($fileContent);

    } else {
        echo 'Failed to open the file for reading.';
    }
}
?>
<br>
