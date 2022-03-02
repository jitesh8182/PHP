<?php $session=session(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php 
        if ($session->has('User')) {
            echo $session->get('User'); 
        }
    ?>
    <a style="color: black;font-size:25px;flex:auto;" href="<?= base_url() ?>/index.php/practicecontroller/cartdata"><i class="fas fa-shopping-cart"></i></a>
    <?= form_open(); ?> 
        <input type="submit" name="loginout" class="btn btn-danger" value="LogOut"> 
    <?= form_close(); ?>
    <center>
        <?= form_open(); ?>
            <input type="text" name="age" placeholder="Enter Age"><br><br>
            <input type="text" name="loan" placeholder="Enter Loan"><br><br>
            <input type="submit" name="submit" class="btn btn-danger" value="submit"> 
        <?= form_close(); ?>
    </center>
</body>
</html>