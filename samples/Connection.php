<?php 
 $server = "localhost";
 $username = "root";
 $password = "";
 $dbname = "miomio";
 $conn = mysqli_connect($server, $username, $password, $dbname)or die("Error : " . mysqli_error($conn));
?>