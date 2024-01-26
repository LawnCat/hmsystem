<?php
$conn = mysqli_connect("localhost", "root", "123456", "hm_db", 3306) or die("Error: " . mysqli_error($conn));
mysqli_query($conn, "SET NAMES 'utf8' ");
