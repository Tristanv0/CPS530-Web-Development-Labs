<!DOCTYPE html>
<html>
<head>
    <title>Lab09a</title>
</head>
<body>
    <?php
    $connect = mysqli_connect("localhost", "t27cheng", "RFTWsePZ", "t27cheng") or die(mysqli_error());
    if ($connect) {
        echo "Connected to the database 't27cheng' successfully<br>";

    $sql = "CREATE TABLE IF NOT EXISTS photograph (
        picture_number INT AUTO_INCREMENT PRIMARY KEY,
        subject VARCHAR(255),
        location VARCHAR(255),
        date_taken DATE,
        picture_url VARCHAR(500)
    );";

        if (mysqli_query($connect, $sql)) {
            echo "Table 'photograph' created or already exists<br>";
        } else {
            echo "Error creating table: " . mysqli_error($connect);
        }
    } else {
    echo "Failed to connect to the database";
    }
    ?>

    <?php 
        $sql = "INSERT INTO photograph (picture_number, subject, location, date_taken, picture_url)
        VALUES
        ('1', 'Cat', 'Ephesus, Greece', '2023-07-12', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/ephesus.jpg'),
        ('2', 'Mountains', 'Naples, Italy', '2023-07-15', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/naples1.jpg'),
        ('3', 'Shoreline', 'Naples, Italy', '2023-07-15', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/naples2.jpg'),
        ('4', 'Colosseum', 'Rome, Italy', '2023-07-07', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/rome1.jpg'),
        ('5', 'Arch of Titus', 'Rome, Italy', '2023-07-07', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/rome2.jpg'),
        ('6', 'Altare della Patria', 'Rome, Italy', '2023-07-07', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/rome3.jpg'),
        ('7', 'Steps of Santorini', 'Santorini, Greece', '2023-07-11', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/santorini1.jpg'),
        ('8', 'View of Santorini', 'Santorini, Greece', '2023-07-11', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/santorini2.jpg'),
        ('9', 'Sunset', 'Mediterranean Sea', '2023-07-11', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/sunset.jpg'),
        ('10', 'The Golden Roof', 'Vatican City', '2023-07-08', 'https://www.cs.torontomu.ca/~t27cheng/Lab09imgs/vaticancity1.jpg');";
    
        if (mysqli_query($connect, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Value already in database <br>";
        }
    echo "<a href='https://webdev.cs.torontomu.ca/~t27cheng/lab09b.php'>Go to Part B</a>";
    ?>
</body>
</html>


