<?php
include('session.php');

// Notification message variable
$notification = '';

// Check if admin ID is provided in the URL
if(isset($_GET['id'])) {
    $admin_id = $_GET['id'];
    // Delete admin record from the database
    $delete_sql = "DELETE FROM tbl_admin WHERE id = $admin_id";
    $delete_res = mysqli_query($conn, $delete_sql);
    if ($delete_res) {
        // Admin record deleted successfully, set notification
        $notification = 'Admin has been deleted successfully.';
    } else {
        // Error occurred while deleting admin record
        $notification = 'Error: ' . mysqli_error($conn);
    }
} else {
    // Admin ID not provided, set notification
    $notification = 'Admin ID not provided.';
}

// Redirect to admin list page with notification
header("Location: admin_list.php?notification=" . urlencode($notification));
exit();
?>