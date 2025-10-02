<?php

session_start();
if (isset($_SESSION['USER_ID'])){
$Id=$_SESSION['USER_ID'];
}
else {
  $Id = null;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>MAIN PAGE</title>
 <style>
    .button-image{
        border:none;
        background-color: rgb(66, 188, 168);
        color:white;
        font-size:15px;
        margin-left: 30px;
        margin-top: 30px;
        padding-top: 5px;
        padding-bottom: 10px;
       }

        .button-image:hover{
            background-color: rgb(156, 191, 164); 
        }

   
    
      

      

        .div{
            display:inline-block;
            padding-left: 50px;
            margin-right: 20px;
            margin-top: 50px;
            padding-top: 40px;
            padding-bottom: 30px;
            padding-right: 30px;              
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
            border:none;
            
           
           
           
            
           
        }

        
    .img{
         
         margin-left:-5px;
         margin-right:5px;
         width:200px;
         height:200px;
         border:none;
         
        
         }

        .name{
           font-size:20px;
           font-family:Arial;
           font-weight: bold;
           margin-bottom:-5px;
           margin-top: 10px;

        }

      



        
      
        
 </style>
   
  </head>
  <body style="
    height: 1000px;
    padding-top: 20px;
    padding-left: 80px;
  
  
  ">

    <div style="
      background-color: rgb(66, 188, 168);
      color: white;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 80px;
    "><button class="button-image"  onClick="window.location='home.php';">HOME</button>
    <button class="button-image"  onClick="window.location='PROFILE.php';">PROFILE</button>
    <button class="button-image"  onClick="window.location='PAY.php';">BILLING</button>
    <form action="home.php" method='POST'>
    
    <button class="button-image" style='margin-left:330px;position: fixed; margin-top: -33px;'  type='submit' name='logout' >LOG OUT</button>
      
    </form>
   
</div>

      
    
    <?php
          if (isset($_POST['logout']) ){
        
           
            session_unset();
            session_destroy();
            echo "<br> You have been logged out";
          header("Location:welcome.php");
            
           
           
            
         }
    ?>

<div>
    <h1 style="width:300px; margin-top:100px;">Where to go</h1>
</div>




<form action="home.php" method='POST'>

<div class="div">
   
<button style="border:none;" type='submit' name='select_murree' >
<img class="img" src="murree.jpg"> 

<p class="name ">MUREE</p>

</button>

</div>

<div class="div">
   
<button style="border:none;" type='submit' name='select_islamabad'>
<img class="img" src="islamabad.png"> 

<p class="name ">ISLAMABAD</p>

</button>

</div>


<div class="div">
   
<button style="border:none;" type='submit' name='select_peshawar'>
<img class="img" src="peshawar.png"> 

<p class="name ">PESHAWAR</p>

</button>

</div>


<div class="div">

   
<button style="border:none;" type='submit' name='select_lahore'>
<img class="img" src="Lahore.png"> 

<p class="name ">LAHORE</p>

</button>

</div>
      </form>

      <?php
  
  //this code is executed when the form is submitted
  $username = "root";
  $password = "";
  try {
  $conn = new PDO("mysql:host=localhost;dbname=tour", $username,
  $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
  
  }
  catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  }
  if (isset($_POST['select_murree']) ){
   
  $query = $conn->prepare('UPDATE users set place_id="Mur301" where User_id=?');
  $query->execute([$Id]);


 
  header('Location:murree_hotel.php');
  
}

if (isset($_POST['select_islamabad']) ){
   $query = $conn->prepare('UPDATE users set place_id="Isl401" where User_id=?');
   $query->execute([$Id]);

 
   header('Location:islamabad_hotel.php');
   
}

if (isset($_POST['select_peshawar']) ){
  $query = $conn->prepare('UPDATE users set place_id="Peh601" where User_id=?');
  $query->execute([$Id]);


  header('Location:peshawar_hotel.php');
  
}

if (isset($_POST['select_lahore']) ){
  $query = $conn->prepare('UPDATE users set place_id="Lah501" where User_id=?');
  $query->execute([$Id]);


  header('Location:lahore_hotel.php');
  
}
  ?>


        


</body>
</html>