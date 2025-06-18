<?php
$file_txt = $dirname . $row_data_post['img_folder'] . 'th.txt';

// Open the file for reading
if ($objFopen = fopen($file_txt, 'r')) {
    // Read up to 5 lines from the file
    for ($i = 0; $i < 5 && !feof($objFopen); $i++) {
        $file_detail = fgets($objFopen);

        // Define the patterns and replacements
        $patterns = [
            '/([0-9]+[\- ]?[0-9]{6,})/',
            '/([0-9]+[\- ]?[0-9]{7,})/',
            '/(สอบถาม)/',
            '/[\.]/'
        ];

        $replacements = ['', '', '', ''];

        // Use a single call to preg_replace for performance
        $string = trim(preg_replace($patterns, $replacements, $file_detail));

        // Output the cleaned string
        echo $string . PHP_EOL; // Added PHP_EOL for line separation
    }
    fclose($objFopen);
} else {
    // Handle error opening the file
    echo "";
}
?>
