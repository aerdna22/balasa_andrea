<?php
include('session.php');
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $sql="SELECT * FROM tbl_contact WHERE id='$id'";
  $res=mysqli_query($conn, $sql);
  $count = mysqli_num_rows($res);
    if($count==1){
      $row=mysqli_fetch_assoc($res);
      $getPhone=$row['phone'];
      $getEmail=$row['email'];

   
    }else{
        ?>
          <script>
              alert("Not found");
              window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
          </script>
        <?php
    }
}else{
  header('location:'.SITEURL.'admin.php');
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
            <a href="<?php echo SITEURL?>dashboard_Personal.php" class="navbar-brand">Back</a>
        </div>
    </nav>
    <main>
    <h1 class="text-center">Add Contact</h1>
        <div class="container m-5 text-center">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-"> <br>
                            <h3 class="">Phone Number</h3>
                            <input type="text" value="<?php echo $getPhone; ?>" class="form-control" id="phone" placeholder="" name="phone" >
                    </div>
                    <div class="col-md-"> <br>
                            <h3 class="">Email</h3>
                            <input type="email" class="form-control" value="<?php echo $getEmail; ?>" id="" placeholder="" name="email" required>
                    </div>
                   

                    <div class="mt-2 d-grid">
                        <button class="btn btn-success" name="btn-edit">Submit</button>
                    </div>
                </div>     
            </form>
            
            <?php
           if(isset($_POST['btn-edit'])){
            $phone = $_POST['phone'];
            $email = $_POST['email'];
 

            $sql2="UPDATE tbl_contact SET
              phone='$phone',
              email='$email'
            
              where id='$id'
            ";
            $res2 = mysqli_query($conn, $sql2);
              if($res2==TRUE){
                ?>
                  <script>
                    alert("Success");
                    window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
                  </script>
                <?php
              }else{
                ?>
                  <script>
                    alert("Fail");
                    window.location.href = "<?php echo SITEURL?>dashboard_Personal.php";
                  </script>
                <?php
              }
          }
          ?>


        </div>
        
    </main>
    <script>
    var phoneInput = document.getElementById('phone');

    phoneInput.addEventListener('input', function(event) {
        var inputValue = event.target.value;
        var numericValue = inputValue.replace(/\D/g, '');

        if (numericValue.length > 11) {
            numericValue = numericValue.slice(0, 11);
        }
        event.target.value = numericValue;
    });
</script>
</body>
</html>