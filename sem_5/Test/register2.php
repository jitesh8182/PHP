<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form</title>
    <style>
        body{
			font-family: "comic sans ms", sans serif;
			background-color: lightgreen;
			margin: 0;
		}
		h2{
			background-color: forestgreen;
			color: white;
			padding: 10px;
			text-align: center;
		}
		td{
			padding: 7px;
		}
		input{
			height: 30px;
			border-radius: 10px;
			border: none;
			
		}
		input:focus{
			outline: none;
			border: 1px solid forestgreen;
		}
		input:hover{
			box-shadow: 5px 5px 5px black;
		}
		.button{
			background-color: forestgreen;
			color:#fff;
			border: none;
			padding: 7px
		}
		.button:hover {
			cursor: pointer;
			box-shadow: 5px 5px 5px red;
		}
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div id="personal-details">
            <h2 align="center">Personal Details</h2>
            <table width="100%">
				<tr>
					<td>First Name</td>
					<td>
						<input type="text" name="first_name" placeholder="First Name" size="25">
					</td>
					<td>Middle Name</td>
					<td>
						<input type="text" name="middle_name" placeholder="Middle Name" size="25">
					</td>
					<td>Last Name</td>
					<td>
						<input type="text" name="last_name" placeholder="Last Name" size="25">
					</td>
				</tr>
				<tr>
					<td>Father's Name</td>
					<td>
						<input type="text" name="fath_name" placeholder="Father's Name" size="25">
					</td>
					<td>Mother's Name</td>
					<td>
						<input type="text" name="moth_name" placeholder="Mother's Name" size="25">
					</td>
				</tr>
				<tr>
					<td>Date of Birth</td>
					<td>
						<input type="date" name="dob">
					</td>
					<td>Place of Birth</td>
					<td>
						<input type="text" name="place" placeholder="Place of Birth" size="25">
					</td>
				</tr>
				<tr>
					<td colspan="2">Select Gender</td>
					<td>
						<input type="radio" name="gender" value="male">Male
					</td>
					<td>
						<input type="radio" name="gender" value="feale">Female
					</td>
				</tr>
				<tr>
					<td>Contact Details</td>
				</tr>
				<tr>
					<td>Mobile Number</td>
					<td>
						<input type="number" name="mobile" placeholder="9831****" size="25">
					</td>
					<td>Email Id</td>
					<td>
						<input type="text" name="email" placeholder="your id@gmail.com" size="25">
					</td>
				</tr>
				<tr>
					<td colspan="2">Language Known</td>
					<td>
						<input type="checkbox" name="hobby[]" value="english">English
					</td>
					<td>
						<input type="checkbox" name="hobby[]" value="bengali">Bengali
					</td>
					<td>
						<input type="checkbox" name="hobby[]" value="hindi">Hindi
					</td>
				</tr>
				<tr>
					<td colspan="2">Your Mother Tongue</td>
					<td>
						<select name="language">
							<option value="english">English</option>
							<option value="bengali">Bengali</option>
							<option value="hindi">Hindi</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Aadhar Number</td>
					<td>
						<input type="number" name="adharcard" placeholder="Aadhar Number" size="25">
					</td>
					<td>Pan Card Number</td>
					<td>
						<input type="number" name="pancard" placeholder="Pan Card Number" size="25">
					</td>
				</tr>
                <tr>
					<td></td>
					<td>
						<input type="Submit" name="submit" value="Submit" class="button">
					</td>
					<td>
						<input type="Reset" value="Reset" class="button">
					</td>
					<td></td>
				</tr>
			</table>
		</div>
    </form>
    <center>
        <table border="1" cellpadding="5" cellspacing="6">
        <thead>
                <td><span>First Name</span></td>
                <td><span>Middle Name</span></td>
                <td><span>Last Name</span></td>
                <td><span>Father Name</span></td>
                <td><span>Mother Name</span></td>
                <td><span>Date Of Birth</span></td>
                <td><span>Place Birth</span></td>
                <td><span>Gender</span></td>
                <td><span>Mobile</span></td>
                <td><span>Email</span></td>
                <td><span>Language Known</span></td>
                <td><span>Mother Tongue</span></td>
                <td><span>adharcard</span></td>
                <td><span>Pancard</span></td>        
        </thead>
        <tbody> 
        <?php 
            if(isset($_POST['submit']) && $_POST['submit']=="Submit"){
                $checkbox1=$_POST['hobby'];  
                $chk="";  
                foreach($checkbox1 as $chk1){  
                    $chk .= $chk1.",";  
                }
                echo "<tr>";
                    echo "<td>".$_POST['first_name']."</td>";
                    echo "<td>".$_POST['middle_name']."</td>";
                    echo "<td>".$_POST['last_name']."</td>";
                    echo "<td>".$_POST['fath_name']."</td>";
                    echo "<td>".$_POST['moth_name']."</td>";
                    echo "<td>".$_POST['dob']."</td>";
                    echo "<td>".$_POST['place']."</td>";
                    echo "<td>".$_POST['gender']."</td>";
                    echo "<td>".$_POST['mobile']."</td>";
                    echo "<td>".$_POST['email']."</td>";
                    echo "<td>".$chk."</td>";
                    echo "<td>".$_POST['language']."</td>";
                    echo "<td>".$_POST['adharcard']."</td>";
                    echo "<td>".$_POST['pancard']."</td>";
                echo "</tr>";
            }
        ?>            
         </tbody>
    </table>
    </center>
</body>
</html>