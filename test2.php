<?php
$con = mysqli_connect("localhost", "waltonm", 'databa$e20', "waltonm_cafe");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else{
    echo "connected to database";
    echo "<p>Hello World - how are you today?";

    $fruit = "Apple";
    echo "<p>$fruit is my favourite fruit";

    $age = "17";
    echo "<p>I am $age years old";

    $name = "Marc";
    echo "<h1>Welcome ".$name."</h1>";
}

?>