<?php
    include('session.php');
    $sqlcheck = "SELECT * FROM tbl_contact";
    $rescheck = mysqli_query($conn, $sqlcheck);
    $countcheck = mysqli_num_rows($rescheck);
    if($countcheck > 0)
    {
        ?>
        <script>
          alert("You already have inputs on the Contact section, please just edit it or delete it before you can input again.");
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
            <a href="dashboard_Personal.php" class="navbar-brand">Back</a>
        </div>
    </nav>
    <main>
    <h1 class="text-center">Add Contact</h1>
        <div class="container m-5 text-center">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-">
                            <h3 class="">Phone number</h3>
                            <input type="text" class="form-control" id="phone" placeholder="" name="phone" >
                    </div>
                    <div class="col-md-">
                            <h3 class="">Email</h3>
                            <input type="email" class="form-control" id="" placeholder="" name="email" required>
                    </div>
                   

                    <div class="mt-2 d-grid">
                        <button class="btn btn-success" name="btn-add">Submit</button>
                    </div>
                </div>     
            </form>
            
            <?php 
                if(isset($_POST['btn-add']))
                {
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];

                    $sql="INSERT INTO tbl_contact SET
                            phone= '$phone',
                            email= '$email'

                    ";
                    $res = mysqli_query($conn, $sql);
                    if($res == TRUE)
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
                        window.location.href = "<?php echo SITEURL;?>add_Contact.php";
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