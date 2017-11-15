
        
var rollArray = [0,0,0,0,0,0];


function play(){
    for (var i = 0; i<6;i++ ) 
    {
          var temp = ((Math.random() * 6) + 1);
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
            break;
        case 2:
            dice = '2';
            break;
        case 3:
            dice = '3';
            break;
        case 4: 
            dice= '4';
            break;
        case 5:
            dice = '5';
            break;
        case 6:
            dice = '6';
            break;
        }
        /*
        var btn = document.createElement("BUTTON");        // Create a <button> element
        var t = document.createTextNode("CLICK ME");       // Create a text node
        btn.appendChild(t);                                // Append the text to <button>
        document.body.appendChild(btn);
        */
        
        document.getElementById("main").innerHTML = "FUCK";
        /*
        document.getElementById("main").innerHTML += "<img id='dice"+dice+"' src='img/"+dice+".gif' />";
        document.getElementById("main").innerHTML += "<p>"+roll+"</p>";
        document.getElementById("main").innerHTML += "</div>";
        */
        
}


 
    