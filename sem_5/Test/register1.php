<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="regstyle.css">
    </head>
    <body>  
        <div> 
            <form name="reg" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <fieldset class="main"> 
                  <legend class="title">Registration form</legend> 
                        <fieldset class="sub">
                            <legend class="sub-title">First Name <span id="error-name"></span></legend>
				            <input type="text" name="name" id="idname" >    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Email <span id="error-email"></span></legend>
				            <input type="text" name="email" id="idemail" >    
                        </fieldset >
                        <fieldset class="sub">
                            <legend class="sub-title">Age <span id="error-age"></span></legend>
				            <input type="text" size="2" maxlength="2" name="age" id="idage">    
                        </fieldset >
                        <fieldset class="sub">
                            <legend class="sub-title">Mobile no <span id="error-mobile"></span></legend>
				            <input type="text" size="10" maxlength="10" name="mobile" id="idmobile">    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Gender <span id="error-gender"></span></legend>
				            <label><input type="radio" value="f" id="r1" name="gender"> Female</label>
                            <label><input type="radio" value="m" id="r2" name="gender"> Male</label>   
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">Address <span id="error-add"></span></legend>
				            <textarea rows="3" cols="30" id="idadd" name="add" style="resize: none;"></textarea>    
                        </fieldset>
                        <fieldset class="sub">
                            <legend class="sub-title">City <span id="error-city"></span></legend>
				            <select id="idcity" name="city">
                                <option disabled selected value="f">--Choose City--</option>
                                <option value="surat">Surat</option>
                                <option value="new delhi">New Delhi</option>
                                <option value="mumbai">Mumbai</option>
                                <option value="channai">Channai</option>
                                <option value="kolkata">Kolkata</option>
                            </select>
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
        <center>
        <table border="1" cellpadding="5" cellspacing="6">
        <thead>
                <td><span>Name</span></td>
                <td><span>Email</span></td>
                <td><span>Age</span></td>
                <td><span>Mobile</span></td>
                <td><span>Gender</span></td>
                <td><span>Address</span></td>
                <td><span>City</span></td>
                <td><span>Hobby</span></td>
        </thead>
        <tbody> 
        <?php 
            if(isset($_POST['submit']) && $_POST['submit']=="Send!"){
                $checkbox1=$_POST['hobby'];  
                $chk="";  
                foreach($checkbox1 as $chk1){  
                    $chk .= $chk1.",";  
                }
                echo "<tr>";
                    echo "<td>".$_POST['name']."</td>";
                    echo "<td>".$_POST['email']."</td>";
                    echo "<td>".$_POST['age']."</td>";
                    echo "<td>".$_POST['mobile']."</td>";
                    echo "<td>".$_POST['gender']."</td>";
                    echo "<td>".$_POST['add']."</td>";
                    echo "<td>".$chk."</td>";
                    echo "<td>".$_POST['city']."</td>";
                echo "</tr>";
            }
        ?>            
         </tbody>
    </table>
    </center> 
    </body>
</html>