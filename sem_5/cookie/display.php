<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="regstyle.css">
</head>
<body>
<ul>
  <li><a class="active" href="index.php">Login</a></li>
  <li><a href="emp_registration.php">Registration</a></li>
  <li><a href="search.php">Search</a></li>
  <li><a href="display.php">Display</a></li>
</ul>
<center>
    <table border="1" width="50%" cellpadding="15" cellspacing="9">
        <tr>
                <td><span>Name</span></td>
                <td><span>Department</span></td>
                <td><span>Designation</span></td>
                <td><span>Salary</span></td>
                <td><span>Gender</span></td>
                <td><span>Date Of Birth</span></td>
                <td><span>Address</span></td>
                <td><span>Hobby</span></td>
                <td colspan="2" style="text-align: center;"><span>Action</span></td>
        </tr>
<?php
    $run = mysqli_query($conn,"select * from emp");
    while($res=mysqli_fetch_array($run))
    {	
        ?>
        <tr>	
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['department']; ?></td>
            <td><?php echo $res['designation']; ?></td>
            <td><?php echo $res['salary']; ?></td>
            <td><?php echo $res['gender']; ?></td>
            <td><?php echo $res['dob']; ?></td>
            <td><?php echo $res['address']; ?></td>
            <td><?php echo $res['hobby']; ?></td>
            <td><a href="delete.php?deleteid=<?php echo base64_encode($res['id']); ?>" onclick="return confirm('are you sure you want to delete this data..?')"
			>delete</a></td>
            <td><a href="update.php?updateid=<?php echo base64_encode($res['id']); ?>">update</a></td>
        </tr>
    <?php } ?>
</table>
</center>
</body>
</html>