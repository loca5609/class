<!DOCTYPE html>
<html>
    <head>
        <title> Dice Roller </title>
        <meta charset="utf-8" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        <header>
            <h1>Dice Roller</h1>
        </header>
        <div id="main">
       
        
        </div>
        <div class="button">
        <form>
            <input type="submit" value="Roll Again" />
        </form>
        </div>
        <script type="text/javascript">
            var rollArray = [0,0,0,0,0,0];
            

            function play(){
                for (var i = 0; i<6;i++ ) 
                {
                      var temp = Math.floor(Math.random() * (6 - 1 + 1)) + 1;
                      //console.log(temp);
                      //rollArray made for 
                      rollArray.push(temp);
                      display(temp);
                }
                
            }
            
            function display(roll){
                var dice;
                switch(roll)
                    {
                    case 1:
                        dice = '1';
                        console.log(dice);
                        break;
                    case 2:
                        dice = '2';
                        console.log(dice);
                        break;
                    case 3:
                        dice = '3';
                        console.log(dice);
                        break;
                    case 4: 
                        dice= '4';
                        console.log(dice);
                        break;
                    case 5:
                        dice = '5';
                        console.log(dice);
                        break;
                    case 6:
                        dice = '6';
                        console.log(dice);
                        break;
                    }
                    /*
                    var btn = document.createElement("BUTTON");        // Create a <button> element
                    var t = document.createTextNode("CLICK ME");       // Create a text node
                    btn.appendChild(t);                                // Append the text to <button>
                    document.body.appendChild(btn);
                    */
                    
                    
                    
                    document.getElementById("main").innerHTML += "<img id='dice"+dice+"' src='img/"+dice+".gif' />";
                    document.getElementById("main").innerHTML += "<p>"+roll+"</p>";
                    document.getElementById("main").innerHTML += "</div>";
                    
                    
            }
            play();
        </script>
        
        
    </body>
</html>