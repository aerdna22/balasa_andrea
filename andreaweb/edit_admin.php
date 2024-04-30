<?php
include('session.php');

// Check if admin ID is provided in the URL
if(isset($_GET['id'])) {
    $admin_id = $_GET['id'];
    // Fetch admin details from the database
    $sql = "SELECT * FROM tbl_admin WHERE id = $admin_id";
    $res = mysqli_query($conn, $sql);
    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $admin_name = isset($row['user']) ? $row['user'] : '';
        $admin_pass = isset($row['pass']) ? $row['pass'] : '';
    } else {
        // Admin not found, redirect to admin list page
        header("Location: admin_list.php");
        exit();
    }
} else {
    // Admin ID not provided, redirect to admin list page
    header("Location: admin_list.php");
    exit();
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    $new_admin_name = $_POST['new_admin_name'];
    $new_admin_pass = $_POST['new_admin_pass'];

    // Update admin details in the database
    $update_sql = "UPDATE tbl_admin SET user = '$new_admin_name', pass = '$new_admin_pass' WHERE id = $admin_id";
    $update_res = mysqli_query($conn, $update_sql);
    if ($update_res) {
        // Admin details updated successfully, redirect to admin list page
        header("Location: admin_list.php");
        exit();
    } else {
        // Error occurred while updating admin details
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Admin</h2>
        <form method="post">
            <div class="mb-3">
                <label for="new_admin_name" class="form-label">New Username:</label>
                <input type="text" class="form-control" id="new_admin_name" name="new_admin_name" value="<?php echo $admin_name; ?>">
            </div>
            <div class="mb-3">
                <label for="new_admin_pass" class="form-label">New Password:</label>
                <input type="password" class="form-control" id="new_admin_pass" name="new_admin_pass" value="<?php echo $admin_pass; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>