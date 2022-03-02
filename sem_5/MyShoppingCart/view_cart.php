<?php 
    include_once('connection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title>View Cart</title>
</head>
<body>
    <?php
        if(isset($_SESSION['message'])){
            $msg=$_SESSION['message'];
			echo "<script type='text/javascript'>alert('$msg');</script>";
			unset($_SESSION['message']);
	    }
    ?>
    <h1 class="page-header text-center">Cart Details</h1>
    <div class="row">
		<div class="col-sm-8 col-sm-offset-2">
            <form action="save_cart.php" method="post">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th></th>
                        <th>Name</th>
				        <th>Price</th>
				        <th>Quantity</th>
				        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <?php 
                         $total = 0;
                            if(!empty($_SESSION['cart'])){
                               
                                $index = 0;
 						        if(!isset($_SESSION['qty_array'])){
 						    	    $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						        }                                
                                $qry=mysqli_query($cn,"select *from product_table where id in (".implode(',',$_SESSION['cart']).")");
                                while($res=mysqli_fetch_assoc($qry)){
                        ?>
                        <tr>
                            <td>
                            <a href="delete_item.php?id=<?php echo $res['id']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo number_format($res['price'],2);?></td>
                            <input type="hidden" name="indexes[]" value="<?php echo $index;?>">
                            <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                            <td><?php echo number_format($_SESSION['qty_array'][$index]*$res['price'],2); ?></td>
                            <?php $total += $_SESSION['qty_array'][$index]*$res['price']; ?>
                        </tr>
                        <?php
                        $index++;
                        }
                            }else{
                                ?>
                                    <tr>
								        <td colspan="4" class="text-center">No Item in Cart</td>
							        </tr>
                                <?php
                            }
                        ?>
                        <tr>
						    <td colspan="4" align="right"><b>Total</b></td>
						    <td><b><?php echo number_format($total, 2); ?></b></td>
					    </tr>
                    </tbody>
                </table>
                <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                <button type="submit" class="btn btn-success" name="save">Save Changes</button>
                <a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
			    <a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
            </form>
        </div>
    </div>
</body>
</html>