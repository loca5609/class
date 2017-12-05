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

function display(){
    global $conn;
    $sql = "select g.name, publisher,release_date,system from game g join game_system gs where g.system = gs.name ";
    //FIXME: need to finish the sorting code
    //Need to figure out the select menu cause its acting fucked
    if(isset($_GET['go'])){
        //append sql statement
        if(!empty($_GET['game'])){
            echo "get game";
            $sql .= " AND g.name LIKE '%:gameName%' ";
            $namedParameters[':gameName'] = $_GET['game'];
        }
        
        if(!empty($_GET['systemFilter']))
        {
            echo "get filter";
        $sql .= " AND gs.name LIKE '%::systemName%'";
        
        $namedParameters[':systemName'] = $_GET['systemFilter'];
        echo $namedParameters[':systemName'];
        }
    }
    
    $stmt = $conn->prepare($sql);
	$stmt->execute($namedParameters);
	
	$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
	print_r($records);
    
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
            <input type="submit" name="go" value="GO"/>
        </form>
        
        <?=display()?>
    </body>
    
    
</html>