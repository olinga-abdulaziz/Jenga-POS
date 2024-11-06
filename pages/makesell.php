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
            <section class="pos-cec-main">
                <div class="pro-div">
                    <div class="item-cover1">
                           <div class="flexbod1">
                                    <form method="POST" action="makesell.php" class="searchDiv">
                                        <input type="search" placeholder="Search for product..." class="input-search" name="search"><button class="btnSearch" name="btnSearch">Search</button>
                                    </form>
                            <div>
                            </div>
                        </div>
                   <div class="scrollView prod-scroll">
                     <?php
                   if (isset($_POST['btnSearch'])) {
                        $search=$_POST['search'];
                        $conn=mysqli_connect('localhost','root','','pos');
                                     $sql="SELECT * FROM `products` WHERE product LIKE '%$search%'";
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
                                       <form method='POST' action='pos.php' class="card-item">
                                       <input type="hidden" name="product" value="<?php echo $product ?>">
                                       <input type="hidden" name="type" value="<?php echo $type ?>">
                                       <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                                       <input type="hidden" name="size" value="<?php echo $size ?>">
                                       <input type="hidden" name="price" value="<?php echo $price ?>">
                                       <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <button class="" name="btnCard">
                                                <div>
                                                    <strong><?php echo $product ?>  </strong>
                                                    <div><small><?php echo $type ?></small></div>
                                                </div>
                                                <div>
                                                    <small><?php echo $quantity ?> available</small>
                                                </div>
                                            </button>
                                        </form>
                                    <?php }}}else {
                   
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
                                       <form method='POST' action='pos.php' class="card-item">
                                       <input type="hidden" name="product" value="<?php echo $product ?>">
                                       <input type="hidden" name="type" value="<?php echo $type ?>">
                                       <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                                       <input type="hidden" name="size" value="<?php echo $size ?>">
                                       <input type="hidden" name="price" value="<?php echo $price ?>">
                                       <input type="hidden" name="id" value="<?php echo $id ?>">
                                            <button class="" name="btnCard">
                                                <div>
                                                    <strong><?php echo $product ?>  </strong>
                                                    <div><small><?php echo $type ?></small></div>
                                                </div>
                                                <div>
                                                    <small><?php echo $quantity ?> available</small>
                                                </div>
                                            </button>
                                        </form>
                                <?php }}}?>
                            </div>
                            <div class="pos-pos-bottom">
                    <div class="table-vew tb1">
                        <br>
                        <table>
                            <thead>
                                <th>PRODUCT</th>
                                <th>TYPE</th>
                                <th>QUANTITY</th>
                                <th>DATE</th>
                                <th>PRICE</th>
                            </thead>
                            <tbody>
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
                                <tr>
                                    <td><?php echo $product ?></td>
                                    <td><?php echo $type ?></td>
                                    <td><?php echo $quantity  ?></td>
                                    <td><?php echo $date  ?></td>
                                    <td>Ksh. <?php echo $price ?></td>
                                </tr>
                                <?php }}?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="dfdf">
                    <?php
                                  $conn=mysqli_connect("localhost","root","","pos");
                                  $sql="SELECT *,SUM(price) AS tot FROM `pos` WHERE 1";
                                  $exec=mysqli_query($conn,$sql);
                                  $fetch=mysqli_fetch_array($exec);
                                  
                                  $total= $fetch['tot'];
                            ?>
                    <div>
                        <h2>TOTAL Ksh.<?php echo $total ?></h2>
                    </div>
                         <a href="receipt.php"><button class="btnCheck">Checkout</button></a>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </section>
               
            </div>
        </div>
    </div>
</body>
</html>