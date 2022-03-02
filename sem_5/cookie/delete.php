<?php 
    include_once('connection.php');
    if(isset($_GET['deleteid']) && !empty($_GET['deleteid'])){
        $dltid=base64_decode($_GET['deleteid']);
        if(mysqli_query($conn,"delete from emp where id='$dltid'")){
            echo '<script type="text/javascript">window.location.replace("display.php");</script>';
        }else{
            header("delete.php");
        }
    }
?>