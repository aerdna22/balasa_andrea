<?php
include('session.php');
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="SELECT * FROM tbl_education WHERE id='$id'";
  $res=mysqli_query($conn, $sql);
  $count = mysqli_num_rows($res);
    if($count==1){
      $row=mysqli_fetch_assoc($res);
      $getImage=$row['image'];
      $getName=$row['school'];
      $getYear=$row['year'];
      $getDesc=$row['description'];
   
    }else{
        ?>
          <script>
              alert("Not found");
              window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
          </script>
        <?php
    }
}else{
  header('location:'.SITEURL.'dashboard_Personal.php');
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
            <a href="<?php echo SITEURL?>dashboard_Personal.php" class="navbar-brand">Back</a>
        </div>
    </nav>
    <main>
        <h1 class="text-center">Add School</h1>
        <div class="container mt-5 text-center">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-"> 
                            <img src="image/educ/<?= $getImage ?>" class="img-fluid img-thumbnail" width="120px" alt=""> <br>
                            <h3 class="">Image</h3>
                            <input type="file" class="form-control" id="" placeholder="Image" name="image">
                    </div>
                    <div class="col-md-"> <br>
                        <h3 class="">School Name</h3>
                        <input type="text" class="form-control" id="" placeholder="" value="<?php echo $getName; ?>" name="name" required>
                </div>
           <h3 class="">School Year</h3>
                        <input type="text" class="form-control" id="" placeholder="" value="<?php echo $getYear; ?>" name="year" required>
                </div>
                <div class="col-md-"> <br>
                    <h3 class="">Description</h3>
                    <textarea name="desc" class="form-control" id="" cols="15"  rows="5" required maxlength="150"><?php echo $getDesc; ?></textarea>
                    
            </div>
                    <div class="mt-2 d-grid">
                    <input type="hidden" name="current_image" value="<?php echo $getImage; ?>">
                        <button class="btn btn-success" name="btn-edit">Submit</button>
                    </div>
                </div>     
            </form>
            <?php
          
          if(isset($_POST['btn-edit']))
            {
              
                $name = $_POST['name'];
                $year = $_POST['year'];
                $current_image = $_POST['current_image'];
                $desc = $_POST['desc'];

                
                if(isset($_FILES['image']['name']))
                {
                    
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {

                        $ext = end(explode('.', $image_name));


                        $image_name = "educ_".rand(000, 999).'.'.$ext; 


                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "image/educ/".$image_name;


                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                           
                            die();
                            ?>
                            <script>
                              alert("Fail to upload image.");
                              window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
                            </script>
                          <?php
                        }

                        if($current_image != "")
                        {
                            $remove_path = "image/educ/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                die();
                                ?>
                                  <script>
                                    alert("fail to remove image.");
                                    window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
                                  </script>
                                <?php
                            }
                        }
                        
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }


                $sql2 = "UPDATE tbl_education SET 
                    image = '$image_name',
                    school = '$name',
                    description = '$desc',
                    year = '$year' 
                    WHERE id=$id
                ";


                $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

                if($res2==true)
                {
                  ?>
                            <script>
                              alert("Success");
                              window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
                            </script>
                          <?php
             
                }
                else
                {
                  ?>
                            <script>
                              alert("Fail to update.");
                              window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
                            </script>
                          <?php
                }

            }
            
          ?>

        </div>
    </main>
    
</body>
</html>