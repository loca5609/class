<!DOCTYPE html>
<?php
$backgroundImage = "img/sea.jpg";
if (isset($_GET['keyword'])) {
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword']);
   
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
        
        <?php
            if(!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow <br/> with random images from Pixibay.com </h2>";
            } else {
                // display carousel
            }
        ?>
        <form>
            <input type="text" name="keyword" placeholder="Keyword" />
            <input type="submit" value="Submit" />
        </form>
        <br/> <br/>
    </body>
</html>