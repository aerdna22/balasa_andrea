<?php
    include('session.php');
    $sqlcheck = "SELECT * FROM tbl_project";
    $rescheck = mysqli_query($conn, $sqlcheck);

   
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
            <a href="<?php echo SITEURL;?>dashboard_Project.php" class="navbar-brand">Back</a>
        </div>
    </nav>
    <main>
        <h1 class="text-center">Add Project</h1>
        <div class="container mt-5 text-center">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-">
                            <h3 class="">Image</h3>
                            <input type="file" class="form-control" id="" placeholder="Image" name="img" required>
                    </div>
                    <div class="col-md-">
                    <h3 class="">Enter Project Name</h3>
                    <input type="text" class="form-control" id="" name="project" required maxlength="50">
            </div>
                    
                <div class="col-md-">
                    <h3 class="">Enter Short Description</h3>
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
              $desc = $_POST['desc'];
              $project = $_POST['project'];

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
                            $dst = "image/project/".$image_name;
                
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

                $sql = "INSERT INTO tbl_project SET
                            project_Image = '$image_name',
                            project_Name = '$project',
                            project_Desc = '$desc'
                ";
                $res = mysqli_query($conn, $sql);
                if($res == TRUE )
                {
                    ?>
                        <script>
                        alert("Success");
                        window.location.href = "<?php echo SITEURL;?>dashboard_Project.php";
                        </script>
                    <?php
                }else{
                    ?>
                    <script>
                    alert("Fail");
                    window.location.href = "<?php echo SITEURL;?>add_Project.php";
                    </script>
                <?php
                }
                      

            }
            
            
            ?>

        </div>
    </main>
    
</body>
</html>