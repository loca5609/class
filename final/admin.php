<?php
include 'php/header.php';

include '../dbConn.php';
//Game Modal insert record
if(isset($_GET['gameSubmit'])){
  
  $game = $_GET['gameName'];
  
  if(checkEntry($game)==true){
    $sql = "INSERT INTO game (name,publisher,release_date,system) VALUES (:name,:publisher,:release,:system)";
  $namedParameters[':name'] = $_GET['gameName'];
  $namedParameters[':publisher'] = $_GET['gamePub'];
  $namedParameters[':release'] = $_GET['gameRelease'];
  $namedParameters[':system'] = $_GET['gameSystem'];
                            
            $stmt = $conn->prepare($sql);
            
            $stmt->execute($namedParameters);
  } 
  
}

function checkEntry($game){
  global $conn;
  $sql = "SELECT name FROM game where name like :name AND system like :system";
  $namedParameters[':name'] = $_GET['gameName'];
  $namedParameters[':system'] = $_GET['gameSystem'];
  $stmt = $conn->prepare($sql);
  $stmt->execute($namedParameters);
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if($records.length > 0){
    return false;
  } else {
    return true;
  }
}


function nesReport(){
  //generate games report
  global $conn;
  $sql = "SELECT count(system) as nesCount FROM `game` WHERE system LIKE '%NES%'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($records as $record){
    echo "NES Games: ". $record[nesCount] ."<br> ";
  }
  
}

function genReport(){
  global $conn;
  $sql = "SELECT count(system) as genCount FROM `game` WHERE system LIKE '%Genesis%'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($records as $record){
    echo "Genesis Games: ". $record[genCount] ."<br> ";
  }
}

function saturnReport(){
  global $conn;
  $sql = "SELECT count(system) as satCount FROM `game` WHERE system LIKE '%Saturn%'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($records as $record){
    echo "Saturn Games: ". $record[satCount] ."<br> ";
  }
}

function systemReport(){
   global $conn;
  $sql = "SELECT count(name) as total from game_system";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($records as $record){
    echo "Number of Game Systems: ". $record[total] ."<br> ";
  }
  generation4();
  generation5();
}

function generation5(){
  global $conn;
  $sql = "SELECT count(name) as gen from game_system where generation = 5";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($records as $record){
    echo "5th Generation Consoles: ". $record[gen] ."<br> ";
  }
   
}

function generation4(){
  global $conn;
  $sql = "SELECT count(name) as gen from game_system where generation = 4";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach($records as $record){
    echo "4th Generation Consoles: ". $record[gen] ."<br> ";
  }
   
}
 

            
            
?>

<script>
    $(document).ready(function() {
      
        
        $("#addGame").click(function(){
            $('#addGameModel').modal("show");
            
        });//click
        
        $("#report").click(function(){
          $("#reportModal").modal("show");
        });//click
        
        
        
      
        
       
        
        
    });//doc ready
    
   function apiCall(){
         
    }
    
</script>


<html>
    <head>
        <title>Admin Page</title>
    </head>
    
    <body>
      <style>
        body{
          text-align:center;
        }
      </style>
        <!-- Button trigger modal -->
        <button type="button" id="addGame" class="btn btn-primary">
          Add Game
        </button> <br><br>
        <button type="button" id="report" class="btn btn-primary">
          View Reports
        </button>
       
        
        <!-- Modal Add Game-->
        <div  id="addGameModel" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4>Add Game to database</h4>
                <!-- Game Form -->
                <form method="get">
                  Name:<br>
                  <input type="text" name="gameName"/><br>
                  Publisher:<br>
                  <input type="text" name="gamePub"/><br>
                  Release Date:<br>
                  <input type="text" name="gameRelease"/><br>
                  System:<br>
                  <input type="text" name="gameSystem"/><br><br>
                  <input type="submit" name="gameSubmit" class="btn btn-primary" text="Submit"/>
                  </form>
                  
                
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        
        
        <div  id="reportModal" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Game</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4>Reports</h4>
                
                <div id="game_report">
                  <h3><strong>Games</strong></h3>
                  <?=nesReport()?>
                  <?=genReport()?>
                  <?=saturnReport()?>
                </div>
                
                <div id="system_report">
                  <h3><strong>Systems</strong></h3>
                  <?=systemReport()?>
                </div>
                
                <div id="accessory_report">
                  <script>
                     
                  </script>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>
        
       
                
    </body>
    
</html>