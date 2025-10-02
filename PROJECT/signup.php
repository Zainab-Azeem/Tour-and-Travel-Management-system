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
          height: 550px;
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
        height: 800px;
        margin-bottom: -30px;
      
       
       
    }

    input[type=text],input[type=password],input[type=mail]{
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
        margin-top: -50px;
        
    }

    button:hover{
        background-color: rgb(108, 163, 121); 
    }

    </style>


</head>

<body style="height: 1000px;">


<?php
if (isset($_POST['USER_EMAIL']) && ($_POST['USER_PASSWORD'])  && ($_POST['USER_FNAME']) && ($_POST['USER_CONTACT_NO']) ){
//this code is executed when the form is submitted
$username = "root";
$password = "";
try {
$conn = new PDO("mysql:host=localhost;dbname=tour", $username,
$password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";

}
catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

// getting the form fields via GET Method
$USER_FNAME = $_POST['USER_FNAME'];
$USER_LNAME = $_POST['USER_LNAME'];
$USER_EMAIL = $_POST['USER_EMAIL'];
$USER_PASSWORD = $_POST['USER_PASSWORD'];
$USER_CONTACT_NO = $_POST['USER_CONTACT_NO'];
$USER_ADDRESS = $_POST['USER_ADDRESS'];
$DOB = $_POST['DOB'];



// inserting the form data to themepark table
$conn->query("insert into users(USER_FNAME,USER_LNAME,
USER_EMAIL,
USER_PASSWORD,
USER_CONTACT_NO,
USER_ADDRESS,DOB  ) values('$USER_FNAME','$USER_LNAME','$USER_EMAIL','$USER_PASSWORD','$USER_CONTACT_NO','$USER_ADDRESS','$DOB' )" );

header('Location:login-page.php');
}




else {
    ?>
    <div class="div1-style">
        <p class="Signup-style" >Register</p>

    <form action="signup.php" method="POST">
  
        <div class="div2-style">
    
        <p>First name</p>
        <input type="text" placeholder=" Firstname" name="USER_FNAME">
        <p>Last name</p>
        <input type="text" placeholder=" Lastname" name="USER_LNAME"> 
        <p>Email</p>
        <input type="text" placeholder=" email" name="USER_EMAIL">
        <p>Password</p>
        <input type="password" placeholder=" password" name="USER_PASSWORD"> 
        <p>Contact No</p>
        <input type="text" placeholder=" +92000000000" name="USER_CONTACT_NO"> 
        <p>Address</p>
        <input type="text" placeholder=" address" name="USER_ADDRESS"> 
        <p>DOB</p>
        <input type="text" placeholder=" y-m-d" name="DOB"> 

        
        </div>

        <button>Sign up</button> 

        
        
        </form>
   

    </div>

 
<?php } ?>
    
</body>
</html>