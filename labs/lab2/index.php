<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        
        <?php
        
        $randomValue1 = rand(0,2);
        $randomValue2 = rand(0,2);
        $randomValue3 = rand(0,2);
        function displaySymbol($randomValue)
        {
            
            switch ($randomValue)
            {
             case 0: $symbol = "seven";
                    break;
             case 1: $symbol = "lemon";
                    break;
             case 2: $symbol = "orange";
                    break;
            }
            echo "<img src='img/$symbol.png' alt='$symbol' title=\"$symbol\" width=\"70\" />";
        }
        displaySymbol($randomValue1);
        displaySymbol($randomValue2);
        displaySymbol($randomValue3);
        
        function displayPoints()
        {
            //find out which of the three values are the same
            if($randomValue1 == 0 && $randomValue1 == $randomValue2 && $randomValue1 == $randomValue3)
            {
                echo "Wow 1000 Points";
            }
            if($randomValue1 == 1 && $randomValue1 == $randomValue2 && $randomValue1 == $randomValue3)
            {
                echo "Wow 500 points";
            }
            if($randomValue1 == 2 && $randomValue1 == $randomValue2 && $randomValue1 == $randomValue3)
            {
                echo "Wow 250 points";
            }
        }
        
        displayPoints();
        
        
        
      
        
        
        
        
        ?>
        
        
    
    </body>
</html>