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
 
    <title>Sign up Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <style>

        
    .div1-style{
        margin-top: 100px;
        margin-left: 400px;
          width:600px;
          height: 100px;
          padding-top: 20px;
          padding-bottom: 400px;
          padding-left:100px;
        
          box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);

    }

    p{
        font-size: 20px;
        font-family: Roboto,Arial;
        text-align: justify;
    }

    .Signup-style{
        font-size: 30px;
        text-align: center;
        font-weight: bold;
        padding-right: 80px;
        

    }

    .div2-style{
        margin-top: 50px;
        width: 400px;
        height: 150px;
        margin-bottom: -30px;
      
       
       
    }

    input[type=text],input[type=password]{
        width:350px;
        border-radius: 20px;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 15px;
        font-size: 14px;
       

    }

    button{
        margin-left: 150px;
        padding-top:15px;
        padding-bottom:15px;
        padding-left:30px;
        padding-right:30px;
       
        background-color: rgb(25, 131, 110);
        border:none;
        color:white;
        cursor: pointer;
        margin-top: 40px;
        
    }

    button:hover{
        background-color: rgb(108, 163, 121); 
    }

    </style>


</head>

<body style="height: 1000px;">
<div class="div1-style">
        <p class="Signup-style" >Register</p>

    <form action='update-pass.php' method="POST">
        <div class="div2-style">
        <p>Change Password</p>
        <input type="password" placeholder=" password" name="USER_PASSWORD"> 
        

        
        </div>

        <button>Change </button>  

        
        
        </form>
   

    </div>

<?php
if (isset($_POST['USER_PASSWORD']) ){
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


$USER_PASSWORD = $_POST['USER_PASSWORD'];

$query = $conn->prepare('UPDATE users SET USER_PASSWORD = ? WHERE User_id = ?');
$query->execute([$USER_PASSWORD, $Id]);

header('Location:PROFILE.PHP');



} ?>

    
</body>
</html>