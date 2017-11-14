var selectedWord = "";
var selectedHint = "";
var board = "";
var remainingGuesses = 6;
var words = ["snake","monkey","beetle"];

console.log(words[0]);

//selects a random word from the word array
function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt];
}

//initialize the board
function initBoard() {
    for (var letter in selectedWord){
        board += '_';
    }
}
function updateBoard() {
    $("#word").empty();
  for (var letter of board)
      {
        document.getElementById("word").innerHTML += letter + " ";
      }  
}

function updateMan() {
    $("#hangImg").attr("src","img/stick_"+(6-remainingGuesses)+ ".png");
}
var alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

function createLetters() {
    for(var letter of alphabet){
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}

$(".letter").click(function(){
    console.log("clicked");
});

//Checks to see if the selected letter exists in selectedWord
function checkLetter(letter){
    var positions = new Array();
    
    for(var i =0; i < selectedWord.length; i++){
        console.log(selectedWord)
        if(letter == selectedWord[i]){
            positions.push(i);
        }
    }
    
    if (positions.length > 0){
        updateWord(positions, letter);
        //Winning Guess
        if(!board.includes('_')){
            endGame(true);
        } else {
            remainingGuesses -= 1;
            updateMan();
        }
    } else {
        remainingGuesses -= 1;
    }
}

//Update the current word then call for a board update
function updateWord(positions, letter){
    for(var pos of positions){
        board = replaceAt(board,pos,letter);
    }
    updateBoard();
}

//Helper function for replacing specific indexes in a string
function replaceAt(str,index,value){
    return str.substr(0,index) + value + str.substr(index + value.length);
}

$("#letterBtn").click(function(){
    var boxVal = $("#letterBox").val();
    console.log("You pressed the button and its value was " + boxVal);
})

function endGame(win){
    $("#letters").hide();
    
    if(win) {
        $("#win").show();
    } else {
        $("#lost").show();
    }
}

window.onload = startGame();

function startGame() {
    createLetters();
    pickWord();
    initBoard();
    updateBoard();
    
}

