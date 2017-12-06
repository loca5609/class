<?php
include 'php/header.php';
include '../dbConn.php';//working

function getGameSystems(){
    global $conn;
    $sql = "SELECT name FROM game_system";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //test
    foreach($records as $record){
            echo "<option value=".$record['name'].">". $record['name']."</option>";
    }
}
function displayAcc(){
    global $conn;
    $sql = "select name, type, system, quantity from accessories WHERE system LIKE :systemName";
    $namedParameters[':systemName'] = "%" . $_GET['systemFilter'] . "%";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<div id='results' >";
    echo "<table class='table table-dark'>";
    //headers
    echo "<tr>";
    echo "<th scope='col'> Name </th>";
    echo "<th scope='col'> Type </th>";
    echo "<th scope='col'> System  </th>";
    echo "<th scope='col'> Quantity </th>";
    echo "</tr>";
    
    foreach($records as $r){
        echo "<tr>";
        echo "<td>". $r['name'] ."</td>";
        echo "<td>". $r['type'] ."</td>";
        echo "<td>". $r['system'] ."</td>";
        echo "<td>". $r['quantity'] ."</td>";
        echo "</tr>";
        
        
    }
    echo "</table>";
    echo "</div>";
    
}
function display(){
    global $conn;
    $sql = "select name, publisher, release_date, system from game";
    
    if(isset($_GET['go'])){
        //append sql statement
        if(isset($_GET['accessory'])){
            displayAcc();
            return;
        }
        if(isset($_GET['game'])){
           
            $sql .= " WHERE name LIKE :gameName";
            $namedParameters[':gameName'] = "%" . $_GET['game'] . "%";
        }
        
        if(isset($_GET['systemFilter']))
        {
            
        $sql .= " AND system LIKE :systemName";
        
        $namedParameters[':systemName'] = "%" . $_GET['systemFilter'] . "%";
        
        }
        
        
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<div id='results' >";
    echo "<table class='table table-dark'>";
    //headers
    echo "<tr>";
    echo "<th scope='col'> Game </th>";
    echo "<th scope='col'> Publisher </th>";
    echo "<th scope='col'> Release Date </th>";
    echo "<th scope='col'> System </th>";
    echo "</tr>";
    
    foreach($records as $r){
        echo "<tr>";
        echo "<td>". $r['name'] ."</td>";
        echo "<td>". $r['publisher'] ."</td>";
        echo "<td>". $r['release_date'] ."</td>";
        echo "<td>". $r['system'] ."</td>";
        echo "</tr>";
        
        
    }
    echo "</table>";
    echo "</div>";
    
}


?>

<html>
    
    <head>
        <title>Retro Game Browser</title>
        
    </head>
    
    <body>
        <form method="get">
            Search:
            <input type="text" name="game"/>
            System:
            <select name="systemFilter">
                <option value="">Select One</option>
                <?=getGameSystems()?>
            </select>
            Search Accessories:
            <input type="checkbox" name="accessory" value="yes"/>
            <input type="submit" name="go" value="GO"/>
        </form>
        
        <?=display()?>
    </body>
    
    
</html>