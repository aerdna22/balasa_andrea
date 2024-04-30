<?php
include('session.php');

  $sql="SELECT * FROM tbl_hero";
  $res=mysqli_query($conn, $sql);
  $count = mysqli_num_rows($res);
    if($count==1){
      $row=mysqli_fetch_assoc($res);
      $getName=$row['hero_Name'];
      $getDesc=$row['hero_Description'];
      $getID=$row['id'];  
   
    }else{
      $getName="";
      $getDesc="";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dStyles.css">
</head>
<body class="">
    <div class="d-flex " id="wrapper">
        <!--Siderbar-->
<div class="bg-white" id="sidebar-wrapper">

            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class=""></i>Dashboard
                <div class="list-group list-group-flush my-3">
                    <a href="<?php echo SITEURL;?>dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold border-bottom">
                        <i class='bx bx-home'></i>HOME
                    </a>
                    <a href="<?php echo SITEURL;?>dashboard_Personal.php" class="list-group-item list-group-item-action bg-transparent second-text  active border-bottom">
                        <i class='bx bx-user-circle'></i>PERSONAL
                    </a>
                    <a href="<?php echo SITEURL;?>dashboard_Project.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold border-bottom">
                        <i class='bx bx-bulb'></i>PROJECTS
                    <a href="<?php echo SITEURL;?>dashboard_Skill.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold border-bottom">
                        <i class='bx bx-brain' ></i>SKILLS
                    </a>
                    
                </div>
            </div>
</div>

        <!--End sidebar-->

    <div id="page-content-wrapper">
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 border-bottom">
                <div class="d-flex align-items-center">
                    <i class='bx bx-align-left' id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">PERSONAL</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item-dropdown">
                            <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-user-circle me-2'></i> <?php echo $loggedin_session; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a href="<?php echo SITEURL;?>logout.php" class="dropdown-item text-danger">Logout</a></li> 

                            </ul>
                        </li>
                    </ul>
                </div>
</nav>
            <div class="container-fluid px-4">
               
                <div class="container">
<main>
        <h1 class="">HERO</h1>
        <br>
        <a href="<?php echo SITEURL;?>add_Hero.php" class="btn btn-success text-white mb-2">Add Hero</a>
<div class="container mt-2 text-center border-bottom">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-">
                        <h3 class="">Name</h3>
                        <input type="text" class="form-control" id="" placeholder="" value="<?php echo $getName; ?>" name="name" required>
                </div>
                <div class="col-md-"> <br>
                    <h3 class="">Expertise</h3>
                    <textarea name="desc" class="form-control" id="" cols="15"  rows="5" required><?php echo $getDesc; ?></textarea>
                    
            </div>
                    <div class="my-2">
                    
                        <button class="btn btn-success mx-2" name="btn-edit">SUBMIT</button>
                     </div>
                </div>     
            </form>
            <?php
          
          if(isset($_POST['btn-edit']))
            {
                $name = $_POST['name'];
                $desc = $_POST['desc'];

                $sql2 = "UPDATE tbl_hero SET 
                    hero_Name = '$name',
                    hero_Description = '$desc' 
                    WHERE id=$getID
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
                              window.location.href = "<?php echo SITEURL?>admin.php";
                            </script>
                          <?php
                }

            }
            
          ?>

</div>

 <!--About ME-->
 <div class="container table-responsive mt-3 border-bottom">
              <h3>ABOUT ME</h3> <br>
              <a href="<?php echo SITEURL;?>add_About.php" class="btn btn-success mb-2">Add About me</a> 
              <table class="table table-hover bg-white text-center shadow rounded">
                <thead class=" text-uppercase">
                  <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </thead>
                <?php
                  $sql_about ="SELECT * FROM tbl_aboutme";
                  $res_about =mysqli_query($conn, $sql_about);
                  $count_about = mysqli_num_rows($res_about);
                  if($count_about > 0)
                  {
                    while($row_about= mysqli_fetch_assoc($res_about))
                    {
                      $about_ID = $row_about['id'];
                      $about_image = $row_about['image'];
                      $about_desc = $row_about['description'];
                      ?>
                      <tbody>
                        <td>
                          
                         <img src="image/about/<?php echo $about_image; ?>" class="img-fluid" width="120px" alt="image">
                      </td>
                        <td><?php echo $about_desc; ?></td>
                        <td>
                          <a href="<?php echo SITEURL;?>edit_about.php?id=<?php echo $about_ID?>" class="btn btn-secondary"><i class='bx bx-cog bx-spin bx-rotate-180' ></i>Edit</a>
                          <a href="<?php echo SITEURL;?>delete_About.php?id=<?php echo $about_ID?>&image_name=<?php echo $about_image; ?>" class="btn btn-danger"><i class='bx bxs-trash bx-tada' ></i>Delete</a>
                        </td>
                      </tbody>
                      <?php

                    }
                  }
                 
              ?>
              </table>
