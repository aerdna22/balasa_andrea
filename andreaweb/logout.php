<?php
include('constant/config.php');

session_destroy();

header('location:'.SITEURL.'login.php')
?>