<?php 
    $name=array("Surat","Rajkot","BhavNagar","Ahemdabad","Palanpur");
    $result='';
    if(strlen(trim($_GET['data']))>0){
        for($i=0;$i<count($name);$i++){
            if(stristr($name[$i],$_GET['data'])){
                $result.=$name[$i]."\n";
            }
        }
    }
    echo nl2br($result);
?>