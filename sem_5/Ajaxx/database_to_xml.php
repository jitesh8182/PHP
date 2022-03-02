<?php 
    $cn=mysqli_connect("localhost","root","","mca5");
    $query=mysqli_query($cn,"select *from stud");
    $xml="<data>";
    while($row=mysqli_fetch_row($query)){
        $xml.="<student>";
            $xml.="<rollno>".$row[0]."</rollno>";
            $xml.="<name>".$row[1]."</name>";
            $xml.="<city>".$row[2]."</city>";
        $xml.="</student>";
    }
    $xml.="</data>";
    $file=new SimpleXMLElement($xml);
    if($file->asXML("text.xml")==1){
        ?>
            <script>alert('XML File Created...!!');</script>
        <?php
    }
?>