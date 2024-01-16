<!DOCTYPE html>
<html>
<head>
    <title>Lab09d</title>
    <style>
    body {
        font-family: arial, sans-serif;
    }
    .styled-button {
        padding: 7px 10px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 25px;
    }

    .styled-button:hover {
        background-color: #2980b9;
    }

    .imgs-container {
        padding: 15px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image {
        padding: 15px;
        box-sizing: border-box;
        width: 33.33%;
        float: left;

    }

    .image img {
        max-height: 65vh;
    }

    figcaption {
        text-align: center;
    }

    form, h2 {
        text-align: center;
    }

    a {
        display: flex;
        justify-content: center;
        text-align: center;
    }
    </style>
</head>
<body>
    <?php
    $connect = mysqli_connect("localhost", "t27cheng", "RFTWsePZ", "t27cheng") or die(mysqli_error());
    if ($connect) {
        echo "<p>Connected to the database 't27cheng' successfully</p>";
        
        echo "<div class='user'>";
        echo "<h2>Select a Location and Year to Find Photos</h2>";
        echo "<form action='lab09d.php' method='post'>";
        echo "<label for='location'>Location: </label>";
        $sql1 = "SELECT DISTINCT location FROM photograph";
        $result = $connect->query($sql1);
        $uniqueLoc = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $uniqueLoc[] = $row['location'];
            }
    
            echo "<select name='location' id='location' required>";
            foreach ($uniqueLoc as $location) {
                echo "<option value='$location'>$location</option>";
            }
            echo "</select>";
        } else {
            echo "No locations found.";
        }
        echo "<br>";
        echo "<br>";
        echo "<label for='year'>Year: </label>";
        $sql2 = "SELECT DISTINCT YEAR(date_taken) AS year FROM photograph";
        $result2 = $connect->query($sql2);
        $uniqueYear = [];
        if ($result->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $uniqueYear[] = $row['year']; 
            }

            echo "<select name='year' id='year' required>";
            foreach ($uniqueYear as $year) {
                echo "<option value='$year'>$year</option>";
            }
            echo "</select>";
        } else {
            echo "No Years found.";
        }
        echo "<br>";
        echo "<br>";
        echo "<button type='submit' class='styled-button'>Submit</button>";
        echo "<br><br>";
        echo "</form>";
        echo "</div>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userLoc = isset($_POST['location']) ? $_POST['location'] : null;
            $userYr = isset($_POST['year']) ? $_POST['year'] : null;

            $sql3 = "SELECT * FROM photograph WHERE location = '$userLoc' AND YEAR(date_taken) = '$userYr'";
            $result3 = $connect->query($sql3);
            echo "<div class='imgs-container'>";
            if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                    echo "<div class='image'>";
                    echo "<img src='{$row['picture_url']}' style='width: 100%'>";
                    echo "<figcaption class='img-cap'>";
                    echo "Subject: {$row['subject']} <br>";
                    echo "Location: {$row['location']}";
                    echo "</figcaption>";
                    echo "</div>";
                    echo '<br>';
                    echo '<br>';
                }
            }
            echo "</div>";
        }
    }
    ?>
    <?php 
        echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09e.php'>Go to Part E</a><br>";
        echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09c.php'>Go back to Part C</a>";
    ?>
</body>
</html>
