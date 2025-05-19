<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Selector</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <form method="POST" action="show_aqi.php">
        <table>
            <tr>
                <th>City</th>
                <th>Select</th>
            </tr>
            <?php 
            $con = mysqli_connect("127.0.0.1:3399", "root", "", "aqi");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM info";
            $obj = mysqli_query($con, $sql);

            while ($entry = mysqli_fetch_assoc($obj)) {
                $city = $entry['city'];
                echo "<tr>
                        <td>$city</td>
                        <td><input type='checkbox' name='city[]' value='$city'></td>
                      </tr>";
            }

            mysqli_close($con);
            ?>
        </table>
        <br>
        <input type="submit" value="Get Data">
    </form>

</body>
</html>
