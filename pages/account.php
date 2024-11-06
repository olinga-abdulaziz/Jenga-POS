<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beuty SPA | Dashboard</title>
    <link rel="stylesheet" href="../css/global.css">
    <style>
    a {
        text-decoration: none;
        color: white;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="box2">
            <?php include('navbar.php') ?>
            <div class="box-main">
                <div class="posBox-container" id="posContainer">
                    <br>
                    <div><h2>My Bookings</h2></div>
                    <br>
                    <hr>
                    <br>
                    <?php
                         $conn=mysqli_connect("localhost","root","","beauty");
                         $user=$_SESSION['username'];
                         $sql="SELECT * FROM `reports` WHERE name='$user'";
                         $exec=mysqli_query($conn,$sql);

                         $count=mysqli_num_rows($exec);

                         if ($count==0) {
                            # code...
                         }else{
                            while ($row=mysqli_fetch_array($exec)) {
                                $id=$row['id'];
                                $service=$row['service'];
                                $price=$row['price'];
                                $description=$row['description'];
                                $date=$row['date'];
                    ?>
                    <form action="delreport.php" method="POST" class="book-item">
                        <div><strong><h2><?php echo $service ?></h2></strong></div>
                        <div><small><strong>Price : <?php  echo $price ?></strong>. </small></div>
                        <div><small><?php echo $description ?></small></div>
                        <br>
                        <div>
                            <strong>DATE : <?php echo $date ?></strong>
                            <strong><h4>Amount :  <?php  echo $price ?></h4></strong><br>
                            <input type="hidden" value="<?php  echo $id ?>" name="id">
                            <button class="btnRemove" name="btnRemove">Remove</button>
                        </div>
                            </form>
                  <?php }}?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="../js/app.js"></script>