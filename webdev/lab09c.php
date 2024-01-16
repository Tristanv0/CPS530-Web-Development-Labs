<!DOCTYPE html>
<html>
<head>
    <title>Lab09c</title>
    <style>
        p {
            text-align: center;
            font-weight: bold;
            font-family: arial, sans-serif;
        }

        a {
            text-align: center;
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

        $sql = "SELECT * FROM photograph WHERE location = 'Ontario'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="photo">';
                echo '<img src="' . $row["picture_url"] . '" alt="' . $row["subject"] . '">';
                echo '<div class="caption">Subject: ' . $row["subject"] . ', Location: ' . $row["location"] . '</div>';
                echo '</div>';
                echo '<br>';
            }
        } else {
            echo '<p>No Ontario photos found.</p>';
        }
        echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09d.php'>Go to Part D</a><br>";
        echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09b.php'>Go to back Part B</a>";
    }
    ?>
</body>
</html>