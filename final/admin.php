<?php
include 'php/header.php';

include '../dbConn.php';
//Game Modal insert record
if(isset($_GET['gameSubmit'])){
  
  $sql = "INSERT INTO game (name,publisher,release_date,system) VALUES (:name,:publisher,:release,:system)";
  $namedParameters[':name'] = $_GET['gameName'];
  $namedParameters[':publisher'] = $_GET['gamePub'];
  $namedParameters[':release'] = $_GET['gameRelease'];
  $namedParameters[':system'] = $_GET['gameSystem'];
                            
            $stmt = $conn->prepare($sql);
            
            $stmt->execute($namedParameters);
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
    
</script>


<html>
    <head>
        <title>Admin Page</title>
    </head>
    
    <body>
        <!-- Button trigger modal -->
        <button type="button" id="addGame" class="btn btn-primary">
          Add Game
        </button> <br>
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
                  <?=nesReport()?>
                  <?=genReport()?>
                  <?=saturnReport()?>
                </div>
                
                <div id="system_report">
                  
                </div>
                
                <div id="accessory_report">
                  
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