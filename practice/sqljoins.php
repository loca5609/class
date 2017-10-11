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
//$sql = "SELECT * FROM tc_device WHERE 1";
//$stmt = $conn->prepare($sql);
//$stmt->execute();
//$records = $stmt->fetchAll();


?>


<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    
    <body>
        <h1> Users and their departments (SQL Joins practice)</h1>
       
        <?php
        $sql = "select firstName, lastName, deviceName, checkoutDate from tc_user natural join tc_checkout natural join tc_device where deviceType = \"Tablet\" limit 10";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records =$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<h2>Users whoms't have checked out a tablet</h2>";
        foreach ($records as $record) {
           echo "Name: $record[firstName] $record[lastName], Device: $record[deviceName], Checkout Date: $record[checkoutDate]<br>";
        }
        
        ?>
        
        
    </body>
</html>