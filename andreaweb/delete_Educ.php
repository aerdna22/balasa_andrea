<?php
include('session.php');
if(isset($_GET['id']) AND isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
            //remove the physical image
            if($image_name != "")
            {
                //image is available. remove it
                $path = "image/educ/".$image_name;
                //remove image
                $remove = unlink($path);

                //if fail to remove  img add error msg stop process
                if($remove == false)
                {
                    die();
                    ?>
                        <script>
                            alert("Deleted.");
                            window.location.href = "<?php echo SITEURL;?>dashboard_Personal.php";
                        </script>
                    <?php
                }
            }
    $sql="DELETE FROM tbl_education WHERE id='$id'";
    $res=mysqli_query($conn, $sql);
    if($res==TRUE){
        ?>
        <script>
            alert("Deleted.");
            window.location.href = "<?php echo SITEURL;?>dashboard_Personal.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Fail to delete.");
            window.location.href = "<?php echo SITEURL;?>dashboard_Personal.php";
        </script>
        <?php
    }
   
  }else{
    header('location:'.SITEURL.'dashboard_Personal.php');
  }
?>