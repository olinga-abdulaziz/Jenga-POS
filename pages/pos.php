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
        color: white;
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
                <h2>NJENGA POINT OF SALE SYSTEM</h2>
            </div>
            <div class="pos-body">
                <div class="pos-pos-top">
                    <div class="p1">
                        <div class="top-bar-sec">
                            <strong>POINT OF SELL</strong>
                        </div>
                        <?php 
                            if (isset($_POST['btnCard'])) {
                                $product=$_POST['product'];
                                $quantity=$_POST['quantity'];
                                $type=$_POST['type'];
                                $size=$_POST['size'];
                                $price=$_POST['price'];
                                $id=$_POST['id'];
                            }
                        ?>
                        <form action="pos.php" method="post" class="form-pos-sell">
                            <div>
                                <strong>Product</strong>
                            </div>
                            <div>
                                <input type="text" name="product" value="<?php echo $product ?>">
                                <input type="hidden" name="price" value="<?php echo $price ?>">
                                <input type="hidden" name="size" value="<?php echo $size ?>">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                            </div>
                            <div>
                                <strong>Type</strong>
                            </div>
                            <div>
                                <input type="text" name="type"  value="<?php echo $type  ?>">
                            </div>
                            <div>
                                <strong>Quantity</strong>
                            </div>
                            <div>
                                <input type="text" name="quantity">
                            </div>
                            <div><button name="btnAdd">Add</button></div>
                        </form>
                    </div>
                </div>
                <?php
                    if (isset($_POST['btnAdd'])) {
                        $conn=mysqli_connect('localhost','root','','pos');
                        $product=$_POST['product'];
                        $type=$_POST['type'];
                        $price=$_POST['price'];
                        $quantity=$_POST['quantity'];
                        $date=date('d-m-y');
                        $id=$_POST['id'];

                        $sql="INSERT INTO `pos`(`id`, `product`, `type`, `quantity`, `date`, `price`) VALUES (null,'$product','$type','$quantity','$date','$price')";

                        $exec=mysqli_query($conn,$sql);
                        if ($exec) {
                            $sales_sql="INSERT INTO `sales`(`id`,`product`, `type`, `quantity`, `date`, `price`) VALUES (null,'$product','$type','$quantity','$date','$price')";
                            $exec_sales=mysqli_query($conn,$sales_sql);
                            if ($exec_sales) {
                                // .........................
                                $sqlp="SELECT * FROM `products` WHERE id='$id'";
                                     $execp=mysqli_query($conn,$sqlp);
                                     $count1=mysqli_num_rows($execp);

                                     if ($count1==0) {
                                        # code...
                                     }else{
                                        while ($row=mysqli_fetch_array($execp)) {
                                            $old_quantity=$row['quantity'];
                                            $new_Q=$old_quantity-$quantity;
                                            $sqlup="UPDATE `products` SET `quantity`='$new_Q',`price`='$price' WHERE id='$id'";
                                            $execup=mysqli_query($conn,$sqlup);

                                            if ($execup) {
                                                header('location:makesell.php');
                                            }else{
                                                echo 'sql error';
                                            }
                                            
                                        }}
                                           
                            }
                        }else{
                            echo 'sql err';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>


