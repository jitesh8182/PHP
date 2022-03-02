<?php $session=session(); 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart']=array();
}
unset($_SESSION['qty_array']);
/*base_url() .'/index.php/practicecontroller/openupdform?update_id='. base64_encode($row->itm_id);*/?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>User Dashboard</title>
</head>
<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url() ?>/upload/admin.png" width="30" height="30" class="d-inline-block align-top" alt="">
      <?php
        if(isset($_SESSION['message'])){
            $msg=$_SESSION['message'];
            echo "<script type='text/javascript'>alert('$msg');</script>";
            unset($_SESSION['message']);
        }
        if ($session->has('User')) {
            echo $session->get('User'); 
        }         
      ?>
    </a>
    <a style="color: black;font-size:25px;flex:auto;" href="<?= base_url() ?>/index.php/practicecontroller/cartdata"><i class="fas fa-shopping-cart"></i></a>
    <?= form_open(); ?> 
        <input type="submit" name="loginout" class="btn btn-danger" value="LogOut"> 
    <?= form_close(); ?>
  </nav><br><br>
  <?php 
    if (isset($products)) {
      foreach ($products as $field) {
  ?>
      <div class="card" style="margin:10px;width: 18rem;float:left;">
          <img class="card-img-top" alt="Card image cap" src="<?=base_url() .'/'. $field->itm_img;?>" width="150" height="150">
            <div class="card-body">
              <?= form_open() ?>
                  <h5 class="card-title"><?= $field->itm_name; ?></h5><br>
                  <input type="hidden" name="id" value="<?= $field->itm_id; ?>" >
                  <span><?= "$". $field->itm_price ?></span>
                  <input type="submit" name="addcart" class="btn btn-primary" value="Add to Cart">
              <?= form_close() ?>
            </div>
      </div>
  <?php
      }
    }
  ?>
</body>
</html>