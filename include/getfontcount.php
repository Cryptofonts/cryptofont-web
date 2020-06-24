<?php
//get database account details
include('dbaccess.php');


$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
$count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM fontcase"));

?>
