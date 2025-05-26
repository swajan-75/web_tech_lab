<?php
    session_start();
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //
        $login_user = $_POST['login_user'];
        $login_password = $_POST['login_pass'];
        $con = mysqli_connect("127.0.0.1:3399", "root", "", "aqi");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM user WHERE username = '$login_user' AND password = '$login_password';";
            $obj = mysqli_query($con, $sql);
            if ($obj) {
                $row = mysqli_fetch_assoc($obj);
                    if ($row) {
                        $fetched_username = addslashes($row['username']); 
                        $fetched_password = addslashes($row['password']);
                        /*
                        $color = addslashes($row['color']);
                        $_SESSION['color'] = $color;
                        */
                        $_SESSION['username'] = $fetched_username;
                        header("Location: request_aqi.php"); 
                        exit();
                    } else {
                        echo "<script>alert('invalid username or password');</script>";
                        //$_SESSION['is_valid']= false;
                        //header("Location: index.php");

                        }
            } else {
                echo "alert('invalid username or password');";
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
    .data {
    margin-top: 30px;
    border: 1px solid aliceblue;;
    border-collapse: collapse;
    width: 90%;
    height: 80%;
}

.data td {
    align-content: center;
    text-align: center;
    border: 1px solid aliceblue;;
    border-collapse: collapse;
    


}

.data th {
    align-content: center;
    border: 1px solid aliceblue;;
    border-collapse: collapse;
}

.data tr {
    
    border: 1px solid aliceblue;;
    border-collapse: collapse;
}

.table_container {
    color: aliceblue;
    background-color: green;
    width: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<body>
    <div style="
    display: flex;
        justify-content: center;">
        <img src="logo.png" alt="logo" height="100px" width="100px" style="border-radius: 50%;">
    </div>
    <div style="display: flex; justify-content: center;">
        <h1>Title</h1>
    </div>
    <div style="
        display: flex;
       height: 550px;
       justify-content: center;
        ">
    <div style="background-color: blue; width: 500px;">
        <div style="background-color: purple; color: aliceblue; 
        height: 60%; ">
        <div style="align-content: center;">
            <h3 style="justify-self: center;">Registration form</h3>
            <form method="post" action="process.php" onsubmit="return valid()">
            <table style="margin-left: 30px;" class="reg-form">
                <tr>
                    <td> <label for="">User Name</label></td>
                    <td>:</td>
                    <td> <input type="text" placeholder="User Name " id="username" name="user_name"></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td>:</td>
                    <td><input type="text" placeholder="Email " id="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="">Password </label></td>
                    <td>:</td>
                    <td><input type="password" placeholder="Password" id="password" name="password"></td>
                </tr>
                <tr>
                    <td> <label for="">Confirm Password </label></td>
                    <td>:</td>
                    <td> <input type="password" placeholder="Confirm Password " id="confirm_password" name="confirm_pass"></td>
                </tr>
                <tr>
                    <td><label for="">Date of Birth </label></td>
                    <td>:</td>
                    <td><input type="date" name="dob" id="dob"></td>
                </tr>
                <tr>
                    <td><label for="">Country : </label></td>
                    <td>:</td>
                    <td> <select name="country" id="country" name="country">
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                        <option value="UAE">UAE</option>
                        <option value="India">India</option>
                        <option value="Japan">Japan</option>
                    </select></td>
                </tr>
                
                <tr>
                    <td><label for="">Gender</label></td>
                    <td>:</td>
                    <td><input type="radio" name="gender" id="" value="male">
                        <label for=""> Male</label>
                        <input type="radio" name="gender" id="" value="female">
                        <label for=""> female</label>
                        <input type="radio" name="gender" id="" value="other">
                        <label for=""> other</label></td>
                </tr>
                <tr>
                    <td><label for=""> Color</label></td>
                    <td>:</td>
                    <td><input type="color" name="color"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 100px;"> <input type="submit" style="margin: 20px;align-self: center;" value="submit"></input>
                       
                </tr>
                
            </table>
            <label  for="" id="error"></label>
            <input type="hidden" name="form_name" value="f1">
             </form>
            
            

               
                
        
        
        </div>
       
        

    </div>
    <div style="color: aliceblue;">
        <div style="display: flex; justify-content: center; align-items: center; margin-top: 10px;">
            <h3>Log in<h3>
        </div >
        <form method="post">
            <table style="display: flex; justify-content: center; align-items: center;">
                
                <tr>
                    <td>User Name </td>
                    <td>:</td>
                    <td><input type="text" placeholder="User name" name="login_user"></td>
                </tr>
                <tr>
                    <td>Password </td>
                    <td>:</td>
                    <td><input type="password" placeholder="Password" name="login_pass"></td>
                </tr>
                
            </table>
            
            <div style="display: flex; justify-content: center; align-items: center; margin-top: 10px;">
                <input type="submit" value="Login"  name="is_login"></input>
               
            </div>
            </form>
           
    </div>
    
        
    </div>  
    <div class="table_container">
        <table class="data">
            <tr>
                <th>header 1</th>
                <th>herder 2</th>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
            <tr>
                <td>A</td>
                <td>B</td>
            </tr>
        </table>

    </div>
    <script>
        
       
        function is_name(name){
            //alert(name[0]);
            name = name.trim();
            for(var i =0 ;i<name.length;i++){
                
                if((name[i]>='a' && name[i]<='z') || (name[i]>='A' && name[i]<='Z') || name[i]==" "){
                    
                }else{
                    return false ;
                    break
                }
            }
            return true ;
        }
        function is_date(dob){
            var today = new Date();
            var birthDate = new Date(dob);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
            }
            return age;
        }
        function valid(){
        var gender = document.querySelector('input[name="gender"]:checked');
        var user_name  = document.getElementById("username").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value;
        var confirm_pass = document.getElementById("confirm_password").value;
        var dob = document.getElementById("dob").value;
        var country = document.getElementById("country").value;
        var err = document.getElementById("error");

        

        var msg = "";

        if (user_name === "") {
            msg = "User name cannot be empty.";
        }else if(is_name(user_name)===false){
            msg ="Invalid name";
        }


        else if (email === "") {
            msg = "Email cannot be empty.";
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            msg = "Enter a valid email.";
        }

        else if (password === "") {
            msg = "Password cannot be empty.";
        }else if(password.length<8){
            msg ="Password length must be minimum 8."
        }

        else if (confirm_pass === "") {
            msg = "Confirm Password cannot be empty.";
        } else if (password !== confirm_pass) {
            msg = "Passwords do not match.";
        }

        else if (dob === "") {
            msg = "Date of birth is required.";
        }else if(is_date(dob)<18){
            msg ="Age Must be 18 ";
        }

        else if (country === "") {
            msg = "Please select a country.";
        }


        else if (!gender) {
            msg = "Please select a gender.";
        }


        else {
            msg = "Form submitted successfully!";
            alert(msg);
            err.style.color = "green";
            err.innerText = msg;
           // return;
           return true;
        }

        err.style.color = "red";
        err.innerText = msg;   
        //alert(msg);
        if(msg===""){
            return true;
        }else{
            return false;
        }  
         
    }

    </script>
</body>
</html>