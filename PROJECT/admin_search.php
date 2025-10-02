<!Doctype html >
<head>
    <title>USER RECORD</title>
</head>
<style>
         th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }


    </style>

<body>
<div class ="Conainer">
    <h4>User record</h4>
    <form action="admin_search.php" method="post">
    <span>Search User ID</span><br>
    <input type="text" name="user_id">
    <input type="submit" class="btn btn.info" value="Search">

</form>


<?php
if (isset($_POST['user_id'])){
//this code is executed when the form is submitted
$username = "root";
$password = "";
try {
$conn = new PDO("mysql:host=localhost;dbname=TOUR", $username,
$password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";
}
catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}

$user_id =$_POST['user_id'];

//$query1=$conn->query("select * from profile where user_id=$user_id");
$query1=$conn->prepare('select * from USERS where user_id=?');
$query1->execute([$user_id]);

?> 
<div style='margin-top:40px'>
<table class="table mt-3">
    <thead>
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

    </thead>
<tbody>
    <?php
    while($row =$query1->fetch(PDO::FETCH_OBJ)){
        echo"<tr>
        <td>$row->USER_ID</td>
        <td>$row->USER_FNAME</td>
        <td>$row->USER_LNAME</td>
        <td>$row->USER_EMAIL</td>
        <td>$row->USER_PASSWORD</td>
        <td>$row->DOB</td>
        <td>$row->USER_ADDRESS</td>
        <td>$row->USER_CONTACT_NO</td>
        <td>$row->PLACE_ID</td>
        <td>$row->TRANS_ID</td>
        <td>$row->HOTEL_ID</td>
        </tr>";
        

    }

    ?>
    <?php
}
    ?>
    </div>
</body>
</html>
