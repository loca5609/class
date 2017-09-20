<!DOCTYPE html>
<html>
    <head>
        <title> Dice Roller </title>
        <meta charset="utf-8" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer" rel="stylesheet"> 
    </head>
    <body>
        <header>
            <h1>Dice Roller</h1>
        </header>
        <div id="main">
        <?php
        include 'php/functions.php';
        play();
        ?>
        
        </div>
        <div class="button">
        <form>
            <input type="submit" value="Roll Again" />
        </form>
        </div>
        
        
        
    </body>
</html>