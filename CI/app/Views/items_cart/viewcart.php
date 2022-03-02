<?php $session=session();?>
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
    <div class="row" style="margin-left:20%;">
		<div class="col-sm-8 col-sm-offset-2">
            <?= form_open() ?>
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
                                if(isset($rslt)){
                                    foreach($rslt as $res){      
                        ?>
                        <tr>
                            <td>
                                <a href="<?= base_url(); ?>/index.php/practicecontroller/redictUsr?delid=<?php echo $res[0]->itm_id; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                            </td>
                            <td><?php echo $res[0]->itm_name; ?></td>
                            <td><?php echo number_format($res[0]->itm_price,2);?></td>
                            <input type="hidden" name="indexes[]" value="<?php echo $index;?>">
                            <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                            <td><?php echo number_format($_SESSION['qty_array'][$index]*$res[0]->itm_price,2); ?></td>
                            <?php $total += $_SESSION['qty_array'][$index]*$res[0]->itm_price; ?>
                        </tr>
                        <?php
                        $index++;
                        }
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
                <a href="<?= base_url(); ?>/index.php/practicecontroller/redictUsr" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Back</a>
                <button type="submit" class="btn btn-success" name="save"><i class="fas fa-save"></i>&nbsp;Save Changes</button>
                <a href="<?= base_url(); ?>/index.php/practicecontroller/cartdata?data=<?=1;?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> Clear Cart</a>
			    <a href="checkout.php" class="btn btn-success"><i class="fas fa-list"></i> Checkout</a>
            <?= form_close() ?>
        </div>
    </div>
</body>
</html>