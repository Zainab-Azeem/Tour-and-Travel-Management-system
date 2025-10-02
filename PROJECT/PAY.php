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
    <title>Bill</title>
    <style>
          .button-image{
        border:none;
        background-color: rgb(66, 188, 168);
        color:white;
        font-size:15px;
        margin-left:130px;
        margin-top: 120px;
        padding-top: 5px;
        padding-bottom: 10px;
       }

        .button-image:hover{
            background-color: rgb(156, 191, 164); 
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }
        th {
            font-weight: bold;
        }
        .center {
            padding-left:470px;
            padding-top:10px;
            width: 50%;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3 style="text-align:center; margin-top:70px; ">Your Bill</h3>

    <div class="center">
        <table>
            <tr>
                <th>USER_ID</th>
                <th>PAY_ID</th>
                <th>HOTEL_AMOUNT</th>
                <th>TRANS_AMOUNT</th>
                <th>TOTAL_BILL</th>
                
            </tr>

            

            <?php
            $username = "root";
            $password = "";
            try {
                $conn = new PDO("mysql:host=localhost;dbname=tour", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            $query1=$conn->prepare('Select * from payment where USER_ID = ?' );
            $query1->execute([$Id]);
        
            
       
            while($row=$query1->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>
                <td>$row->USER_ID</td>
                <td>$row->PAY_ID</td>
                <td>$row->HOTEL_AMOUNT</td>
                <td>$row->TRANS_AMOUNT</td>
                <td>$row->TOTAL_BILL</td>
               
                
                </tr>";
            } 


        
            ?>
        </table>
   
    </div>
    <button class="button-image"  onClick="window.location='home.php';">HOME</button>
    <button class="button-image"  onClick="window.location='PROFILE.php';">PROFILE</button>

    <form action="PAY.php" method='POST'>
    <button class="button-image"   type='submit' name='logout' >LOG OUT</button>
    <?php
          if (isset($_POST['logout']) ){
        
           
            session_unset();
            session_destroy();
            echo "<br> You have been logged out";
          header("Location:welcome.php");
            
           
           
            
         }
    ?>
</form>
</body>
</html>
