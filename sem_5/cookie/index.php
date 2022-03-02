<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        margin: 0px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .main{
        margin: auto;width: 30%;
        border:2px solid gray;
        border-radius: 20px;
    }
    .sub{
        border: none;
        transition: all 1s ease-in-out;
    }
    .sub:focus-within .sub-title{ 
        color: black;
    }
    input[type="text"]:focus-within ,input[type="password"]:focus-within{
        box-shadow: 0px 0px 5px green ;
    }
    input[type="text"],input[type="password"]{
        outline: none;
        border: 1px solid gray;
        border-radius: 5px;
        width: 95%;
        padding: 8px;
        font-size: medium;
    }
    .title{
        font-size: larger;
        color: blue;
        text-align: center;
    }
    .sub-title{
        font-size: medium;
        color: green;
        transition: all 0.3s ease-in-out;
    }
    .btn:hover{
        color:white;
        background-color: green;
        border-radius: 25px;
    }
    .btn{
        width: 100%;
        padding: 8px;   
        cursor: pointer;
        font-size: large;
        color:green;
        outline:none;border: 2px solid green;
        border-radius: 5px;
        background-color: white;
        transition: all 0.5s ease;
    }
</style>
<body>
<div> 
    <form name="reg" action="login_process.php" method="post"> 
        <fieldset class="main"> 
                <legend class="title">Login</legend> 
                <fieldset class="sub">
                    <legend class="sub-title">User Name</legend>
                    <input type="text" name="uname" value="<?php if(isset($_COOKIE['usercookie'])){ echo $_COOKIE['usercookie']; } ?>">    
                </fieldset>
                <fieldset class="sub">
                    <legend class="sub-title">Password</legend>
                    <input type="password" name="password" value="<?php if(isset($_COOKIE['passcookie'])){ echo $_COOKIE['passcookie']; } ?>">    
                </fieldset >
                <fieldset class="sub">
                    <input type="checkbox" name="remember" <?php if(isset($_COOKIE['remembercookie']) && isset($_COOKIE['usercookie']) && isset($_COOKIE['passcookie']) ){ echo $_COOKIE['remembercookie']; } ?>> Remember me
                </fieldset>
                <fieldset class="sub"> 
                    <legend class="sub-title"></legend>
                    <input class="btn" id="submit" name="submit" type="submit" value="Sign In" />
                </fieldset>
        </fieldset> 
    </form>
</div>
</body>
</html>