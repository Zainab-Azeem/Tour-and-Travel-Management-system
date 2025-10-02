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
   
    <title>USER PROFILE</title>
    <style>
    
    th, td { 
      border:1px solid black;
        padding:10px;
        text-align:left;
        
  }

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
  <h1>User Profile</h1>
<?php
//if (isset($_POST['user_id'])){
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

//$user_id =$_POST['user_id'];

//$query1=$conn->query("select * from profile where user_id=$user_id");
$query1=$conn->prepare('select * from USERS where user_id=?');
$query1->execute([$Id]);


$query2=$conn->prepare('select place_name from users ,places where users.place_id=places.place_id and user_id=?');
$query2->execute([$Id]);

$query3=$conn->prepare('select hotel_name from users ,hotels where users.hotel_id=hotels.hotel_id and user_id=?');
$query3->execute([$Id]);

$query4=$conn->prepare('select trans_type from users ,transport where users.trans_id=transport.trans_id and user_id=?');
$query4->execute([$Id]);
?>

<table>
  <tr>
        <th>User id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>DOB</th>
        <th>ADDRESS</th>
        <th>CONTACT_NO</th>
        <th>PLACE_ID</th>
        <th>HOTEL_ID</th>
        <th>TRANS_ID</th>
       

</tr>

  <!--  <thead>
        <th>User id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>DOB</th>
        <th>ADDRESS</th>
        <th>CONTACT_NO</th>
        <th>PLACE_ID</th>
        <th>TRANS_ID</th>
        <th>HOTEL_ID</th>

    </thead> -->

    <?php
    while($row =$query1->fetch(PDO::FETCH_OBJ)){
      echo"
      <td>$row->USER_ID</td>
      <td>$row->USER_FNAME</td>
      <td>$row->USER_LNAME</td>
      <td>$row->USER_EMAIL</td>
      <td>$row->USER_PASSWORD</td>
      <td>$row->DOB</td>
      <td>$row->USER_ADDRESS</td>
      <td>$row->USER_CONTACT_NO</td>
   
      ";
        

    }

    ?>
    <?php
  if(isset($query2) && $query2->rowCount()>0){
    $row1=$query2->fetch(PDO::FETCH_OBJ);
    echo"
    <td>$row1->place_name</td>
    ";
  }

    
  if(isset($query3) && $query3->rowCount()>0){
    $row1=$query3->fetch(PDO::FETCH_OBJ);
     echo"
      <td>$row1->hotel_name</td>
      ";
  }


  if(isset($query4) && $query4->rowCount()>0){
  $row1=$query4->fetch(PDO::FETCH_OBJ);
  echo"
    <td>$row1->trans_type</td>
    ";
  }

//}
    ?>
     </table>
     <br>
     <br>

    <form method=POST>

   <button type='submit' name=delete >Delete Account</button>
   
   <?php
   if (isset($_POST['delete'])){
    $query3=$conn->prepare('delete from users where USER_ID=?');
    $query3->execute([$Id]);
    header('Location:welcome.php');
   }
  
   ?>
  
  <br>
  <br>
  <!--   <button>Update password</button> -->
</form>
<button onClick="window.location='update-pass.php';">Change password</button>
    
</body>
</html>