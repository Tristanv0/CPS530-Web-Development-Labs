<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab08.css">
    <title>Lab 08</title>
</head>
<body>
    <?php
        function incrementHitCounter() {
            $hits = isset($_COOKIE['hits']) ? (int)$_COOKIE['hits'] : 0;
            $hits++;
            setcookie('hits', $hits, time() + (86400 * 365), "/"); 
            return $hits;
        }
        
        $hits = incrementHitCounter();
        echo "<p class='counter'>Visits: $hits</p>";
    ?>
    <?php
        $time = date("G");
        if ($time >= 0 && $time <= 5) {
            echo "<div class='background' style='background-image: url(\"https://www.cs.ryerson.ca/~t27cheng/Lab08/images/night.jpg\");'>";
            echo "<p>Good Night</p>";
        } elseif ($time >= 6 && $time <= 11) {
            echo "<div class='background' style='background-image: url(\"https://www.cs.ryerson.ca/~t27cheng/Lab08/images/morning.jpg\");'>";
            echo "<p>Good Morning</p>";
        } elseif ($time >= 12 && $time <= 17) {
            echo "<div class='background' style='background-image: url(\"https://www.cs.ryerson.ca/~t27cheng/Lab08/images/afternoon.jpg\");'>";
            echo "<p>Good Afternoon</p>";
        } else {
            echo "<div class='background' style='background-image: url(\"https://www.cs.ryerson.ca/~t27cheng/Lab08/images/evening.jpg\");'>";
            echo "<p>Good Evening</p>";
        }
        echo "</div>";
    ?>
    <?php 
        echo "<div class='mtable'>";
        echo "<p>Enter the number of rows and columns (between 3 and 12)</p>";
        echo "<form action='lab08b.php' method='post' target='_blank'>";
        echo "<label for='rows'>Rows: </label>";
        echo "<input type='number' name='rows' id='rows' min='3' max='12' required>";
        echo "<br>";
        echo "<br>";
        echo "<label for='columns'>Columns: </label>";
        echo "<input type='number' name='columns' id='columns' min='3' max='12' required>";
        echo "<br>";
        echo "<br>";
        echo "<button type='submit' class='styled-button'>Generate Table</button>";
        echo "</form>";
        echo "</div>";
    ?>
    <?php
        echo "<div class='image-links'>";
        echo "<h2>Choose a gif below to show!</h2>";
        $imageFiles = ['ghost.gif', 'monster.gif', 'dracula.gif'];

        foreach ($imageFiles as $imageFile) {
            echo "<a class='images' href='?image=$imageFile'>$imageFile</a>";
            echo "<br>";
            echo "</a>";
        }
        echo "</div>";
    ?>
    <?php
        if (isset($_GET['image'])) {
            $selectedImage = htmlspecialchars($_GET['image']);
            echo "<img class='selected-image' src='images/$selectedImage' alt='$selectedImage'>";
        }
        echo "<h2 class='currgif'>Current gif shown: $selectedImage</h2>";
    ?>
</body>
</html>
    
