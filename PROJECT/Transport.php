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
    
    <title>Transport</title>
</head>
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
<body>
    <h1 style="text-align:center">VEHICLES</h1>
   

    
    <form action='Transport.php' method='POST'>
    <p style="font-size:32px;padding-left:50px">BUS</p>

    <div style='margin-top:-60px;padding-left:200px' >
   <button type='submit' name='BUS'>BOOK</button>
   <p>Rs 20000</p>
</div>

   <p style="font-size:32px;padding-left:50px">CAR</p>

   <div style='margin-top:-60px;padding-left:200px'>
   <button type='submit' name='CAR'>BOOK</button>
   <p>Rs 30000</p>
</div>


   <p style="font-size:32px;padding-left:50px">FLIGHT</p>

   <div style='margin-top:-60px;padding-left:200px'>
   <button type='submit' name='FLIGHT'>BOOK</button>
   <p>Rs 40000</p>
   </div>

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
       if (isset($_POST['BUS']) ){
       $query = $conn->prepare('UPDATE users set trans_id="B102" where User_id=?');
       $query->execute([$Id]);
       $query1= $conn->prepare('call INSERT_FARE_IN(?)');
       $query1->execute([$Id]);
      
       header('Location:PAY.php');
       
    }

    if (isset($_POST['CAR']) ){
        $query = $conn->prepare('UPDATE users set trans_id="C101" where User_id=?');
        $query->execute([$Id]);
        $query1= $conn->prepare('call INSERT_FARE_IN(?)');
        $query1->execute([$Id]);
      
        header('Location:PAY.php');
       
        
        
     }


     if (isset($_POST['FLIGHT']) ){
        $query = $conn->prepare('UPDATE users set trans_id="F102" where User_id=?');
        $query->execute([$Id]);
        $query1= $conn->prepare('call INSERT_FARE_IN(?)');
        $query1->execute([$Id]);
      
        header('Location:PAY.php');
       
        
     }
       ?>


</body>
</html>