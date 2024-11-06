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
                    <form action="edit_item.php" method="POST" class="form-add">
                        <?php
                            if (isset($_POST['btnEdit'])) {
                                $product=$_POST['product'];
                                $type=$_POST['type'];
                                $quantity=$_POST['quantity'];
                                $price=$_POST['price'];
                                $size=$_POST['size'];
                                $id=$_POST['id'];
                            }
                        ?>
                        <div>
                            <h2>Edit Product</h2>
                        </div>
                        <div>
                            <small>Product</small>
                        </div>
                        <div>
                            <input type="text" name="product" value="<?php echo $product ?>">
                        </div>
                        <div>
                            <small>Type</small>
                        </div>
                        <div>
                            <input type="text" name="type" value="<?php echo $type ?>">
                        </div>
                        <div>
                            <small>Size</small>
                        </div>
                        <div>
                            <input type="text" name="size" value="<?php echo $size ?>">
                        </div>
                        <div>
                            <small>Quantity</small>
                        </div>
                        <div>
                            <input type="text" name="quantity" value="<?php echo $quantity ?>">
                        </div>
                        <div>
                            <small>Price</small>
                        </div>
                        <div>
                            <input type="text" name="price" value="<?php echo $price ?>">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                        </div>
                        <div>
                            <button class="" name="btnUpdate">Update Product</button>
                        </div>
                    </form>
                </section>
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
                    
                        $sql="UPDATE `products` SET `product`='$product',`type`='$type',`size`='$size',`quantity`='$quantity',`price`='$price' WHERE id='$id'";
                        $exec=mysqli_query($conn,$sql);

                        if ($exec) {
                            header('location:manage.php');
                        }else{
                            echo 'sql error';
                        }
                      }
                ?>
            </div>
        </div>
    </div>
</body>
</html>