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
                <h2>NJENGA POINT OF SALE SYSTEM</h2>
            </div>
            <div class="pos-body">
                <section class="section-center">
                    <form action="edit_report.php" method="POST" class="form-add">
                    <?php
                            if (isset($_POST['btnEdit'])) {
                                $product=$_POST['product'];
                                $type=$_POST['type'];
                                $quantity=$_POST['quantity'];
                                $price=$_POST['price'];
                                $id=$_POST['id'];
                                $date=$_POST['date'];
                            }
                        ?>
                        <div>
                            <h2>Edit Sales Report</h2>
                        </div>
                        <div>
                            <small>Product</small>
                        </div>
                        <div>
                            <input type="text" name="product" value="<?php echo $product  ?>">
                            <input type="text" name="id" value="<?php echo $id  ?>">
                        </div>
                        <div>
                            <small>Type</small>
                        </div>
                        <div>
                            <input type="text" name="type" value="<?php echo $type ?>">
                        </div>
                       
                        <div>
                            <small>Quantity</small>
                        </div>
                        <div>
                            <input type="text" name="quantity" value="<?php echo $quantity ?>">
                        </div>
                        <div>
                            <small>Date</small>
                        </div>
                        <div>
                            <input type="text" name="date" value="<?php echo $date ?>">
                        </div>
                        <div>
                            <small>Price</small>
                        </div>
                        <div>
                            <input type="text" name="price" value="<?php echo $price ?>">
                        </div>
                        <div>
                            <button class="" name="btnUpdate">Update Product</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <?php
                      if (isset($_POST['btnUpdate'])) {
                        $conn=mysqli_connect('localhost','root','','pos');
                        $type=$_POST['type'];
                        $quantity=$_POST['quantity'];
                        $price=$_POST['price'];
                        $size=$_POST['size'];
                        $id=$_POST['id'];
                        $product=$_POST['product'];
                        $id=$_POST['id'];
                    
                        $sql="UPDATE `sales` SET `product`='$product',`type`='$type',`quantity`='$quantity',`date`='$date',`price`='$price' WHERE id='$id'";
                        $exec=mysqli_query($conn,$sql);

                        if ($exec) {
                            header('location:dashboard.php');
                        }else{
                            echo 'sql error';
                        }
                      }
                ?>
    </div>
</body>
</html>