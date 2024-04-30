<?php
include('constant/config.php');


$user_check=$_SESSION['user'];
$ses_sql=mysqli_query($conn,"SELECT user FROM tbl_admin where user='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['user'];

if(!isset($loggedin_session) && $loggedin_session==NULL) {
 echo "Go back";
 header('location:'.SITEURL.'login.php');
}
?>