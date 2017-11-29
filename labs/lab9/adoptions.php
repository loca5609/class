<?php
    include 'inc/header.php';
    
     function getPetList() {
            include '../../dbConn.php';
            
            $sql = "SELECT *
                    FROM adoptees"; 
                    
                            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $record = $stmt->fetchAll(PDO::FETCH_ASSOC);//expecting only one record
 
            return $record;
        }
?>
<div id="petInfo">
    
</div>

<?php
    
        $pets = getPetList();
        //print_r($pets);
        
        foreach ($pets as $pet){
            echo "Name: ";
            echo "<a href='#' class='petLink' id='". $pet['id'] ."'>" .$pet['name'] . "</a><br>";//id
            echo "Type: " . $pet['type'] . "<br>";
            echo "<hr><br>";
        }

?>
<script>
    
    
    $(document).ready(function(){    
        $(".petLink").click(function() { 
            $.ajax({
    
            type: "GET",
            url: "api/getPetInfo.php",
            dataType: "json",
            data: { "id": $(this).attr('id') },
            success: function(data,status) {
            //alert(data);
            
            $("#petInfo").html(" Age: " + data.age + "<br>" +
            data.description +"<img src='img/"+data.pictureURL +"'><br>");
            
            },
            complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
            }
    
    });//ajax
        });
            });//runs when the documnent is loaded
    
</script>
        
<?php
    include 'inc/footer.php';
?>

<html>
    <head>
        <title>Adoptions</title>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
    </head>
    
    <body>
        
        <div id="petInfo">
    
        </div>
    </body>
</html>