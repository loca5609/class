<?php
include 'php/header.php';
?>

<script>
    $(document).ready(function() {
        
        $("#addItem").click(function(){
            $('#addItemModal').modal("show");
            
        });//click
        
        
    });//doc ready
</script>


<html>
    <head>
        <title>Admin Page</title>
    </head>
    
    <body>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
  Launch demo modal
</button>
        
        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="addItemModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
                
    </body>
    
</html>