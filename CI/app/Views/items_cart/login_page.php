<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page </title>  
<style>   
body {  
  font-family: Calibri, Helvetica, sans-serif;    
}  
button {   
       background-color: #4CAF50;   
       width: 20%;  
        color: white;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
}   
 form { 
     text-align: center;  
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 20%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body> 
    <?= form_open(); ?>   
        <div class="container">   
            <input type="text" placeholder="Enter Username" name="username" required>  <br>   
            <input type="password" placeholder="Enter Password" name="password" required>  <br>
            <button type="submit">Login</button> 
        </div>   
    <?= form_close(); ?>
</body>     
</html>  