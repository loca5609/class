<html>
    <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
       <link rel="stylesheet" type="text/css" href="css/styles.css" />   
       <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
       
    <script>
    $.ajax({

            type: "GET",
            url: "https://api.fixer.io/latest",
            dataType: "json",
            data: {"date": $("#date").val()},
            success: function(data,status) {
              //rates is the assoc. array of currency types, the key is the currency code, value is the exchange from the base currency
              //alert(data.rates["AUD"]);
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
        function apiCall(){
            
        
    }  //function
        
    </script>
    
    </head>    
    
    <body>
        <h1>API Calls</h1>
        <p><h3>Date entry instructions</h3>
        This site allows you to view the currency exchange rates from past dates
        Please enter all dates in the format "YYYY-MM-DD"
        </p>
        <form>
            <input type="text" id="date"/>
            Date
            <button onClick="apiCall()">GO</button>
        </form>
        <div id="rates">
            
        </div>
        
        
        
    </body>
    
</html>