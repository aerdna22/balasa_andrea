<?php
    include('session.php');
    $sqlcheck = "SELECT * FROM tbl_education";
    $rescheck = mysqli_query($conn, $sqlcheck);
    $countcheck = mysqli_num_rows($rescheck);
    if($countcheck > 2)
    {
        ?>
        <script>
          alert("You already have 3 inputs on the EDUCATION section, please just edit it or delete it before you can input again.");
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
    <title>Add School</title>
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
        <h1 class="text-center">Add Scool</h1>
        <div class="container mt-5 text-center">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-">
                            <h3 class="">School Logo</h3>
                            <input type="file" class="form-control" id="" placeholder="Image" name="img" required>
                    </div>
                    <div class="col-md-">
                        <h3 class="">School</h3>
                        <input type="text" class="form-control" id="" placeholder="" name="name" required>
                </div>
                <div class="col-md-">
                        <h3 class="">Year</h3>
                        <input type="text" class="form-control" id="" placeholder="" name="year" required>
                </div>
                <div class="col-md-">
                    <h3 class="">Enter Short Description</h3>
                    <textarea name="desc" class="form-control" id="" cols="15" rows="5" required maxlength="150"></textarea>
                    
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
              $year = $_POST['year'];
              $desc = $_POST['desc'];

              if(isset($_FILES['img']['name']))
                      {
                        $image_name = $_FILES['img']['name'];
                          //upload if image is selected
                        if($image_name != "")
                        {
                            //get extension of image
                            $tmpss = explode('.', $image_name);
                            $ext = end($tmpss);
                            
                
                            //new name for image
                            $image_name = "img-".rand(0000,9999).".".$ext;
                
                            //get the path
                            $src = $_FILES['img']['tmp_name'];
                
                            //destination for the image
                            $dst = "image/educ/".$image_name;
                
                            //upload
                            $upload = move_uploaded_file($src, $dst);
                
                            if($upload==false)
                            {
                                //fail to upload
                                echo '<script type="text/javascript">';
                                echo ' alert("fail to upload image")';  //not showing an alert box.
                                echo '</script>';
                                
                                die();
                            }
            
                          }else{
                              //image not selected
                          }
                      }else{
                      $image_name = "";//setting image name to blank
                      }

                $sql = "INSERT INTO tbl_education SET
                            image = '$image_name',
                            school = '$name',
                            description = '$desc',
                            year = '$year'
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
                    window.location.href = "<?php echo SITEURL;?>dashboard_Personal.php";
                    </script>
                <?php
                }
                      

            }
            
            
            ?>

        </div>
    </main>
    
</body>
</html>