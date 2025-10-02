<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tour and Travel</title>
    <style>
        .name{
            text-align: center;
           
           
           
        }

        .logo{
             width:100px;
             border-radius: 100px;
             margin-top: 60px;
             margin-bottom: 0px;
             object-fit: cover;
           
        }


        button{
           
            padding-top:15px;
            padding-bottom:15px;
            padding-left:30px;
            padding-right:30px;
            margin-top:50px;
            background-color: rgb(25, 131, 110);
            border:none;
            color:white;
            cursor: pointer;
            
         
            
        }

        button:hover{
            background-color: rgb(108, 163, 121); 
        }

        .link-page{
            text-align: center;
            color:white;
            text-decoration:none;
        }

    </style>
</head>
<body>
 
   <center>
        <img class="logo" src="logo.png" alt="Logo">
    </center> 
  
    <h1 class="name">Welcome to Tour And Travel Management System </h1>
 
        <p style="text-align: center; font-size:20px;">Travel with us</p> 

        <button onClick="window.location='login-page.php';" style="margin-right:20px;margin-left:630px;padding-right:40px;">Login</button>

        <button onClick="window.location='signup.php';">Sign up</button>

   <!--   <button onClick="window.open('signup-page.html', '_blank');">Click me</button> -->
   <p style="text-align: center;color:rgb(72, 212, 165) ;margin-top:70px;">-----------------------------------------------------------</p>
   <p style="text-align: center; font-size:15px;color:rgb(35, 46, 46);margin-top:10px;
   margin-bottom:0px;">If you are an admin click here</p>

   <button onClick="window.location='Admin.php';" style="margin-right:20px;margin-left:680px;padding-right:40px;">Admin</button>

    
