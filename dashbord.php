<?php
session_start();
if(!isset($_SESSION["id"])){
     header("location: index.php");
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
        header{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1{
            display: block;
            margin-left: 15px;
        }
        header img{
            display: block;
            margin-right: 15px;
        }
        .wrapper{
            flex-direction: column;
        }
        .wrapper{
            font-size: 26px;
        }
        .money_time{
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-width: 300px;

        }
        .extra_info div{
            margin: 30px 0;
        }
        .bg-w{
            display: none;
        }
        @media only screen and (min-width: 820px){
            .wrapper{
                position: relative;
            }
            .bg-w{
                display: block;
                position: absolute;
                width: 100%;
                height: 100%;
                z-index: -1;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>WALLET</h1>
        <a href="lougout.php"><img class="logout" src="assets/images/🦆 icon _log out_.svg" alt=""></a>
    </header>
    <?php
      require_once 'db.inc.php';
      $sql = "select * from user_info where user_id='".$_SESSION["id"]."';";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) >= 1){
        while($rows = mysqli_fetch_assoc($result)){
           echo '    <div class="wrapper">
           <img class="bg-w" src="assets/images/Group 10.svg" alt="">
           <div class="date">
               TODAY: <span class="blue">'.$rows["current_day"].'</span>
           </div>
           <div class="money_time">
               <div>
                   <img src="assets/images/🦆 icon _Time_.svg" alt="">
                   <p>
                       <span class="blue">'.$rows["worked_time"].'</span> Hours
                   </p>
               </div>
               <div>
                   <img src="assets/images/🦆 icon _Money Bag_.svg" alt="">
                   <p>
                       <span class="blue">'. $rows["worked_time"] * $rows["price_hour"] .'</span> MAD
                   </p>
               </div>
           </div>
           <div class="extra_info">
               <div class="startAt">
               Start At: <span class="blue">'.$rows["start_at"].'</span>
               </div>
               <div class="EndAt">
               End At: <span class="blue">'.$rows["end_at"].'</span>
               </div>
               <div class="Break">
               from: <span class="blue">'.$rows["break_start"].'</span> to: <span class="blue">'.$rows["break_end"].'</span>
               </div>
           </div>
       </div>';
        }
      }
    ?>

</body>
</html>