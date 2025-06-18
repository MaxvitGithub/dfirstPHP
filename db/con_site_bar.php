<?php

$server="localhost";

$db_con="";

$user="";

$pass="";

$con = mysqli_connect($server,$user, $pass, $db_con);

$con -> set_charset("utf8");

$mysqli = new mysqli($server,$user, $pass, $db_con);

$mysqli -> set_charset("utf8");



?>