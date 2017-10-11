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

echo '<div id="animal">';
if($_GET[animal]=="1"){
    echo "Your favorite animal is the CAT!<br>";
    $animal = "cat";
}
if($_GET[animal]=="2"){
    echo "Your favorite animal is the DOG!<br>";
    $animal = "dog";
}
if($_GET[animal]=="3"){
    echo "Your favorite animal is the LIZARD!<br>";
    $animal = "lizard";
}
if($_GET[animal]=="4"){
    echo "Your favorite animal is the COW!<br>";
    $animal = "cow";
}
if($_GET[animal]=="5"){
    echo "Your favorite animal is the LLAMA!<br>";
    $animal = "llama";
}
if($_GET[animal]=="6"){
    echo "Your favorite animal is the ALPACA!<br>";
    $animal = "alpaca";
}
if($_GET[animal]=="7"){
    echo "Your favorite animal is the MOLE-RAT!<br>";
    $animal = "molerat";
}
echo "</div>";


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
        <img src="img/<?php echo $animal;?>.jpg" alt="animal"></img>
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