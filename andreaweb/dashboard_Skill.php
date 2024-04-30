<?php 
include('session.php');
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
    <div class="d-flex" id="wrapper">
        <!--Siderbar-->
        <div class="bg-white" id="sidebar-wrapper">

            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class=""></i>Dashboard
                <div class="list-group list-group-flush my-3">
                <a href="<?php echo SITEURL;?>dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold  border-bottom">
                        <i class='bx bx-home'></i>HOME
                    </a>
                    <a href="<?php echo SITEURL;?>dashboard_Personal.php" class="list-group-item list-group-item-action bg-transparent second-text  fw-bold border-bottom">
                        <i class='bx bx-user-circle'></i>Personal
                    </a>
                    <a href="<?php echo SITEURL;?>dashboard_Project.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold border-bottom">
                        <i class='bx bx-bulb'></i>Projects
                    </a>
                    <a href="<?php echo SITEURL;?>dashboard_Skill.php" class="list-group-item list-group-item-action bg-transparent second-text active  border-bottom">
                        <i class='bx bx-brain' ></i>Skills
                    </a>
                    
                </div>
            </div>
        </div>

        <!--End sidebar-->

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 border-bottom">
                <div class="d-flex align-items-center">
                    <i class='bx bx-align-left' id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">SKILLS</h2>
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
                <h3></h3>
                <div class="container d-grid">
                <a href="<?php echo SITEURL;?>add_Skill.php" class="btn btn-success mb-2">add Skill</a>
                </div>


                <div class="container table-responsive mt-3">
                    <table class="table table-hover bg-white text-center shadow rounded">
                        <thead>
                            <th>Skill</th>
                            <th>Description</th>
                            <th>Level</th>
                            <th>Action</th>
                        </thead>
                        <?php
                            $sqlGetSkill = "SELECT * FROM tbl_skills";
                            $resGetSkill = mysqli_query($conn, $sqlGetSkill);
                            $countGetSkill = mysqli_num_rows($resGetSkill);
                            if($countGetSkill > 0)
                            {
                                while($rowGetSkill = mysqli_fetch_assoc($resGetSkill))
                                {
                                    $skill_ID = $rowGetSkill['id'];
                                    $skill = $rowGetSkill['skill'];
                                    $skill_desc = $rowGetSkill['skill_Description'];
                                    $skill_level = $rowGetSkill['skill_Level'];

                                    ?>
                                        <tbody>
                                            <td><?= $skill?></td>
                                            <td><?= $skill_desc?></td>
                                            <td><?= $skill_level?></td>
                                            <td>
                                            <a href="<?php echo SITEURL;?>edit_skill.php?id=<?php echo $skill_ID?>" class="btn btn-secondary"><i class='bx bx-cog bx-spin bx-rotate-180' ></i>Edit</a>
                                            <a href="<?php echo SITEURL;?>delete_skill.php?id=<?php echo $skill_ID?>" class="btn btn-danger"><i class='bx bxs-trash bx-tada' ></i>Delete</a>
                                            </td>
                                        </tbody>
                                    <?php
                                }
                            }
                        ?>

                    </table>

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