<?php
    include_once('connection.php');
    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
        <div class="dishes-block">
            <?php
		    if(isset($_SESSION['message'])){
                    $msg=$_SESSION['message'];
					echo "<script type='text/javascript'>alert('$msg');</script>";
			        unset($_SESSION['message']);
	        }
            ?>
                <div class="cart">
                    <a href="view_cart.php"><i class="fas fa-shopping-cart"></i></a>
                </div>
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event,'Breakfast')" id="defaultOpen">Clothes</button>
                    <button class="tablinks" onclick="openTab(event,'Lunches')">Cosmestics</button>
                    <button class="tablinks" onclick="openTab(event,'Dinner')">Footwear</button>
                </div>
                <hr class="line">
                <div id="Breakfast" class="tabcontent">
                    <?php 
                        $qry=mysqli_query($cn,"select *from product_table where category='clothes'");
                        while($row=mysqli_fetch_assoc($qry)){
                            ?>
                                <div class="item">
                                    <img src="<?php echo $row['photo']; ?>" alt="clothes-image">&nbsp;&nbsp;
                                    <span id="price" class="caption" style="color: white;margin-top:15px;"><?php echo $row['price']; ?>&nbsp;
                                    <a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
                                </div>
                            <?php
                        }
                    ?>
                </div>           
                <div id="Lunches" class="tabcontent">
                    <?php 
                        $qry=mysqli_query($cn,"select *from product_table where category='cosmestic'");
                        while($row=mysqli_fetch_assoc($qry)){
                            ?>
                                <div class="item">
                                    <img src="<?php echo $row['photo']; ?>" alt="clothes-image">&nbsp;&nbsp;
                                    <span id="price" class="caption" style="color: white;margin-top:15px;"><?php echo $row['price']; ?>&nbsp;
                                    <a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                <div id="Dinner" class="tabcontent">
                    <?php 
                        $qry=mysqli_query($cn,"select *from product_table where category='footwear'");
                        while($row=mysqli_fetch_assoc($qry)){
                            ?>
                                <div class="item">
                                    <img src="<?php echo $row['photo']; ?>" alt="clothes-image">&nbsp;&nbsp;
                                    <span id="price" class="caption" style="color: white;margin-top:15px;"><?php echo $row['price']; ?>&nbsp;
                                    <a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
                                </div>
                            <?php
                        }
                    ?>  
                </div>
        </div>
        <script src="main.js"></script>
</body>
</html>