<!DOCTYPE html>
<?php
//make pixabay account to get the api key
$backgroundImage = "img/sea.jpg";
if (isset($_GET['keyword'])) {
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)];
}
?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
                background-image: url('<?=$backgroundImage ?>');
            }
        </style>
    </head>
    <body>
        <br/> <br/>
         <form>
            <input type="text" name="keyword" placeholder="Keyword" />
            <input type="submit" value="Submit" />
        </form>
        
        <?php
            if(!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow <br/> with random images from Pixibay.com </h2>";
            } else 
            {
                // display carousel
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!--Indicators Here -->
                <ol class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                         echo "<li data-target='#carousel-exaple-generic' data-slide-to='$i'";
                         echo ($i==0)?" class='active'": "";
                         echo '></li>';
                    }
                    ?>
                </ol>
                <!--Wrapper for Images -->
                <div class="carousel-inner" role="listbox">
                    <?php 
                    for ($i = 0; $i < 5; $i++) 
                    {
                        do 
                        {
                            $randomIndex = rand(0,count($imageURLs));
                        }
                     while (!isset($imageURLs[$randomIndex]));
                     echo '<div class="item ';
                     echo ($i==0)?"active": ""; //what the fuck is this
                     echo '">';
                     echo '<img src"'.$imageURLs[$randomIndex].'">';
                     echo '</div>';
                     unset($imageURLs[$randomIndex]);
                    }
            ?>
                </div>
                <!-- Controls Here -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
             <?php
                }
             ?>
       
        
       
        <br/> <br/>
    </body>
</html>