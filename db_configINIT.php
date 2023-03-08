<?php
$dbhost = "mysql"; // host name
$dbuser = "u909244959_philippe";  // username
$dbpass = "l@99339RWFH5465";  // password
$db = "u909244959_wroomwroom";  // database name
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);
// 	mysqli_set_charset($con, "utf8");

if (!$con) {
    die('Could not connect: ' . mysqli_error());
}
echo ('Connected successfully');
// mysqli_close($con);
?>