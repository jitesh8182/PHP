<?php include_once('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="regstyle.css">
    </head>
    <body>  
    <ul>
        <li><a class="active" href="index.php">Login</a></li>
        <li><a href="emp_registration.php">Registration</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="display.php">Display</a></li>
    </ul>
        <div> 
            <form name="reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <fieldset class="main"> 
                  <legend class="title">Registration form</legend> 
                        <fieldset class="sub">
                            <legend class="sub-title">Name <span id="error-name"></span></legend>
				            <input type="text" name="name" id="idname" >    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Department<span id="error-city"></span></legend>
				            <select id="idcity" name="department">
                                <option disabled selected value="f">--Choose Department--</option>
                                <option value="general">General Management</option>
                                <option value="marketing">Marketing Department</option>
                                <option value="operations">Operations Department</option>
                                <option value="finance">Finance Department</option>
                                <option value="sales">Sales Department</option>
                            </select>
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Designation<span id="error-city"></span></legend>
				            <select id="idcity" name="designation">
                                <option disabled selected value="f">--Choose Designation--</option>
                                <option value="tester">Tester</option>
                                <option value="programmer">Programmer</option>
                                <option value="ca">CA</option>
                                <option value="manager">Manager</option>
                                <option value="developer">Developer</option>
                            </select>
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Basic Salary<span id="error-name"></span></legend>
				            <input type="text" name="salary" id="idname" >    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Gender <span id="error-gender"></span></legend>
				            <label><input type="radio" value="f" id="r1" name="gender"> Female</label>
                            <label><input type="radio" value="m" id="r2" name="gender"> Male</label>   
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Date Of Birth<span id="error-gender"></span></legend>
                            <input type="date" name="dob" id="">
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Address <span id="error-add"></span></legend>
				            <textarea rows="3" cols="30" id="idadd" name="add" style="resize: none;"></textarea>    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Hobbies</legend>
                            <input type="checkbox" name="hobby[]" value="sports" id="idsport">
                            <label for="sport">Sports</label>
                            <input type="checkbox" name="hobby[]" value="music" id="idmusic">
                            <label for="music">Music</label>
                            <input type="checkbox" name="hobby[]" value="reading" id="idread">
                            <label for="read">Reading</label>
                        </fieldset>
                        <fieldset class="sub"> 
                            <legend class="sub-title"></legend>
                            <input class="btn" id="submit" name="submit" type="submit" value="Send!" />
                        </fieldset>
                </fieldset> 
            </form> 
        </div>
        <?php 
            if(isset($_POST['submit'])){
                $name=$_POST['name'];
                $dept=$_POST['department'];
                $desg=$_POST['designation'];
                $sal=$_POST['salary'];
                $gen=$_POST['gender'];
                $dat=$_POST['dob'];
                $add=$_POST['add'];
                $implode = implode(",",$_POST['hobby']);
                if(mysqli_query($conn,"insert into emp(name,department,designation,salary,gender,dob,address,hobby)values('$name','$dept','$desg','$sal','$gen','$dat','$add','$implode')")){
                    echo '<script type="text/javascript">alert("Data Inserted....!!")
                    window.location.replace("display.php");</script>';
                }else{
                    header("location:emp_registration.php"); 
                }
            }
        ?>            
    </body>
</html>