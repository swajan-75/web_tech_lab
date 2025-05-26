<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../aqi.css">
</head>

<body>
    <div class="Container">
        <h1> Admin </h1>
        <table class="">
            <tr>
                <th>id</th>
                <th>user name</th>
                <th>email</th>
                <th>password</th>
                <th>date of birth</th>
                <th>Country</th>
                <th>Gender</th>
                <th>Color</th>
                <th> Action</th>
            </tr>
            <?php 
            $con = mysqli_connect("127.0.0.1:3399", "root", "", "aqi");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM user";
            $obj = mysqli_query($con, $sql);

            while ($entry = mysqli_fetch_assoc($obj)) {
                $id = $entry['id'];
                $username = $entry['username'];
                $email = $entry['email'];
                $password = $entry['password'];
                $dob = $entry['dob'];
                $country = $entry['country'];
                $gender = $entry['gender'];
                $color = $entry['color'];
                echo "<tr>
                        <td>$id</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$dob</td>
                        <td>$country</td>
                        <td>$gender</td>
                        <td>$color</td>
                       <td style='white-space: nowrap;'>
                        <form action='delete.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' value='delete'>
                        </form> 

                        <form action='edit.php' method='POST' style='display:inline-block;'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='submit' value='Edit'>
                        </form> 

                        <form action='add.php' method='POST' style='display:inline-block;'>
                        <input type='submit' value='Add'>
                        </form> 




                        </td>
                
                      </tr>";
            }

            mysqli_close($con);
            ?>
        </table>
    </div>
    

</body>
</html>