</div>




        <!--Education-->
<div class="container table-responsive mt-3 border-bottom">
              <h3>EDUCATION</h3> <br>
              <a href="<?php echo SITEURL;?>add_Educ.php" class="btn btn-success mb-2">Add School</a>
              <table class="table table-hover bg-white text-center shadow rounded">
                <thead class=" text-uppercase">
                  <th>Logo</th>
                  <th>School</th>
                  <th>Description</th>
                  <th>Year</th>
                  <th>Action</th>
                </thead>
                <?php
                  $sql_Educ ="SELECT * FROM tbl_education";
                  $res_Educ =mysqli_query($conn, $sql_Educ);
                  $count_Educ = mysqli_num_rows($res_Educ);
                  if($count_Educ > 0)
                  {
                    while($row_Educ= mysqli_fetch_assoc($res_Educ))
                    {
                      $educ_ID = $row_Educ['id'];
                      $educ_SchoolLogo = $row_Educ['image'];
                      $educ_School = $row_Educ['school'];
                      $educ_Description = $row_Educ['description'];
                      $educ_Year = $row_Educ['year'];
                     
                      ?>
                      <tbody>
                        <td>
                          
                         <img src="image/educ/<?php echo $educ_SchoolLogo; ?>" class="img-fluid" width="120px" alt="Logo">
                      </td>
                        <td class="fw-bold"><?php echo $educ_School; ?></td>
                        <td><?php echo $educ_Description; ?></td>
                        <td><?php echo $educ_Year; ?></td>
                        
                        <td>
                          <a href="<?php echo SITEURL;?>edit_Educ.php?id=<?php echo $educ_ID?>" class="btn btn-secondary"><i class='bx bx-cog bx-spin bx-rotate-180' ></i>Edit</a>
                          <a href="<?php echo SITEURL;?>delete_educ.php?id=<?php echo $educ_ID?>&image_name=<?php echo $educ_SchoolLogo; ?>" class="btn btn-danger"><i class='bx bxs-trash bx-tada' ></i>Delete</a>
                        </td>
                      </tbody>
                      <?php

                    }
                  }
                 
              ?>
              </table>
</div>


        <!--Contact-->
<div class="container table-responsive mt-3 border-bottom">
              <h3>CONTACT</h3> <br>
              <a href="<?php echo SITEURL;?>add_Contact.php" class="btn btn-success mb-2">Add Contact</a>
              <table class="table table-hover bg-white text-center shadow rounded">
                <thead class="bg-violet text-uppercase">
                  <th>Cellphone Number</th>
                  <th>Email</th>
                  <th>Action</th>
                </thead>
                <?php
                  $sql_Contact ="SELECT * FROM tbl_contact";
                  $res_Contact =mysqli_query($conn, $sql_Contact);
                  $count_Contact = mysqli_num_rows($res_Contact);
                  if($count_Contact > 0)
                  {
                    while($row_Contact = mysqli_fetch_assoc($res_Contact))
                    {
                      $contact_ID = $row_Contact['id'];
                      $phone = $row_Contact['phone'];
                      $email = $row_Contact['email'];
                     
                     
                      ?>
                      <tbody>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $email; ?></td>
                        <td>
                          <a href="<?php echo SITEURL;?>edit_Contact.php?id=<?php echo $contact_ID?>" class="btn btn-secondary"><i class='bx bx-cog bx-spin bx-rotate-180' ></i>Edit</a>
                          <a href="<?php echo SITEURL;?>delete_Contact.php?id=<?php echo $contact_ID?>" class="btn btn-danger"><i class='bx bxs-trash bx-tada' ></i>Delete</a>
                        </td>
                      </tbody>
                      <?php

                    }
                  }
                 
              ?>
              </table>
</div>





</main>

                </div>
            </div>
            
        </div>

    </div>
    
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function(){
            el.classList.toggle("toggled")
        }
    </script>

</body>
</html>