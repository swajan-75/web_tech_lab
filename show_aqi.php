<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php 
    $con = mysqli_connect("127.0.0.1:3399", "root", "", "aqi");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //$sql = "SELECT * FROM info";
    if (isset($_POST['city'])) {
        $citys = $_POST['city'];
        
        $st =" ";
        foreach ($citys as $city) {
            //echo "<p>Selected City: " . $city . "</p>";
            $st .= "'$city',";
        }
        $st = substr($st, 0, -1);
        $qq = "Select * from info where city in(". $st .")";
        //echo "$st" ;
        //echo "$qq" ;
        

    }else{
        echo "<p>No city selected.</p>" . $_POST['city'];
    }





    $obj = mysqli_query($con, $qq);
    //echo "$_POST['qq']";
    

    echo "<table>
            <tr>
                <th>City</th>
                <th>Country</th>
            </tr>";

    while ($entry = mysqli_fetch_assoc($obj)) {
        echo "<tr>
                <td>" . htmlspecialchars($entry['city']) . "</td>
                <td>" . htmlspecialchars($entry['country']) . "</td>
              </tr>";
    }
    echo "</table>";
    mysqli_close($con);
    ?>
    
    <?php

    /*if (isset($_POST['city'])) {
        $citys = $_POST['city'];
        
        $st =" ";
        foreach ($citys as $city) {
            //echo "<p>Selected City: " . $city . "</p>";
            $st .= "'$city',";
        }
        $st = substr($st, 0, -1);
        $qq = "Select * from info where city in(". $st .")";
        //echo "$st" ;
        echo "$qq" ;
        

    }else{
        echo "<p>No city selected.</p>" . $_POST['city'];
    }
    */
    ?>
</body>
</html>
