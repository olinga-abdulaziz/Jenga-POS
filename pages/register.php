<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshbite Register </title>
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <div class="container">
        <form class="form-div" action="register.php" method="POST">
            <div class="input-div">
                <h2>Register</h2>
            </div>
            <div class="input-div">
                <input type="text" name="fullname" required="true" placeholder="Enter Full name" class="input">
            </div>
            <div class="input-div">
                <input type="text" name="username" required="true" placeholder="Enter username" class="input">
            </div>
            <div class="input-div">
                <input type="text" name="email" required="true" placeholder="Enter email" class="input">
            </div>
            <div class="input-div">
                <input type="text" name="phone" required="true" placeholder="Enter phone" class="input">
            </div>
            <div class="input-div">
                <input type="password" name="password" id="pwd" required="true"  placeholder="Enter password" class="input">
            </div>
            <div class="input-div">
                <button class="btnLogin" name="btnRegister">Register</button>
            </div>
            <div class="input-div">
                You do not have an account ? <a href="index.php">Login</a>
            </div>

        </form>
    </div>
    <?php
    if (isset($_POST['btnRegister'])) {
        $conn=mysqli_connect("localhost","root","","pos");
        $username=$_POST['username'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
       
        $sql_insert="INSERT INTO `users`(`id`, `name`, `phone`, `email`, `username`, `password`) VALUES (null,'$fullname','$phone','$email','$username','$password')";
        $exec=mysqli_query($conn,$sql_insert);
       
        if ($exec) {
            echo '
            <section class="black-container">
                <div class="popbox">
                    <center>
                        <div><strong>Success !</strong></div>
                        <div><small>Account created success</small></div>
                        <div>
                            <a href="index.php"><button>Done</button></a>
                        </div>
                    </center>
                </div>
            </section>
            ';
           header('location:index.php');
        }else{
           echo "sql error";
        }
       
    }

?>
</body>
</html>





<script src="../js/app.js"></script>