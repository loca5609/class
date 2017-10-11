<?php
echo '<div id="php">';
echo "<strong>$_GET[bold]</strong>! Its bold!<br>";
echo "<i>$_GET[italic]</i>! Its Italic!<br>";
echo "</div>";

if($_GET[color]==random){
    $r = rand(0,255);
    $g = rand(0,255);
    $b = rand(0,255);
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <meta charset="utf-8" />
    </head>
    <body style="background-color: rgb(<?php echo $r?>,<?php echo $g?>,<?php echo $b?>">
        <style type="text/css">
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=Noto+Sans|Rye');
        </style>
        <header><h1>HTML Forms!</h1></header>
        
        <div id="text_mod">
            <form action="action_page.php" method="get">
                Text to make <strong>Bold</strong>: <br>
                <input type="text" name="bold" value="<?php echo $_GET[bold];?>"/><br>
                Text to make <i>italic</i>:<br>
                <input type="text" name="italic" value="<?php echo $_GET[italic]; ?>"/> <br><br>
                Random Background Color?<br>
                <input type="radio" name="color" value="random" checked/>Random<br>
                <br>
                Favorite Animal<br>
                <select name="animal">
                    <option value="1">Cat</option>
                    <option value="2">Dog</option>
                    <option value="3">Lizards</option>
                    <option value="4">Cow</option>
                    <option value="5">Llama</option>
                    <option value="6">Alpaca</option>
                    <option value="7">Mole Rat</option>
                    
                </select>
                <input type="submit" value="submit"/>
            </form>
        </div>
    </body>
    
    
</html>