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
                    <div class="manage-view">
                        <div class="table-vew">
                            <br>
                            <div><h2>Manage Products</h2/div>   
                            <br>
                            <table>
                                <thead>
                                    <th>#CODE</th>
                                    <th>PRODUCT</th>
                                    <th>TYPE</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                    <th>EDIT</th>
                                    <th>DELETE</th>
                                </thead>
                                <tbody>
                                    <?php
                                     $conn=mysqli_connect('localhost','root','','pos');
                                     $sql="SELECT * FROM `products` WHERE 1";
                                     $exec=mysqli_query($conn,$sql);

                                     $count=mysqli_num_rows($exec);

                                     if ($count==0) {
                                        # code...
                                     }else{
                                        while ($row=mysqli_fetch_array($exec)) {
                                            $product=$row['product'];
                                            $type=$row['type'];
                                            $quantity=$row['quantity'];
                                            $size=$row['size'];
                                            $price=$row['price'];
                                            $id=$row['id'];
                                        
                                    ?>
                                    <tr>
                                        <td>#P<?php echo $id ?></td>
                                        <td><?php echo $product ?></td>
                                        <td><?php echo $type ?></td>
                                        <td><?php echo $quantity ?></td>
                                        <td>Ksh.<?php echo $price ?></td>
                                        <td>
                                            <form action="edit_item.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <input type="hidden" name="product" value="<?php echo $product ?>">
                                                <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                                                <input type="hidden" name="type" value="<?php echo $type ?>">
                                                <input type="hidden" name="size" value="<?php echo $size ?>">
                                                <input type="hidden" name="price" value="<?php echo $price ?>">
                                                <button class="btnEdit" name="btnEdit">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="del.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button name="btnDel">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>                     
                        </div>
                        
                    </div>     
            </div>
        </div>
    </div>
</body>
</html>