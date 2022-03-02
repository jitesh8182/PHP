<?php
    include_once('connection.php');
    if(isset($_POST['submit'])){
        $unam = mysqli_real_escape_string($conn,stripcslashes($_POST['uname']));
        $pass = mysqli_real_escape_string($conn,stripcslashes($_POST['password']));
        $result = mysqli_query($conn,"select * from login where user_name = '$unam' and user_pass = '$pass'"); 
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if(mysqli_num_rows($result)==1){
            if(!empty($_POST['remember'])){
                setcookie("usercookie",$_POST['uname'],time() + (86400 * 30));
                setcookie("passcookie",$_POST['password'],time() + (86400 * 30));
                setcookie("remembercookie","checked='checked'", time() + (86400 * 30));
            }else{
                setcookie("usercookie","",time() - (86400 * 30));
                setcookie("passcookie","",time() - (86400 * 30));
            }
            header("location:emp_registration.php");
        }else{
            echo '<script type="text/javascript">alert("Invalid UserName Or Password")
                    window.location.replace("index.php");</script>';
        }
    }
?>