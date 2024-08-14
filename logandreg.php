<?php

include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // Encrypt passwords
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    // Check if passwords match before proceeding
    if($pass !== $cpass){
        $message[] = 'Password does not match!';
    } else {
        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email'") or die('query failed');

        if(mysqli_num_rows($select) > 0){
            $message[] = 'User already exists!';
        } else {
            // Proceed to insert the new user into the database since passwords match and user does not exist
            mysqli_query($conn, "INSERT INTO `user_form`(name, uname, email, password) VALUES('$name', '$uname', '$email', '$pass')") or die('query failed');
            $message[] = 'Registered successfully.';
            header('location:logandreg.php');
        }
    }
}

session_start();
if(isset($_POST['submit1'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass' ") or die('query failed');

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:products.php');
    }else{
        $message[] = 'Incorrect Password or Email!';
    }

}

?>




<!Doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="css/style1.css">
    <!-- <link rel="stylesheet" href="style3.css"> -->

</head>
<body>
     
<?php
if(isset($message)){
    foreach($message as $message){
        echo '<div class="message" onclick="this.remove();">'.$message.'</div>';

    }
}   
?> 
    
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="login-reg-img/fb.png">
                <img src="login-reg-img/tw.png">
                <img src="login-reg-img/gp.png">
            </div>


            <form action="" method="post" id="login" class="input-group">
                <input type="email" name="email" required placeholder="Enter Email" class="input-field">
                <input type="password" name="password" required placeholder="Enter Password"  class="input-field" >
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <!-- <button type="submit1234" class="submit-btn">Log in</button> -->
                <input type="submit" name="submit1" class="submit-btn" value="Login Now">
            </form>







<!-- REGISTERATION -->


            <form action="" method="post" id="register" class="input-group">
                <input type="text" class="input-field" placeholder="Enter Name" name="name" required>       
                <input type="text" class="input-field" placeholder="Enter Username" name="uname" required>     
                <input type="email" class="input-field" placeholder="Enter Email" name="email" required>
                <input type="password" class="input-field" placeholder="Create Password" name="password" required>
                <input type="password" class="input-field" placeholder="Confirm Password" name="cpassword" required>
                <input type="checkbox" class="check-box"><span>I agree to the Terms and Conditions.</span>
                <!-- <button type="submit" name="submit" class="submit-btn" value="Register_now">Register</button> -->
                <input type="submit" name="submit" class="submit-btn" value="Register Now">
            </form>            
        </div> 

    </div>

  

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left= "-400px";
            y.style.left= "50px";
            z.style.left= "110px";
            
        }
        function login(){
            x.style.left= "50px";
            y.style.left= "450px";
            z.style.left= "0";
            
        }
    </script>



</body>
</html>