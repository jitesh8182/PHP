<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
    <b>public</b>- the property or method can be accessed from everywhere. This is default <br>
    <b>protected</b>- the property or method can be accessed within the class and by classes derived from that class<br>
    <b>private</b>- the property or method can ONLY be accessed within the class
    </p>
    <?php
       class first{
           function __construct($name,$color){
               $this->name=$name;
               $this->color=$color;
           }
            protected function get_values(){
               echo $this->name."<br>".$this->color;
           }    
       }
       class second extends first{
            function message(){
                $this->get_values();
            }
       }
       $apple=new second("Tomato","Red");
       echo $apple->message();
    ?>
</body>
</html>