

<html>
    <head>
        <title>Exchange Rates</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
       <link rel="stylesheet" type="text/css" href="css/styles.css" />   
       <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet"> 
       <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
       
    <script>
    
    
        function apiCall(){
            var baseInput = $("#base").val();
            $.ajax({

            type: "GET",
            url: "https://api.fixer.io/latest?",
            dataType: "json",
            data: {"base": $("#base").val()},
            success: function(data,status) {
              //rates is the assoc. array of currency types, the key is the currency code, value is the exchange from the base currency
              //alert(data.rates["AUD"]);
              $("#rates").append("<h3>"+baseInput+" Exchange Rates: <br></h3>");
              $("#rates").append("Australia "+data.rates["AUD"]+"<br>");
              $("#rates").append("Canada "+data.rates["CAD"]+"<br>");
              $("#rates").append("Japanese Yen "+data.rates["JPY"]+"<br>");
              $("#rates").append("British Pound "+data.rates["GBP"]+"<br>");
              $("#rates").append("Chinese Yuan "+data.rates["CNY"]+"<br>");
              
            
            },
            complete: function(data,status) { //optional, used for debugging purposes
            //alert(status);
            }

        });//ajax
        
    }  //function
       $(document).ready(  function(){
        $("#button").click(function(){ apiCall(); });
    } ); //documentReady
    </script>
    
    </head>    
    
    <body>
        <h1>API Calls</h1>
        <p><h3>Date entry instructions</h3>
        This site allows you to view the currency exchange rates of a certain currency compared to 5 other currencies 
        </p>
        <form onsubmit="return false">
            <input type="text" id="base"/>
            Date
            <button id="button">GO</button>
        </form>
        <form>
            <button id="clear">Clear Screen</button>
        </form>
        <div id="rates">
            
        </div>
        
        
        
    </body>
    
</html>