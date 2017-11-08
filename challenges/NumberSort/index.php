<html>
    <head>
        
    </head>
    <body>
        <h1>Sorting Numbers</h1>
        <form method='get' id="frm">
            Number 1:
            <input type="text" name="num1" id="num1"/><br>
            Number 2:
            <input type="text" name="num2" id="num2"/><br>
            Number 3:
            <input type="text" name="num3" id="num3"/><br>
            
            <input type="button" onClick= "sort()" value="Sort!"/>
            
        </form>
        
        <p id="numZone"> </p>
            <p id="min"> </p>
            <p id="max"> </p>
        <script type="text/javascript">
        function sort(){
            var num1 = document.getElementById("num1").value;
            var num2 = document.getElementById("num2").value;
            var num3 = document.getElementById("num3").value;
            
            var nums = [num1,num2,num3];
            nums.sort(function(a, b){return a - b});
            document.getElementById("numZone").innerHTML = "<h2>The numbers in assending order are " + nums + "<h2>";
            minMax(nums);
            
        }
        function minMax(nums){
            var small = nums[0];
            var big = nums[nums.length - 1];
            document.getElementById("min").innerHTML = "Smallest number is: " + small;
            document.getElementById("max").innerHTML = "Biggest number is: " + big;
        }
        
        
        
        </script>
    </body>
</html>