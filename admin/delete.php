<?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
         $con = mysqli_connect("127.0.0.1:3399", "root", "", "aqi");

        if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $id = intval($_POST['id']);
        $sql = "DELETE FROM user WHERE id = $id";
        mysqli_query($con, $sql);
        mysqli_close($con);
        header("Location: admin.php");
        exit();

     }

?>