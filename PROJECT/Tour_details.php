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
    
    <title>Tour Details</title>


    <style>

.form_style{
        margin-top: 100px;
        margin-left: 400px;
          width:500px;
          height: 450px;
          padding-top: 20px;
          padding-bottom: 50px;
          padding-left:100px;
      
          box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);

    }

    .heading_style{
        font-size: 30px;
        text-align: center;
        font-weight: bold;
        padding-right: 50px;
    }

    .input_style{
        margin-top: 50px;
        width: 350px;
        height: 300px;
        
       
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
        margin-left: 130px;
        padding-top:15px;
        padding-bottom:15px;
        padding-left:30px;
        padding-right:30px;
        background-color: rgb(25, 131, 110);
        border:none;
        color:white;
        cursor: pointer;
        margin-top: -20px;
        
    }

    
    </style>


</head>
<body>

<div class="form_style">
        <p class="heading_style">Tour Details</p>
        
   <form action="Tour_details.php" method="POST"> 
    <div class="input_style">
      <!--  <p>User ID</p>
        <input type="text" placeholder=" User ID"> -->
        <p>From Date</p>
        <input type="text" placeholder=" Y-M-D " name="FROM_DATE">
        <p>To Date</p>
        <input type="text" placeholder=" Y-M-D " name="TO_DATE">
    </div>
        <button onClick="window.location='Tour_details.html';">Submit</button>
   </form>  

    </div>
    
    <?php
if (isset($_POST['FROM_DATE']) && ($_POST['TO_DATE'])){
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

// getting the form fields via GET Method
$FROM_DATE = $_POST['FROM_DATE'];
$TO_DATE = $_POST['TO_DATE'];

try{
$query1 = $conn->prepare("INSERT into TOUR_DETAILS(USER_ID, FROM_DATE, TO_DATE) values('$Id', '$FROM_DATE', '$TO_DATE')");
$query1->execute();

header('Location:transport.php');
exit;
}
catch (PDOException $e) {
    if ($e->getCode() == '23000') {
        echo "you can't book multiple tours on same date";
    } else {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!--<h2>Thank You </h2> -->

<?php






} ?>

           
    
    





    </body>
</html>