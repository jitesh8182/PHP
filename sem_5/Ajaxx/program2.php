<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="ajaxdatabase">
        <select name="city" onchange="showcust(this.value)">
            <option value="Surat">surat</option>
            <option value="Baroda">baroda</option>
            <option value="Bharuch">bharuch</option>
        </select>
    </form>
    <div id="studentdata">
    </div>
</body>
<script>
        function showcust(str){
            var xmlhttp;
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }else if(window.ActiveXObject){
                xmlhttp=new ActiveXObject();
            }else{
                alert('browser not supported..!');
            }
            xmlhttp.onreadystatechange=function () {  
                if(xmlhttp.readyState==4){
                    document.getElementById('studentdata').innerHTML=xmlhttp.responseText;
                }
            }
            var url="hint2.php?data="+str;
            xmlhttp.open("GET",url,true);
            xmlhttp.send(null);
        }
    </script>
</html>