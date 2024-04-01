<?php
    declare(strict_types=1);

    require_once 'dbh.inc.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $emailAddress = $_POST["emailAddress"];
        $contactNumber = $_POST["contactNumber"];
        $address = $_POST["address"];

        $sql = "INSERT INTO users (firstName, lastName, emailAddress, contactNumber, address) VALUES (:fn,:ln,:eml,:cno,:adrss)";
        $query = $pdo->prepare($sql);

        $query->bindParam(":fn",$firstName, PDO::PARAM_STR);
        $query->bindParam(":ln",$lastName, PDO::PARAM_STR);
        $query->bindParam(":eml",$emailAddress, PDO::PARAM_STR);
        $query->bindParam(":cno",$contactNumber, PDO::PARAM_STR);
        $query->bindParam(":adrss",$address, PDO::PARAM_STR);

        $query->execute();

        $lastInsertId = $pdo->lastInsertId();

        if($lastInsertId){
            echo "<script>alert('Record inserted successfully') <script/>";
            echo "<script>window.location.href='insert.inc.php' <script/>";
        }else{
            echo "<script>alert('Somethings went wrong with the insertion of records') <script/>";
            echo "<script>window.location.href='insert.inc.php' <script/>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h3>Register</h3>
        <form action="insert.inc.php" method="post">
            <label for="firstName">First Name</label><br/>
            <input type="text" name="firstName" placeholder="First Name"><br/>

            <label for="lastName">Last Name</label><br/>   
            <input type="text" name="lastName" placeholder="Last Name"><br/> 

            <label for="emailAddress">Email Address</label><br/>  
            <input type="text" name="emailAddress" placeholder="Email Address"><br/> 

            <label for="contactNumber">Contact Number</label><br/>  
            <input type="text" name="contactNumber" placeholder="Contact"><br/>  

            <label for="address">Address</label><br/> 
            <input type="text" name="address" placeholder="Address"><br/>   
            <br/>  
            <button>Submit</button>
        </form>
    </main>
</body>
</html>