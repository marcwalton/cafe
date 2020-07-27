<?php

    $con = mysqli_connect("localhost", "waltonm", 'databa$e20', "waltonm_cafe");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
    else {
        echo "connected to database";
    }

    if(isset($_GET['drink'])){
        $id = $_GET['drink'];
    }else{
        $id = 1;
    }

    $this_drink_query = "SELECT Item, Cost FROM drinks WHERE DrinkID = '"  .$id  . "'";
    $this_drink_result = mysqli_query($con, $this_drink_query);
    $this_drink_record = mysqli_fetch_assoc($this_drink_result);

    $all_drinks_query = "SELECT DrinkID, Item FROM drinks";
    $all_drinks_result = mysqli_query($con, $all_drinks_query);

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <title>  Coffee Shop </title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>
<header>
    <h1> Coffee Shop</h1>
    <nav>
        <ul>
            <li> <a href='index.php'> HOME </a></li>
            <li> <a href='drinks.php'> DRINKS </a></li>
            <li> <a href='orders.php'> ORDERS </a></li>
        </ul>
    </nav>
</header>
<main>
    <h2> Drinks Information</h2>

    <?php

        echo "<p> Drink Name: " . $this_drink_record['Item'] . "<br>";
        echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    ?>

    <h2> Select Another Drink</h2>

    <!--Drinks form-->
    <form name='drinks_form' id='drinks_form' method = 'get' action ='drinks.php'>
        <select id ='drink' name ='drink'>
            <!--options-->
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_result)){
                echo "<option value = '". $all_drinks_record['DrinkID'] . "'>";
                echo $all_drinks_record['Item'];
                echo "</option>";
            }

            ?>
        </select>

        <input type='submit' name='drinks_button' value='Show me the drink information'>
    </form>

    <h2> Search a Drink</h2>

    <form action="" method="post">
        <input type="text" name='search'>
        <input type="submit" name="submit" value="Search">
    </form>



    <?php

    if(isset($_POST['search'])) {
        $search = $_POST['search'];

        $query1 = "SELECT * FROM drinks WHERE Item LIKE '%$search%'";
        $query = mysqli_query($con, $query1);
        $count = mysqli_num_rows($query);

        if($count == 0){
            echo "There was no search results!";

        }else{

            while ($row = mysqli_fetch_array($query)) {

                echo $row ['Item'];
                echo "<br>";
            }
        }
    }
    ?>

    <?php
    /*
    $search_value=$_POST['search'];

    $search_drinks="SELECT * FROM drinks WHERE Item LIKE '%$search_value%'";



    $res=mysqli_query($con, $search_drinks);
    if(mysqli_num_rows ($res)  > 0) {
        while ($row = mysqli_fetch_array($res)) {
            echo 'Drink:  ' . $row["Item"];
            echo "<br>";
        }
    }
    else{
        echo "No Results";
    }
    */
    ?>

</main>
</body>
</html>
