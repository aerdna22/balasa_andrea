<?php
    include('session.php');
    $sqlcheck = "SELECT * FROM tbl_hero";
    $rescheck = mysqli_query($conn, $sqlcheck);
    $countcheck = mysqli_num_rows($rescheck);
    if($countcheck > 0)
    {
        ?>
        <script>
          alert("You already have inputs on the HERO section, please just edit it or delete it before you can input again.");
          window.location.href = "<?php echo SITEURL;?>dashboard_Personal.php";
        </script>
      <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hero</title>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        .bg-purple{
            background-color:#d7bfdc;
        }
        </style>
</head>
<body class="bg-purple vh-100">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow">
        <div class="container-fluid">
            <a href="<?php echo SITEURL;?>dashboard_Personal.php" class="navbar-brand">Back</a>
        </div>
    </nav>
    <main>
        <h1 class="text-center">Add Hero</h1>
        <div class="container mt-5 text-center">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                   
                    <div class="col-md-">
                        <h3 class="">Name</h3>
                        <input type="text" class="form-control" id="" placeholder="" name="name" required>
                </div>
                <div class="col-md-">
                    <h3 class="">Short Description</h3>
                    <textarea name="desc" class="form-control" id="" cols="15" rows="5" required></textarea>
                    
            </div>
                    <div class="mt-2 d-grid">
                        <button class="btn btn-success" name="btn-add">Submit</button>
                    </div>
                </div>     
            </form>
            <?php
            if(isset($_POST['btn-add']))
            {
              $name = $_POST['name'];
              $desc = $_POST['desc'];


                $sql = "INSERT INTO tbl_hero SET
                            hero_Name = '$name',
                            hero_Description = '$desc'
                ";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE )
                {
                    ?>
                        <script>
                        alert("Success");
                        window.location.href = "<?php echo SITEURL;?>dashboard_Personal.php";
                        </script>
                    <?php
                }else{
                    ?>
                    <script>
                    alert("Fail");
                    window.location.href = "<?php echo SITEURL;?>add_Hero.php";
                    </script>
                <?php
                }
                      

            }
            
            
            ?>

        </div>
    </main>
    
</body>
</html>