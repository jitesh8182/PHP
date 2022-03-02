<?php
    $cn=mysqli_connect("localhost","root","","mca5");
    $city=$_GET['data'];
    $res=mysqli_query($cn,"select  *from stud where city='$city'");
    echo "<br>";
    echo "<table border='1'>";
        echo "<tr><td>RollNo</td><td>Name</td><td>City</td></tr>";
        while($row=mysqli_fetch_row($res)){
            echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
        }
    echo "</table>";
?>