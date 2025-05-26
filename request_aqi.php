<?php
session_start(); 
if(!isset($_SESSION['is_login'])){
        echo "<script>alert('Login first')</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Selector</title>
    <link rel="stylesheet" href="aqi.css">
</head>
<body>
     <a style="margin: 10px;text-decoration: none;" href="member1.php">Swajan Barua</a>
    <a style="margin: 10px;text-decoration: none;" href="member2.php">Jannatul Hoque Samy</a>
    
   <?php 
   if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
       echo "
        <div style='text-align: right; margin: 10px;'>
        <a href=''>$username</a>
        <a href='logout.php'>Logout</a>
    </div>";
   }
   ?>
    
    <form method="POST" action="show_aqi.php">
        <table class="">
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
        <div style="text-align: center;">
    <input class="btn"  type="submit" value="Get Data">
</div>
    </form>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
        var checked_box = document.querySelectorAll('input[name="city[]"]:checked');
            if (checked_box.length < 10) {
                alert('Please select ' + (10 - checked_box.length) + ' more cities before submitting.');
                event.preventDefault();
                }
        });
</script>

</body>
</html>
