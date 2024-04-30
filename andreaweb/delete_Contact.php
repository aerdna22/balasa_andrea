<?php
include('session.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM tbl_contact WHERE id='$id'";
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