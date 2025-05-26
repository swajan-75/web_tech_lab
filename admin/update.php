<?php


$con = mysqli_connect("127.0.0.1:3399", "root", "", "aqi");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_name = $_POST['user_name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user_dob = $_POST['dob'];
        $user_country = $_POST['country'];
        $user_color = $_POST['color'];
        $user_gender = $_POST['gender'];
        $id = $_POST['id'];
        $sql = "UPDATE user SET 
            username='$user_name',
            email='$user_email',
            password='$user_password',
            dob='$user_dob',
            country='$user_country',
            gender='$user_gender',
            color='$user_color'
            WHERE id=$id";
            mysqli_query($con, $sql);
            mysqli_close($con);

            header("Location: admin.php");
            exit();
            
            
    }
?>