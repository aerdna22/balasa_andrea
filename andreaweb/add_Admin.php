<?php
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .bg-purple {
            background-color: #d7bfdc;
        }

        .center {
            margin: 0 auto; /* horizontally center */
            float: none; /* prevent floating */
        }

        .vertical-center {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
    </style>
</head>
<body class="bg-purple">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow">
        <div class="container-fluid">
            <a href="dashboard.php" class="navbar-brand">Back</a>
        </div>
    </nav>
    <main class="vertical-center">
        <div class="container m-5 p-5">
            <form action="" method="post" class="text-center">
                <div class="row">
                    <div class="col-md-4 offset-md-4"> <!-- Centered text boxes -->
                        <h3 class="mb-3">Enter User</h3>
                        <input type="text" class="form-control" id="" placeholder="" name="user" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4 offset-md-4"> <!-- Centered text boxes -->
                        <h3 class="mb-3">Enter Password</h3>
                        <input type="text" class="form-control" id="" placeholder="" name="pass" required>
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-success center" name="btn-add">Submit</button> <!-- Centered button -->
                </div>
            </form>

            <?php 
                if(isset($_POST['btn-add']))
                {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];

                    $sql="INSERT INTO tbl_admin SET
                           user = '$user',
                           pass = '$pass'

                    ";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE)
                    {
                        ?>
                            <script>
                                alert("Success");
                                window.location.href = "<?php echo SITEURL;?>dashboard.php";
                            </script>
                        <?php
                    }else{
                        ?>
                        <script>
                        alert("Fail");
                        window.location.href = "<?php echo SITEURL;?>dashboard.php";
                        </script>
                    <?php
                    }
                }
            
            ?>
        </div>
    </main>   
</body>
</html>