<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    
    <div class="container">
        <form class="form-div" action="index.php" method="POST">
            <div class="input-div">
                <h2>Login</h2>
            </div>
            <div class="input-div">
                <input type="text" name="username" required="true" placeholder="Enter Username" class="input">
            </div>
            <div class="input-div">
                <input type="password" name="password" id="pwd" required="true"  placeholder="Enter password" class="input">
            </div>
            <div class="input-div">
                <input type="checkbox" id="check" onclick="showPwd()"> <small>Show/Hide</small>
            </div>
            <div class="input-div">
                <button class="btnLogin" name="btnLogin">Login</button>
            </div>
            <div class="input-div">
             <small>You do not have account ? <a href="register.php">Register</a></small>
               
            </div>

</form>
    </div>
</body>
</html>
<?php
if (isset($_POST['btnLogin'])) {
    $conn=mysqli_connect("localhost","root","","pos");
 
    $username=$_POST['username'];
    $passowrd=$_POST['password'];
 
    $sql="SELECT * FROM `users` WHERE username='$username' and password='$passowrd'";
 
    $exec=mysqli_query($conn,$sql);
 
    $count=mysqli_num_rows($exec);
 
    if($count > 0){
       
       $_SESSION["username"]=$username;
         header('location:dashboard.php');
    }else{
     echo '
     <section class="black-container">
                <div class="popbox">
                    <center>
                        <div><strong>Failed !</strong></div>
                        <div><small>Incorrect username or password</small></div>
                        <div>
                            <a href="index.php"><button>Done</button></a>
                        </div>
                    </center>
                </div>
            </section>
     ';
    }
 
 
 }



?>

<script src="../js/app.js"></script>