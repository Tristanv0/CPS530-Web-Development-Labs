<!DOCTYPE html>
<html>
<head>
    <title>Lab09e</title>
    <style>
        body {
            font-family: arial, sans-serif;
        }
        .title {
            text-align: center;
        }
        .imgs-container {
            padding: 15px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .image {
            padding: 15px;
            box-sizing: border-box;
            max-width: 75%;
            float: left;

        }

        .image img {
            max-height: 75vh;
        }
        .counter {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
            border-radius: 5px;
            color: white;
            opacity: 0.8;
            z-index: 1;
        }

        a {
            display: flex;
            justify-content: center;
        }

    </style>
</head>
<body>
    <?php 
        $connect = mysqli_connect("localhost", "t27cheng", "RFTWsePZ", "t27cheng") or die(mysqli_error());
        if ($connect) {
            echo "<p>Connected to the database 't27cheng' successfully</p>";
            $sql = "SELECT * FROM photograph ORDER BY RAND() LIMIT 1";
            $result = $connect->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<h2 class='title'>Random image from 'photograph' database</h2>";
                echo "<div class='imgs-container'>";
                $row = $result->fetch_assoc();
                echo "<div class='image'>";
                echo "<img src='{$row['picture_url']}' style='width: 100%'>";
                echo "<figcaption class='img-cap'>";
                echo "Subject: {$row['subject']} <br>";
                echo "Location: {$row['location']}";
                echo "</figcaption>";
                echo "</div>";
            }
            echo "</div>";

            $sql1 = "SELECT * FROM photograph";
            $result1 = $connect->query($sql1);

            if ($result1->num_rows > 0) {
                echo "<p class='counter'>{$result1->num_rows} images in database</p>";
            }
        }
        echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09d.php'>Go back to Part D</a><br>";
    ?>
</body>
</html>