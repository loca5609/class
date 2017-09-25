<?php
    $rollArray[5];
    $rollArray = array_fill(0,5,0);
    function play() 
    {
        for($i=1; $i<6; $i++)
            {
                ${"roll" . $i } = rand(1,6);
                $rollArray[$i-1] = ${"roll" . $i };
                display(${"roll" . $i});
            }
        total($rollArray);
    }
    
    
    function display($roll)
    {
        switch($roll)
        {
        case 1:
            $dice = '1';
            break;
        case 2:
            $dice = '2';
            break;
        case 3:
            $dice = '3';
            break;
        case 4: 
            $dice= '4';
            break;
        case 5:
            $dice = '5';
            break;
        case 6:
            $dice = '6';
            break;
        }
        echo "<div id='img$dice'>";
        echo "<img id='dice$dice' src='img/$dice.gif' alt='$dice' />";
        echo "<p>$roll</p>";
        echo "</div>";
    }
    
    function total($rollArray) 
    {
        $total = array_sum($rollArray);
        //all sixes
        if (array_product($rollArray)==7776) {
            echo "<marquee scrollamount=20>WOAH NICE ONE</marquee>";
        }
        echo "<h2>The total is $total</h2>";
    }
    
    //hey dont use this man debug only
    function cheat() {
        $rollArray = array_fill(0,5,6);
        for($i=1; $i<6; $i++)
            {
                ${"roll" . $i} = $rollArray[$i-1];
                display(${"roll" . $i});
            }
            total($rollArray);
    }

?>