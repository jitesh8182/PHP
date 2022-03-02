<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>searching</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style>
        ul {
        list-style-type: none !;
        margin: 0;
        padding: 0;
        width: 15%;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
    }

    li a.active {
    background-color: #04AA6D;
    color: white;
    }

    li a:hover:not(.active) {
    background-color: #555;
    color: white;
    }
    </style>
</head>
<ul>
  <li><a class="active" href="index.php">Login</a></li>
  <li><a href="emp_registration.php">Registration</a></li>
  <li><a href="search.php">Search</a></li>
  <li><a href="display.php">Display</a></li>
</ul>
<body>
<form method="post" style="margin-left:800px;" class="form-inline">
	<div class="form-group">
		<input type="text" class="form-control" name="searchname" placeholder="Enter Data To be Search.....">
		<input style="margin-left:20px;font-weight:bold;" type="submit" class="btn btn-info" name="SEARCH" value="SEARCH">
	</div>
</form>
<?php 
    if(isset($_POST['SEARCH']) && !empty($_POST['SEARCH']) && $_POST['SEARCH']=="SEARCH")
	{
			$search_name = $_POST['searchname'];
			if(!empty($search_name))
			{
                $search=mysqli_query($conn,"select * from emp
                where name like '%".$search_name."%' or department like '%".$search_name."%' 
                or designation like '%".$search_name."%' or salary like '%".$search_name."%' 
                or gender like '%".$search_name."%' or dob like '%".$search_name."%'
                or address like '%".$search_name."%' or hobby like '%".$search_name."%'");
			?>
            <center>
			<table border="3" cellspacing="20" cellpadding="8" style="border-color:green;">
			<?php
				if(mysqli_num_rows($search)>0)
				{
			?>
					<tr align="center" style="border-color:red;">
						<th style="background-color:#eee;color:green;" colspan="8">Searched Data</th>
					</tr>
					<tr align="center">
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Address</th>
                        <th>Hobby</th>
					</tr>
				<?php
					while($res=mysqli_fetch_array($search))
					{
					?>
						<tr align="center">
                                <td><?php echo $res['name']; ?></td>
                                <td><?php echo $res['department']; ?></td>
                                <td><?php echo $res['designation']; ?></td>
                                <td><?php echo $res['salary']; ?></td>
                                <td><?php echo $res['gender']; ?></td>
                                <td><?php echo $res['dob']; ?></td>
                                <td><?php echo $res['address']; ?></td>
                                <td><?php echo $res['hobby']; ?></td>
						</tr>
				<?php
					}
					?>
			</table>
            </center>
			<?php
			}
			else
			{
				?>
					<table style="border-color:red;" border="2" cellspacing="15" cellpadding="6">
						<tr style="border-color:red;">
							<th style="color:red;"><?php echo "No Records Found";?></th>
						</tr>
					</table>
				<?php
			}
		}
		else
		{
			?>
					<table style="border-color:red;" border="2" cellspacing="15" cellpadding="6">
						<tr style="border-color:red;">
							<th style="color:red;"><?php echo "No Records Found";?></th>
						</tr>
					</table>
				<?php
			
		}
	}
?>
</center>
<center style="margin-top:50px;">
<table border="2" cellspacing="9" cellpadding="15">
		<tr>
			<tr align="center">
				<th colspan="8">Whole Records</th>
			</tr>
            <th>Name</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Salary</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Address</th>
            <th>Hobby</th>
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
			</tr>
		<?php 
	}?>
	</table>
</center>
</body>
</html>