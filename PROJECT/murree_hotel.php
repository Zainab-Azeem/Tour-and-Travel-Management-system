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
<html >
<head>
    
    <title>MURREE Hotels</title>
    <style>
        
            button{
        margin-left: 130px;
        padding-top:10px;
        padding-bottom:10px;
        padding-left:30px;
        padding-right:30px;
        background-color: rgb(25, 131, 110);
        border:solid;
        color:white;
        cursor: pointer;
        margin-top: -1500px;
        
    }

    button:hover{
        background-color: rgb(108, 163, 121); 
    }
        
    </style>
</head>
<body>
    <h1 style="text-align:center"> Hotels</h1>
    <div>
  <!--  <h2>Peshawar</h2> -->
    
      
    
    

    </div>

    <div style='margin-bottom:200px;padding-right:0px;padding-left:0px;padding-top:0px'>
    <form action="murree_hotel.php" method='POST'>
    
    <p style="font-size:32px;padding-left:50px">Grand Taj Hotel</p>
    <div style='margin-top:-60px;padding-left:200px' >
   <button type='submit' name='HOTEL-1' >BOOK</button>
   <p>Rs 10000</p>
</div>
   <p style="font-size:32px;padding-left:50px;">Hotel Mehran</p>
   <div style='margin-top:-60px;padding-left:200px' >
   <button type='submit' name='HOTEL-2' >BOOK</button>
   <p>Rs 25000</p>
   </div>
   </div >
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
       if (isset($_POST['HOTEL-1']) ){
        
       $query = $conn->prepare('UPDATE users set hotel_id="GTH501" where User_id=?');
       $query->execute([$Id]);
   
     
      
       header('Location:Tour_details.php');
       
    }

    if (isset($_POST['HOTEL-2']) ){
        $query = $conn->prepare('UPDATE users set hotel_id="HM601" where User_id=?');
        $query->execute([$Id]);
     
      
        header('Location:Tour_details.php');
        
     }
       ?>


</body>
</html>