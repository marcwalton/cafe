<?php

    include 'connection.php';
    
    /* Drinks Query */
    /*SELECT DrinkID, Item FROM drinks */

    $all_drinks_query = "SELECT DrinkID, Item FROM drinks";
    $all_drinks_result = mysqli_query($con, $all_drinks_query);

    $all_orders_query = "SELECT OrderID FROM orders ORDER BY OrderID ASC";
    $all_orders_result = mysqli_query($con, $all_orders_query);

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
                    <li> <a href='login.php'> ADMIN </a></li>
                    <li> <a href='process_logout.php'> LOGOUT </a></li>
                </ul>
            </nav>
        </header>

    <main>

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

        <!--Orders form-->
        <form name='orders_form' id='orders_form' method = 'get' action ='orders.php'>
            <select id ='order' name ='order'>
                <!--options-->

            <?php
                while($all_orders_record = mysqli_fetch_assoc($all_orders_result)){
                    echo "<option value = '". $all_orders_record['OrderID'] . "'>";
                    echo $all_orders_record['OrderID'];
                    echo "</option>";
                }
                ?>
            </select>
            <input type='submit' name='orders_button' value='Show me the order information'>
        </form>
    </main>
    </body>

</html>