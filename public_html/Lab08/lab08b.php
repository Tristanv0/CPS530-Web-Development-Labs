<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
        }

        th {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <?php
        // Function to generate the multiplication table
        function generateTable($rows, $columns) {
            echo "<h2>Multiplication Table for $rows x $columns</h2>";
            echo "<table>";
            echo "<tr><th></th>";

            for ($i = 1; $i <= $columns; $i++) {
                echo "<th>$i</th>";
            }

            echo "</tr>";

            for ($i = 1; $i <= $rows; $i++) {
                echo "<tr>";
                echo "<th>$i</th>";

                for ($j = 1; $j <= $columns; $j++) {
                    echo "<td>" . ($i * $j) . "</td>";
                }

                echo "</tr>";
            }

            echo "</table>";
        }

        $rows = isset($_POST["rows"]) ? $_POST["rows"] : "";
        $columns = isset($_POST["columns"]) ? $_POST["columns"] : "";
        generateTable($rows, $columns);
    ?>
</body>
</html>