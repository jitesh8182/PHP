<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="HintForm">
        Enter Character : <input type="text" name="txtChar" onkeyup="Hint(this.value)">
        <br>
        <div id="res"></div>    
    </form>
</body>
<script>
    function Hint(str){
        var xmlhttp;
        if(window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }else if(window.ActiveXObject){
            xmlhttp=new ActiveXObject();
        }else{
            alert('browser not support...!!');
        }
        xmlhttp.onreadystatechange=function () {  
            if(xmlhttp.readyState==4){
                document.getElementById('res').innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","Hint.php?data="+str,true);
        xmlhttp.send(null);
    }       
</script>
</html>