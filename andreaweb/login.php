<?php
include('constant/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <!--boxIcon-->
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <style>
       
        body {
            background: url('image/bg_login.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .wrapper{
            width:60%;
            margin: 120px auto;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.5); /* Transparent white background */
            border-radius: 10px;
            backdrop-filter: blur(10px); /* Apply a blur effect to the background */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
        }

   </Style>
</head>
<body class="">

    <div class="container">
        <div class="wrapper text-center">
            <form action="" method="post">
            <div class="row">
                    <div class="col-md-">
                            <h3 class="">ENTER USERNAME</h3> <br>
                            <input type="text" class="form-control" id="" placeholder="username" name="user" required>
                    </div> 
                    <div class="col-md-"> <br>
                            <h3 class="">ENTER PASSWORD</h3> <br>
                            <input type="password" class="form-control" id="" placeholder="password" name="pass" required>
                    </div>           
                    <div class="mt-2 d-grid">
                        <button class="btn btn-success" name="btn-login">Login</button>
                    </div>
                    
                </div>     
            </form>
            <?php
                            if(isset($_POST['btn-login'])){
                                //to prevent from mysqli injection  
                                
                                $username = $_POST['user'];
                                $password = $_POST['pass'];

                                //query
                                $sql = "SELECT * FROM tbl_admin WHERE user='$username' AND pass='$password'";
                                $res=mysqli_query($conn, $sql);
                                $count=mysqli_num_rows($res);
                                    if($count == 1){
                                        $_SESSION['user'] = $username;
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
                                window.location.href = "<?php echo SITEURL;?>login.php";
                            </script>
                        <?php
                                    }
                            }
                        ?>
            
        </div>
    </div>
    
</body>
</html>