<?php
include('session.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM tbl_address WHERE id='$id'";
    $res=mysqli_query($conn, $sql);
    if($res==TRUE){
        ?>
        <script>
            alert("Deleted.");
            window.location.href = "<?php echo SITEURL;?>admin.php";
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Fail to delete.");
            window.location.href = "<?php echo SITEURL;?>admin.php";
        </script>
        <?php
    }
   
  }else{
    header('location:'.SITEURL.'admin.php');
  }
?>