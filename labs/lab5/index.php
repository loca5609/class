<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=tcp", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        
        
    </body>
</html>