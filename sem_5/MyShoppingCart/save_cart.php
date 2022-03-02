<?php
    session_start();
    if(isset($_POST['save'])){
        foreach($_POST['indexes'] as $i){
            $_SESSION['qty_array'][$i]=$_POST['qty_'.$i];
        }
        $_SESSION['message'] = 'Cart updated successfully';
		header('location: view_cart.php');
    }
?>