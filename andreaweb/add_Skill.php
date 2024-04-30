<?php
    include('session.php');
    $sqlcheck = "SELECT * FROM tbl_skills";
    $rescheck = mysqli_query($conn, $sqlcheck);
    $countcheck = mysqli_num_rows($rescheck);
    if($countcheck > 6)
    {
        ?>
        <script>
         alert("You already have inputs on the Skills section, you can only have 6 inputs for skills . Please just edit it or delete it before you can input again.");
          window.location.href = "<?php echo SITEURL;?>dashboard_Skill.php";
        </script>
      <?php
    }
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
        .bg-purple{
            background-color:#d7bfdc;
        }
        </style>
</head>
<body class="bg-purple vh-100">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark shadow">
        <div class="container-fluid">
            <a href="<?php echo SITEURL;?>dashboard_Skill.php" class="navbar-brand">Back</a>
        </div>
    </nav>
    <main>
    <h1 class="text-center">Add Skill</h1>
        <div class="container m-5 text-center">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-">
                            <h3 class=""> Skill</h3>
                            <input type="text" class="form-control text-center" id="" placeholder="Skill" name="skill" required>
                    </div>
                    <div class="col-md-">
                            <h3 class="">Short Description</h3>
                            <textarea name="desc" id="" class="form-control text-center" cols="5" rows="2" required maxlength="100"></textarea> 
                    </div>
                    <div class="col-md-">
                            <h3 class="">Choose Proficiency Level</h3>
                            <select class="form-select Text-center" name="level">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advance">Advance</option>
                            </select>
                            
                    </div>

                    <div class="mt-2 d-grid">
                        <button class="btn btn-success" name="btn-add">Submit</button>
                    </div>
                </div>     
            </form>
            
            <?php 
                if(isset($_POST['btn-add']))
                {
                    $skill = $_POST['skill'];
                    $desc = $_POST['desc'];
                    $level = $_POST['level'];
                    


                    $sql="INSERT INTO tbl_skills SET
                            skill= '$skill',
                            skill_Description = '$desc',
                            skill_Level = '$level'

                    ";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE)
                    {
                        ?>
                            <script>
                                alert("Success");
                                window.location.href = "<?php echo SITEURL;?>dashboard_Skill.php";
                            </script>
                        <?php
                    }else{
                        ?>
                        <script>
                        alert("Fail");
                        window.location.href = "<?php echo SITEURL;?>add_skill.php";
                        </script>
                    <?php
                    }
                }
            
            ?>


        </div>
        
    </main>
    
</body>
</html>