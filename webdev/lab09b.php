<!DOCTYPE html>
<html>
<head>
    <title>Lab09b</title>
    <style>
        body {
        }

        .container {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 90vw;
        }

        td, th {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #A7A9FF;
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
        echo "<p> Connected to the database 't27cheng' successfully</p>";

        $sql = "SELECT * FROM photograph";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Picture Number</th>";
        echo "<th>Subject</th>";
        echo "<th>Location</th>";
        echo "<th>Date Taken</th>";
        echo "<th>Picture URL</th>";
        echo "</tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['picture_number']}</td>";
            echo "<td>{$row['subject']}</td>";
            echo "<td>{$row['location']}</td>";
            echo "<td>{$row['date_taken']}</td>";
            echo "<td>{$row['picture_url']}</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
        echo "<br>";
        } else {
            echo "0 results";
        }
    $connect->close();        
    }
    echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09c.php'>Go to Part C </a></br>";
    echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09a.php'>Go back to Part A</a>";
    ?>
</body>
</html>