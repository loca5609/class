<?php
include 'php/header.php';
session_start();

?>
<script>
    $(document).ready(function(){
        $("#loginBtn").click(function(){
            var user = $("#user").val();
            var pass = $("#pass").val();
            
            if(user == "admin" && pass=="secret"){
                admit();
            } else {
                alert(user + " " + pass + " is an incorrect login!");
            }
            
        });//loginBtn
        
        
        
    });//docReady
    
    function admit(){
       location.assign("admin.php");
    }
    
    
</script>

<html>
    
    <head>
        <title>Admin Login</title>
        <style>
            @import url('css/styles.css')
        </style>
    </head>
    
    <body>
        <form id="loginForm">
            Username:<br>
            <input type="text" id="user"/><br>
            Password: <br>
            <input type="password" id="pass"/><br><br>
            <a class="btn btn-primary" id="loginBtn">Login</a>
            
        </form>
        
    </body>
    
    
</html>