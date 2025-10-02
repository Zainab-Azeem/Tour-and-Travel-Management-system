<?php
  session_start();
?>
<!DOCTYPE html>
<html >
<head>
 
    <title>Log in Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
    <style>

        
    .div1-style{
        margin-top: 100px;
        margin-left: 400px;
          width:500px;
          height: 450px;
          padding-top: 20px;
          padding-bottom: 50px;
          padding-left:100px;
      
          box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);

    }

    p{
        font-size: 20px;
        font-family: Roboto,Arial;
        text-align: justify;
    }

    .login-style{
        font-size: 30px;
        text-align: center;
        font-weight: bold;
        padding-right: 50px;
        

    }

    .div2-style{
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

    button:hover{
        background-color: rgb(108, 163, 121); 
    }

    </style>


</head>
<body>


    <div class="div1-style">
        <p class="login-style" >Login</p>

    <form action="login-page.php" method='POST'>
    
        <div class="div2-style">
            <p>User-Email</p>
        <input type="text" placeholder=" User-Email" name='USER_EMAIL'>
        <p>Password</p>
        <input type="password" placeholder=" password" name='USER_PASSWORD'> 
        </div>

        <button>Login</button>
        
    </form>

    <?php
if (isset($_POST['USER_EMAIL']) && ($_POST['USER_PASSWORD']) ){
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

$USER_EMAIL=$_POST['USER_EMAIL'];
$USER_PASSWORD=$_POST['USER_PASSWORD'];
//$query1=$conn->query("Select * from profile where user_id=$user_id" ) ;

$query1=$conn->prepare('Select * from users where USER_EMAIL = ? AND USER_PASSWORD = ?' ) ;
$query1->execute([$USER_EMAIL,$USER_PASSWORD]);

$row=$query1->fetch(PDO::FETCH_OBJ);
if($row){

    $_SESSION['USER_ID']=$row->USER_ID;
 //   echo"$row->USER_ID";
    header('Location:home.php');

}

else{
    header('Location:login-page.php');
}
}
?>
   

    </div>
    
</body>
</html>