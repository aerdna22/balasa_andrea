<?php
include('session.php');
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM tbl_skills WHERE id='$id'";
    $res=mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
      if($count==1){
        $row=mysqli_fetch_assoc($res);
        $getSkill = $row['skill'];
        $getSkillDesc = $row['skill_Description'];
        $getSkillLevel = $row['skill_Level'];
     
      }else{
          ?>
            <script>
                alert("Not found");
                window.location.href = "<?php echo SITEURL?>dashboard_Skill.php";
            </script>
          <?php
      }
  }else{
    header('location:'.SITEURL.'dashboard_Skill.php');
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
                            <h3 class="">Skill</h3>
                            <input type="text" class="form-control text-center" id="" value="<?= $getSkill?>" placeholder="Skill" name="skill" required>
                    </div>
                    <div class="col-md-">
                            <h3 class="">Skill Description</h3>
                            <textarea name="desc" id="" class="form-control text-center" cols="5" rows="2" required maxlength="100"><?= $getSkillDesc?></textarea> 
                    </div>
                    <div class="col-md-">
                            <h3 class=""> Proficiency Level</h3>
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
                    


                    $sql="UPDATE tbl_skills SET
                            skill= '$skill',
                            skill_Description = '$desc',
                            skill_Level = '$level'
                            WHERE id=$id

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