<?php
    session_start();
   // echo "<script>alert('" . $_POST['confirm']) . "');</script>";
   $user_name = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' ) { //
        $user_name = $_POST['user_name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_dob = $_POST['dob'];
        $user_country = $_POST['country'];
        $user_color = $_POST['color'];
        $user_gender = $_POST['gender'];
        setcookie("color", $user_color);
    }

    if(isset($_POST['confirm'])) {
       // echo "<h2>Hello, $user_name!</h2>";
        $con = mysqli_connect("127.0.0.1:3399", "root", "", "aqi");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO user (username, email, password, dob, country, gender, color) VALUES
            ('$user_name', '$user_email', '$user_password', '$user_dob', '$user_country', '$user_gender', '$user_color');";
            $obj = mysqli_query($con, $sql);
            if ($obj) {
               // echo "alert('Data inserted successfully');";
                header("Location: index.php");
                exit();
            } else {
                echo "alert('Error inserting data');";
            }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        color : white;
    }
    .container{
        width: 50%;
        margin: 0 auto;
        text-align: center;
        background-color:rgb(49, 81, 69);
        border-radius: 10px;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
    }
    td{
        padding: 20px;
        text-align: center;
    }
   
</style>

<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="container">
        <div >
            <h1>User Information</h1>
        </div> 
        <table>
            <tr>
                <td>User Name</td>
                <td>:</td>
               <?php echo "<td>$user_name</td>";?>
            </tr>
            <tr>
                <td>User Email</td>
                <td>:</td>
               <?php echo "<td>$user_email</td>";?>
            </tr>
            <tr>
                <td>User Password</td>
                <td>:</td>
               <?php echo "<td>$user_password</td>";?>
            </tr>
            <tr>
                <td>User Date of Birth</td>
                <td>:</td>
               <?php echo "<td>$user_dob</td>";?>
            </tr>
            <tr>
                <td>User Country</td>
                <td>:</td>
               <?php echo "<td>$user_country</td>";?>
            </tr>
            <tr>
                <td>User Gender</td>
                <td>:</td>
               <?php echo "<td>$user_gender</td>";?>
            </tr>
            <tr>
                <td>User color</td>
                <td>:</td>
               <?php echo "<td>$user_color</td>";?>
            </tr>
            <tr>
                <td><input type="submit" value="Confirm" name="confirm"></td>
                <td></td>
                <td><input type="button" value ="Goback" onclick="goback()"> </td>
        </tr>
        </table>

    </div>
        <input type="hidden" name="user_name" value="<?= $user_name ?>">
        <input type="hidden" name="email" value="<?= $user_email ?>">
        <input type="hidden" name="password" value="<?= $user_password ?>">
        <input type="hidden" name="dob" value="<?= $user_dob ?>">
        <input type="hidden" name="country" value="<?= $user_country ?>">
        <input type="hidden" name="gender" value="<?= $user_gender ?>">
        <input type="hidden" name="color" value="<?= $user_color ?>">

    </form>
    
    <script>
        function goback(){
            window.location.href = "index.php";
        }

    </script>
</body>
</html>