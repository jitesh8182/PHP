<?php include_once('connection.php'); 
    if(isset($_GET['updateid']))
    {
	   $uid=base64_decode($_GET['updateid']);
       $res=mysqli_fetch_array(mysqli_query($conn,"select * from emp where id='$uid'"));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" href="regstyle.css">
</head>
<body>
<div> 
            <form name="reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <fieldset class="main"> 
                  <legend class="title">Registration form</legend> 
                        <fieldset class="sub">
                            <legend class="sub-title">Name <span id="error-name"></span></legend>
                            <input type="hidden" name="hid" value="<?php echo $res['id'];?>">
				            <input type="text" name="name" value="<?php echo $res['name']; ?>" id="idname" >    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Department<span id="error-city"></span></legend>
				            <select id="idcity" name="department">
                                <option disabled selected value="f">--Choose Department--</option>
                                <option value="general" <?php if($res['department'] == "general") {echo "selected";}?>>General Management</option>
                                <option value="marketing" <?php if($res['department'] == "marketing") {echo "selected";}?>>Marketing Department</option>
                                <option value="operations" <?php if($res['department'] == "operations") {echo "selected";}?>>Operations Department</option>
                                <option value="finance" <?php if($res['department'] == "finance") {echo "selected";}?>>Finance Department</option>
                                <option value="sales" <?php if($res['department'] == "sales") {echo "selected";}?>>Sales Department</option>
                            </select>
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Designation<span id="error-city"></span></legend>
				            <select id="idcity" name="designation">
                                <option disabled selected value="f">--Choose Designation--</option>
                                <option value="tester" <?php if($res['designation'] == "tester") {echo "selected";}?>>Tester</option>
                                <option value="programmer" <?php if($res['designation'] == "programmer") {echo "selected";}?>>Programmer</option>
                                <option value="ca" <?php if($res['designation'] == "ca") {echo "selected";}?>>CA</option>
                                <option value="manager" <?php if($res['designation'] == "manager") {echo "selected";}?>>Manager</option>
                                <option value="developer" <?php if($res['designation'] == "developer") {echo "selected";}?>>Developer</option>
                            </select>
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Basic Salary<span id="error-name"></span></legend>
				            <input type="text" name="salary" value="<?php echo $res['salary']; ?>" id="idname" >    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Gender <span id="error-gender"></span></legend>
				            <label><input type="radio" value="f" id="r1" <?php if($res['gender'] == "f") {echo "checked";} ?> name="gender"> Female</label>
                            <label><input type="radio" value="m" id="r2" <?php if($res['gender'] == "m") {echo "checked";} ?> name="gender"> Male</label>   
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Date Of Birth<span id="error-gender"></span></legend>
                            <input type="date" name="dob" value="<?php echo $res['dob']; ?>" id="">
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Address <span id="error-add"></span></legend>
				            <textarea rows="3" cols="30" id="idadd" name="add" style="resize: none;"><?php echo $res['address']; ?></textarea>    
                        </fieldset>
                        <fieldset class="sub">
                            <?php $exp = explode(",",$res['hobby']); ?>
                            <legend class="sub-title">Hobbies</legend>
                            <input type="checkbox" name="hobby[]" value="sports" id="idsport" <?php if(in_array("sports",$exp)){ echo "checked";} ?>>
                            <label for="sport">Sports</label>
                            <input type="checkbox" name="hobby[]" value="music" id="idmusic" <?php if(in_array("music",$exp)){ echo "checked";} ?>>
                            <label for="music">Music</label>
                            <input type="checkbox" name="hobby[]" value="reading" id="idread" <?php if(in_array("reading",$exp)){ echo "checked";} ?>>
                            <label for="read">Reading</label>
                        </fieldset>
                        <fieldset class="sub"> 
                            <legend class="sub-title"></legend>
                            <input class="btn" id="submit" name="submit" type="submit" value="Update" />
                        </fieldset>
                </fieldset> 
            </form> 
        </div>
        <?php 
            if(isset($_POST['submit'])){
                $upid=$_POST['hid'];
                $name=$_POST['name'];
                $dept=$_POST['department'];
                $desg=$_POST['designation'];
                $sal=$_POST['salary'];
                $gen=$_POST['gender'];
                $dat=$_POST['dob'];
                $add=$_POST['add'];
                $implode = implode(",",$_POST['hobby']);
                if(mysqli_query($conn,"update emp set name='$name',department='$dept',designation='$desg',salary='$sal',gender='$gen',dob='$dat',address='$add',hobby='$implode' where id='$upid'")){
                    echo '<script type="text/javascript">alert("Data Updated....!!")
                    window.location.replace("display.php");</script>';
                }else{
                    header("location:update.php"); 
                }
            }
        ?>
</body>
</html>