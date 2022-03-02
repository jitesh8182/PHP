<?php 
$conn=mysqli_connect("localhost","root","","project_db");
if(mysqli_connect_errno()){
    die("Failed to connect with MySQL: ". mysqli_connect_error());
}
?>