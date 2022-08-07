<?php
if(isset($_POST["username"])){
    require_once 'db.inc.php';
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from user where username='".$username."'AND password='".$password."' limit 1";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) >= 1){
        while($rows = mysqli_fetch_assoc($result)){
            $_SESSION["id"]  = $rows["id"];
        }
        header('Location: ./dashbord.php');
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,200&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="icon" href="./assets/images/DqAKT8mJJWAQMzPuNTFL1CyhwVJkCEfQlv8CGlh7tNLPe81h92T-SwWG6UQLXydpEBNz.png">
    <title>Wallet</title>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
        .wrapper_side_img{
            width: 50vw;
        }
    </style>
</head>
<body>
    <header>
        <h1>WALLET</h1>
    </header>
    <div class="wrapper">
        <img class="wrapper_side_img" src="assets/images/Moneyverse Business Balance.svg" alt="">
        <form class="login_section" method="POST">
            <img class="creditCard" src="assets/images/Moneyverse Credit Card.svg" alt="">
            <h1>LOGIN PAGE</h1>
            <div>
            <div class="input">
                <img src="assets/images/🦆 icon _User_.svg" alt="">
                <input type="text" name="username" placeholder="username">
            </div>
            <div class="input">
                <img src="assets/images/🦆 icon _security password key_.svg" alt="">
                <input type="password" name="password" placeholder="password">
            </div>
        </div>
            <button type="submit" name="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>