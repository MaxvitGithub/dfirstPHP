<?php include('db/con_site_bar.php');

$code_property=$_GET['code_property'];

$query_data_post_A = "SELECT * FROM post_property WHERE code_property='$code_property'";
$data_post_A = mysqli_query($con, $query_data_post_A) or die(mysqli_error());
$row_data_post_A = mysqli_fetch_array($data_post_A, MYSQLI_ASSOC);
$totalRows_data_post_A = mysqli_num_rows($data_post_A);

$title_cut =trim($row_data_post_A['title']);
$title = preg_replace('/([\- \/\'\.\*\,\/\(\)]{1,10})/','-',$title_cut).'-'.$row_data_post_A['code_property'];
$title_url = str_replace('--', '-', $title);


// Permanent 301 redirection
header("HTTP/1.1 301 Moved Permanently");
header("Location: https://www.dfirstproperty.com/real-estate/".$title_url);
exit();
;?>
