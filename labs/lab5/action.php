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
       <style>
           @import url('css/styles.css');
       </style>
       <title>Tech Checkout</title>
    </head>
    
    <body>
        <h1>Tech Checkout</h1>
        <p>Please enter the name of the device you would like to look up</p><br>
        <form action="action.php" method ="get">
            Device :
            <input type="text" name="i_name"/>
            <select name="type" >
                <option value="tablet">Tablet</option>
                <option value="camera">Camera</option>
                <option value="laptop">Laptop</option>
                <option value="smartphone">Smartphone</option>
                <option value="tripod">Tripod</option>
                <option value="microphone">Microphone</option>
                <option value="vr headset">VR Headset</option>
            </select>
            Available
            <input type="checkbox" name="available" value="available"/>
            <input type="submit" name="search" value="Search"/>
            <?php
            //Takes care of device type
            echo '<div id="results">';
            if(isset($_GET[type])){
                $sql = "select deviceName from tc_device where deviceName like '%$_GET[i_name]%' AND deviceType = '$_GET[type]'";
                if($_GET[available]=="available"){
                       $sql = "select deviceName from tc_device where deviceName like '%$_GET[i_name]%' AND deviceType = '$_GET[type]' AND status like '%A%'";
                }
            }
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->fetchAll();
            print_r($records);
            echo "</div>";
            ?>
            
        </form>
        
        
    </body>
</html>