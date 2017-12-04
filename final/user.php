<?php
include 'php/header.php';
include '../dbConn.php';//working

$sql = "SELECT * FROM game_system";
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetchAll(PDO::FETCH_ASSOC);
//test
print_r($record);

?>

<html>
    
    <head>
        <title>Retro Game Browser</title>
        
    </head>
    
    <body>
        
    </body>
    
    
</html>