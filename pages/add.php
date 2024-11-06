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
                    <form action="add.php" method="POST" class="form-add">
                        <div>
                            <h2>Add New Product</h2>
                        </div>
                        <div>
                            <small>Product</small>
                        </div>
                        <div>
                            <input type="text" name="product">
                        </div>
                        <div>
                            <small>Type</small>
                        </div>
                        <div>
                            <input type="text" name="type">
                        </div>
                        <div>
                            <small>Size</small>
                        </div>
                        <div>
                            <input type="text" name="size">
                        </div>
                        <div>
                            <small>Quantity</small>
                        </div>
                        <div>
                            <input type="text" name="quantity">
                        </div>
                        <div>
                            <small>Price</small>
                        </div>
                        <div>
                            <input type="text" name="price">
                        </div>
                        <div>
                            <button class="" name="btnAdd">Add Product</button>
                        </div>
                    </form>
                </section>
                <?php
                    if (isset($_POST['btnAdd'])) {
                        $conn=mysqli_connect('localhost','root','','pos');
                        $product=$_POST['product'];
                        $type=$_POST['type'];
                        $quantity=$_POST['quantity'];
                        $price=$_POST['price'];
                        $size=$_POST['size'];
                        
                        $sql="INSERT INTO `products`(`id`, `product`, `type`, `size`, `quantity`, `price`) VALUES (null,'$product','$type','$size','$quantity','$price')";
                        $exec=mysqli_query($conn,$sql);
                    
                        if ($exec) {
                            echo '
                              <section class="black-container">
                                    <div class="popup">
                                        <center>
                                            <div><strong>Suucess !</strong></div>
                                            <div><small>Added successfully</small></div>
                                            <div><a href="add.php"><button>Done</button></a></div>
                                        </center>
                                    </div>
                                </section>
                            ';
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