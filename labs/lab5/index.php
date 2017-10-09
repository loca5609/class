<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=tcp", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$sql = "SELECT * FROM tc_device WHERE 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll();

print_r($records);
?>


<html>
    <head>
       <meta charset="utf-8">
       
    </head>
    
    <body>
        
    </body>
</html>