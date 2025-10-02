<!DOCTYPE html>
<html >
<head>
 
    <title>Admin Page</title>
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

    .styling{
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
        <p class="styling" >Admin</p>

    <form action="Admin.php" method='POST'>
    
        <div class="div2-style">
            <p>Name</p>
        <input type="text" placeholder=" name" name="name">
        <p>Password</p>
        <input type="password" placeholder=" password" name="password"> 
        </div>

        <?php
       if (isset($_POST['name']) && ($_POST['password']) ){
        $name=$_POST['name'];
        $password=$_POST['password'];
        if( $name=='admin' and $password=='123'){
            header("Location: admin_search.php");
        }
        else{
            header("Location: Admin.php"); 
        }
       }

       
        
    ?>


        <button>Admin</button>
        
    </form>
   

    </div>
    
</body>
</html>