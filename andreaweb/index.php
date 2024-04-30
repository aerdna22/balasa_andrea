<?php
include('constant/config.php');

$sqlGetHero="SELECT * FROM tbl_hero";
$resGetHero = mysqli_query($conn,$sqlGetHero);
$rowGetHero = mysqli_fetch_assoc($resGetHero);

$getHeroName = $rowGetHero['hero_Name'];
$getHeroDesc = $rowGetHero['hero_Description'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andrea</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap');
    *{
        margin: 0;
        padding: 0;
    }
    body {
        
            font-family: 'Arial', sans-serif;
            background-color: var(--darkpurp-color);
            
            
        }
        .About,
.Education,
.Skills,
.Project,
footer {
    border: 1px solid white;
}
      
        :root{
            --darkpurp-color:  #BA55D3; 
            --purp-color: #BA55D3; 
            --pink-color: #d8bfd8; 
            --lightpink-color: #d8bfd8; 
        }
        .darkPurpText{
            color: var(--darkpurp-color);
        }
        .darkPurp{
            background-color: var(--darkpurp-color);
        }
        .lightPink{
            background-color: var(--lightpink-color);
        }
        .lightPinkText{
            color: var(--lightpink-color);
        }
        .pinkText{
            color: #e6e6fa;
        }
        a{
            text-decoration: none;
        }
        .bg-Hero{
                        background-image: url(image/skyscrapper.png);
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                       
                    }
        .bg-About {
            background-color: rgb(10, 0, 12);
        }
   
                    
        /*NAVBAR*/
        .navbar-nav .nav-link {
    font-size: 1.2rem;
    color: var(--lightpink-color);
    border: 1px solid white; /* Add this line to add a white border */
}


.cardE {
  position: relative;
  width: 400px;
  height: 300px;
  background:  white;
  border-radius: 10px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  overflow: hidden;
  -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.cardE img{
  width: 120px;
  fill: #333;
  -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.cardE:hover {
  -webkit-transform: rotate(-5deg) scale(1.1);
      -ms-transform: rotate(-5deg) scale(1.1);
          transform: rotate(-5deg) scale(1.1);
  -webkit-box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.card__contentE {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%) rotate(-45deg);
      -ms-transform: translate(-50%, -50%) rotate(-45deg);
          transform: translate(-50%, -50%) rotate(-45deg);
  width: 100%;
  height: 100%;
  padding: 20px;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  background-color: #fff;
  opacity: 0;
  -webkit-transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
  transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
}

.cardE:hover .card__contentE {
  -webkit-transform: translate(-50%, -50%) rotate(0deg);
      -ms-transform: translate(-50%, -50%) rotate(0deg);
          transform: translate(-50%, -50%) rotate(0deg);
  opacity: 1;
}

.card__titleE {
  margin: 0;
  font-size: 23px;
  color: #333;
  font-weight: 700;
}
.card__YearE {
  margin: 0;
  font-size: 15px;
  color: #333;
  font-weight: 700;
}

.card__descriptionE {
  margin: 10px 0 0;
  font-size: 14px;
  color: #777;
  line-height: 1.4;
}

.cardE:hover img {
  scale: 0;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
}

.cardskill{
    transition: transform 0.3s ease;
}
.cardskill:hover {
        transform: scale(1.1);
        }

.ihover{
    transition: transform 0.3s ease;
}
.ihover:hover{
    transform: scale(1.1);
}
      
    </style>
</head>
<body>

   <!--Nav-->
<nav class="navbar navbar-dark fixed-top">
    <div class="container-xl">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class='bx bx-menu pinkText'></i>
        </button>
        <div class="collapse navbar-collapse shadow" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link darkPurp p-2" href="#Hero">Hero</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link darkPurp p-2" href="#About">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link darkPurp p-2" href="#Education">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link darkPurp p-2" href="#Skills">Skills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link darkPurp p-2" href="#Project">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link darkPurp p-2" href="#Contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  darkPurp p-2" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Nav-->

    <!--Hero-->
<section class="Hero bg-Hero" id="Hero">
        <div class="container  d-flex justify-content-center align-items-center min-vh-100">
          
                <div class="hero-Info fw-bold rounded ">
                    <p class="pinkText mb-1 fs-4">Hi, I'm</p>
                    <h1 class="text-uppercase lightPinkText fs-1 fw-bold" data-aos="fade-right" data-aos-duration="2000"><?= $getHeroName?></h1>
                    <p class="lightPinkText " ><?= $getHeroDesc?></p>
                    <a class="btn darkPurp text-white fw-bold" href="file/BALASA_RESUME.pdf">My RESUME</a>
                </div>
        </div>
    
</section>
        <!--Hero-->
<?php
    $sqlGetAbout = "SELECT * FROM tbl_aboutme";
    $resGETAbout = mysqli_query($conn,$sqlGetAbout);
    $rowGetAbout = mysqli_fetch_assoc($resGETAbout);
    $aboutImage = $rowGetAbout['image'];
    $aboutDesc = $rowGetAbout['description'];
?>

  <!--AboutME--> 
<section class="About" id="About">
    <div class="container-lg ">
        <div class="row mt-5 min-vh-100 align-items-center align-content-center">
            
            <div class="col-md-6 text-center">
                <div data-aos="zoom-in-up" data-aos-duration="2000">
                    <!-- Apply border-radius to make the image oval -->
                    <img src="image/about/<?= $aboutImage ?>" class="img-fluid img-thumbnail rounded-circle" width="70%" alt="">
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div data-aos="zoom-in-up" data-aos-duration="2000">
                    <!-- Added margin-bottom to create separation -->
                    <h2 class="pinkText mb-10" style="font-size:40px">ABOUT ME</h2><br><br>
                    <!-- Added margin-bottom to create separation -->
                    <p class="text-center pinkText mb-10" style="text-align: justify; font-size: 20px;"><?= $aboutDesc ?></p>
                    <!-- You can adjust the font-size and margin-bottom values as needed -->
                </div>
                
            </div>
           
        </div>
    </div>
</section>
<!--AboutME-->
<!--Education-->
<section class="Education" id="Education">
    <div class="container-lg min-vh-100 justify-content-center align-content-center">
        <div class="row mt-5 white rounded">
            <div class="col-12 text-center mb-4"> <!-- Added text-center class -->
                <h2 class="lightPinkText" style="font-size: 80px";>EDUCATION</h2><br><br><br>
            </div>
            <!-- Query to get schools -->
            <?php
                $sqlGetSchool = "SELECT * FROM tbl_education";
                $resGetSchool = mysqli_query($conn, $sqlGetSchool);
                $countGetSchool = mysqli_num_rows($resGetSchool);
                if($countGetSchool > 0){
                    while($rowGetSchool = mysqli_fetch_assoc($resGetSchool)){
                        $getSchoolImage = $rowGetSchool['image'];
                        $getSchoolName = $rowGetSchool['school'];
                        $getSchoolDesc = $rowGetSchool['description'];
                        $getSchoolYear = $rowGetSchool['year'];
            ?>
            <div class="col-sm-4 mb-3 d-flex justify-content-center">
                <div class="cardE">
                    <img src="image/educ/<?= $getSchoolImage?>" class="img-fluid"  alt="">
                    <div class="card__contentE">
                        <p class="card__titleE"><?= $getSchoolName?></p>
                        <p class="card__yearE"><?= $getSchoolYear?></p>
                        <p class="card__descriptionE"><?= $getSchoolDesc?></p>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</section>
<!--Education-->

<!--Skills-->
<section class="Skills" id="Skills">
    <div class="container-lg min-vh-100 justify-content-center align-content-center">
        <div class="row mt-5 white rounded">
            <div class="col-12 text-center mb-4"> <!-- Added text-center class -->
                <h2 class="lightPinkText" style="font-size: 80px">SKILLS</h2><br><br><br>
            </div>
            <?php
                $sqlGetSkill= "SELECT * FROM tbl_skills";
                $resGetSkill = mysqli_query($conn, $sqlGetSkill);
                $countGetSkill = mysqli_num_rows($resGetSkill);
                if($countGetSkill > 0){
                    while($rowGetSkill = mysqli_fetch_assoc($resGetSkill)){
                        $getSkill = $rowGetSkill['skill'];
                        $getSkillDesc = $rowGetSkill['skill_Description'];
                        $getSkillLevel = $rowGetSkill['skill_Level'];
            ?>
            <div class="col-md-4 mb-2">
                <div class="card cardskill">
                    <div class="card-body text-center">
                        <h5 class="card-title darkPurp p-2 rounded lightPinkText"><?= $getSkill?></h5>
                        <p class="card-text border-bottom"><?= $getSkillDesc?></p>
                        <p class="card-text fw-bold"><?= $getSkillLevel?></p>   
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</section>
<!--Skills-->

<!--project-->
<section class="Project darkPurp rounded" id="Project">
    <div class="container-fluid min-vh-100 justify-content-center align-content-center">
        <div class="row lightPinkText">
            <h3 class="text-center mb-5" style="font-size: 80px">PROJECTS</h3>
            <?php 
                $sqlGetProject = "SELECT * FROM tbl_project";
                $resGetProject = mysqli_query($conn, $sqlGetProject);
                $countGetProject = mysqli_num_rows($resGetProject);
                if($countGetProject > 0)
                {
                    while($rowGetProject = mysqli_fetch_assoc($resGetProject))
                    {
                        $getProjectID = $rowGetProject['id'];      
                        $getProjectImage = $rowGetProject['project_Image'];
                        $getProjectName = $rowGetProject['project_Name'];
                        $getProjectDesc = $rowGetProject['project_Desc'];
                        ?>
                            <div class="col-md-4 mb-2 px-5 text-center">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal<?= $getProjectID?>">
                                <img src="image/project/<?= $getProjectImage ?>" class=" ihover " width="350px" height="200px"   alt="">
                                </button>
                            </div>

                            <!-- Modal -->
                                <div class="modal fade" id="modal<?= $getProjectID?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header darkPurp">
                                        <h5 class="modal-title lightPinkText" id="exampleModalLabel"><?= $getProjectName?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                   
                                                <p class="fs-6 fw-bold text-black"><?= $getProjectDesc?></p>
                                         
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            
                        <?php
                    }
                }
            ?>



        </div>

    </div>
</section>
<!--project-->

<?php
    $sqlGetContact = "SELECT * FROM tbl_contact";
    $resGetContact = mysqli_query($conn, $sqlGetContact);
    $rowGetContact = mysqli_fetch_assoc($resGetContact);
    $getEmail = $rowGetContact['email'];
    $getPhone = $rowGetContact['phone'];
?>

<!--FOOTER-->
<footer id="Contact">
    <div class="container-fluid lightPinkText pt-2">
        <div class="row text-center ">
            <div class="col-md-6 pinkText">
                <i class='bx bx-envelope fs-3' ></i><p><?= $getEmail?></p>
            </div>
            <div class="col-md-6 pinkText">
                <i class='bx bxs-contact fs-3'></i> <p><?= $getPhone?></p>
            </div>
        </div>
    </div>
</footer>
<!--FOOTER-->




                                

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
</body>
</html>