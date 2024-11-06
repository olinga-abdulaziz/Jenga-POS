<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="../css/global.css">
    <style>
    a {
        text-decoration: none;
        color: gray;
    }
    </style>
</head>
<body>
<div class="container-main">
        <div class="box1">
        <?php include('navbar.php') ?>
        </div>
        <div class="box2">
            <div class="top-pos">
                <h2>NJENGA POITN OF SALE SYSTEM</h2>
            </div>
            <div class="pos-body">
                <section class="section-center">
                    <form action="receipt.php" method="POST" class="form-add receipt">
                        <button name="btnComplete">Complete</button>
                      <div>
                         <h3>Receipt</h3>
                      </div>
                      <div>
                            <div class="dhead">
                                <div>Product</div>
                                <div>Type</div>
                                <div>Quantity</div>
                                <div>Price</div>
                            </div>
                            <?php
                                     $conn=mysqli_connect('localhost','root','','pos');
                                     $sql="SELECT * FROM `pos` WHERE 1";
                                     $exec=mysqli_query($conn,$sql);
                                     $count=mysqli_num_rows($exec);

                                     if ($count==0) {
                                        # code...
                                     }else{
                                        while ($row=mysqli_fetch_array($exec)) {
                                            $product=$row['product'];
                                            $type=$row['type'];
                                            $quantity=$row['quantity'];
                                            $price=$row['price'];
                                            $product=$row['product'];
                                            $date=$row['date'];
                                ?>
                            <div class="dhead ddd1">
                                <div><?php echo $product ?></div>
                                <div><?php echo $type ?></div>
                                <div><?php echo $quantity ?></div>
                                <div><?php echo $price ?></div>
                            </div>
                            <?php }}  ?>

                            <div class="recTot">
                            <?php
                                  $conn=mysqli_connect("localhost","root","","pos");
                                  $sql="SELECT *,SUM(price) AS tot FROM `pos` WHERE 1";
                                  $exec=mysqli_query($conn,$sql);
                                  $fetch=mysqli_fetch_array($exec);
                                  
                                  $total= $fetch['tot'];
                            ?>
                                <strong>TOTAL : KSH <?php echo $total ?></strong>
                            </div>
                            <small>DATE : 2/3/2025</small>
                        </div>
                        <?php 
                        
                        if (isset($_POST['btnComplete'])) {
                            # code...
                            $conn=mysqli_connect('localhost','root','','pos');
                            $sql="DELETE FROM `pos` WHERE 1";
                            $exec=mysqli_query($conn,$sql);

                            if ($exec) {
                                # code...
                                echo '
                                <section class="black-container">
                                        <div class="popbox">
                                            <center>
                                                <div><strong>Success !</strong></div>
                                                <div><small>Checkout Succesfully</small></div>
                                                <div>
                                                    <a href="makesell.php"><button>Done</button></a>
                                                </div>
                                            </center>
                                        </div>
                                    </section>
                                ';
                            }else{
                                echo 'sql err';
                            }

                        }else{
                            echo 'sql error';
                        }
                        ?>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>