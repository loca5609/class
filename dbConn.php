<?php
$servername = "us-cdbr-iron-east-05.cleardb.net";
$username = "bcdf44191e72b0";
$password = "a450b81f";
$db = "heroku_eb82b204b84db80";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>