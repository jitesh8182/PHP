<?php $session=session(); /*base_url() .'/index.php/practicecontroller/openupdform?update_id='. base64_encode($row->itm_id);*/?>
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
    <title>admin Dashboard</title>
</head>
<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url() ?>/upload/admin.png" width="30" height="30" class="d-inline-block align-top" alt="">
      <?php
        if ($session->has('admin')) {
            echo $session->get('admin'); 
        }         
      ?>
    </a>
    <?= form_open(); ?> 
        <input type="submit" name="logout" class="btn btn-danger" value="LogOut"> 
    <?= form_close(); ?>
  </nav><br>
  &nbsp;&nbsp;
<button id="addcat" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add New Categoty
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open(); ?> 
          <input type="text" name="category">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="add" class="btn btn-primary" value="ADD"> 
        <?= form_close(); ?>   
      </div>
    </div>
  </div>
</div>
<button id="additem" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
  Add New Item
</button>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart(); ?> 
        <center>
          <input type="text" placeholder="Enter Item Name" name="name"><br><br>
          <input type="text" placeholder="Enter Item Price" name="price"><br><br>
          <input type="text" placeholder="Enter Item Quantity" name="qty"><br><br>
          <select name='categr'>
            <?php 
                if (isset($category)) {
                    foreach ($category as $row) {
                        echo "<option value='".$row->cat_id."'>".$row->name."</option>";
                    }
                }
            ?>
          </select><br><br>
          <input type="file" name="image">
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="addi" class="btn btn-primary" value="ADD"> 
        <?= form_close(); ?>   
      </div>
    </div>
  </div>
</div>
<br><br>
<center>
<?= form_open(); ?>
    <select name='cate' style="padding: 2px;">
      <?php 
          if (isset($category)) {
              foreach ($category as $row) {
                  echo "<option value='".$row->cat_id."'>".$row->name."</option>";
              }
          }
      ?>
    </select>
    <input type="submit" name="search" class="btn btn-dark">
<?= form_close(); ?>
</center><br>
<center>
<table cellspacing="10" cellpadding="15" border="2">
  <tbody>
    <tr>
      <th>Item Name</th>
      <th>Item Price</th>
      <th>Item Quantity</th>
      <th>Item Category</th>
      <th>Image</th>
      <th colspan="2">Action</th>
    </tr>
    <?php 
      if($search_data['name']=="") {
        if (isset($display)) {
              foreach ($display as $field) {
                  // $this->session->set('oldfile',$field->itm_img,time()+365); 
                  echo "<tr>";
                      echo "<td>".$field->itm_name."</td><td>".$field->itm_price."</td><td>".$field->itm_qty."</td><td>".$field->name."</td>";
                      ?>
                      <td> 
                          <a href="<?= base_url() .'/'. $field->itm_img; ?>"><img src="<?= base_url() .'/'. $field->itm_img; ?>" width="150" height="150"></a>
                      </td>
                      <td>
                        <a id="additem" data-target="#<?= $field->itm_id; ?>" data-toggle="modal">
                          Edit
                        </a>
<div class="modal fade" id="<?= $field->itm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= form_open_multipart(); ?> 
        <center>
          <input type="hidden" value="<?= $field->itm_img; ?>" name="myimg" >
          <input type="hidden" value="<?= $field->itm_id; ?>" name="id" >
          <input type="text" value="<?= $field->itm_name; ?>" placeholder="Enter Item Name" name="name"><br><br>
          <input type="text" value="<?= $field->itm_price; ?>" placeholder="Enter Item Price" name="price"><br><br>
          <input type="text" value="<?= $field->itm_qty; ?>" placeholder="Enter Item Quantity" name="qty"><br><br>
          <select name='categr'>
              <?php 
                 if (isset($category)) {
                     foreach ($category as $row) {
                       ?>
                        <option value="<?= $row->cat_id;?>" <?php if($field->name==$row->name){ echo "selected"; } ?> ><?= $row->name; ?></option>
                     <?php
                     }
                 }
              ?>
          </select><br><br>
          <input type="file" name="image">&nbsp;<img src="<?= base_url() .'/'. $field->itm_img; ?>" width="150" height="100"></a>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="updatebtn" class="btn btn-primary" value="UPDATE"> 
        <?= form_close(); ?>   
      </div>
    </div>
  </div>
</div>
<?php 
  ?>
        </td>
          <td>
              <a href="#">Delete</a> 
          </td>
          <?php
          }
                  echo "</tr>";
        }
      }else{
        if (isset($display)) {
          $t=0;
          foreach ($display as $row) {
            if ($row->name==$search_data['name']) {
                  echo "<tr>";
                      echo "<td>".$row->itm_name."</td><td>".$row->itm_price."</td><td>".$row->itm_qty."</td><td>".$row->name."</td>";
                        ?>
                      <td> 
                          <a href="<?= base_url() .'/'. $row->itm_img; ?>"><img src="<?= base_url() .'/'. $row->itm_img; ?>" width="150" height="150"></a>
                      </td>
                      <td>
                          <a href="<?= base_url() .'/index.php/practicecontroller/openupdform?update_id='. base64_encode($row->itm_id); ?>">Edit</a>
                      </td>
                      <td>
                          <a href="#">Delete</a> 
                      </td>
                      <?php
                  echo "</tr>";
                  $t=1;
              }
           }
           if ($t==0) {
            echo "<tr><td style='color:red;' class='text-center' colspan='6'>No Data Found</td></tr>";
           }
        }
      }
    ?>
  </tbody>
</table>
</center>
</body>
</html>