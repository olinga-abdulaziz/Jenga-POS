<?php  session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS | Dashboard</title>
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
                <div class="sum-board">
                    <div class="card-sum cs1">
                    <?php
                                  $conn=mysqli_connect("localhost","root","","pos");
                                  $sql="SELECT *,SUM(price) AS tot FROM `sales` WHERE 1";
                                  $exec=mysqli_query($conn,$sql);
                                  $fetch=mysqli_fetch_array($exec);
                                  
                                  $total= $fetch['tot'];
                            ?>
                        <center>
                        <strong>Total Profit</strong>
                        <div>
                            <small><strong>Ksh.<?php echo $total ?></strong></small>
                        </div>
                        </center>
                    </div>
                    <div class="card-sum cs2">
                    <?php
                                 $conn=mysqli_connect("localhost","root","","pos");
                                 $sql="SELECT * FROM `products` WHERE quantity < 500";
                                 $exec=mysqli_query($conn,$sql);
                                 $count1=mysqli_num_rows($exec);
                            ?>
                        <center>
                        <strong>Out of stock</strong>
                        <div>
                            <small><strong>Ksh. <?php echo $count1 ?></strong></small>
                        </div>
                        </center>
                    </div>
                    <div class="card-sum cs3">
                    <?php
                                 $conn=mysqli_connect("localhost","root","","pos");
                                 $sql="SELECT * FROM `products` WHERE 1";
                                 $exec=mysqli_query($conn,$sql);
                                 $count=mysqli_num_rows($exec);
                            ?>
                        <center>
                        <strong>Total Products</strong>
                        <div>
                            <small><strong><?php echo $count ?></strong></small>
                        </div>
                        </center>
                    </div>  
                    <a href="makesell.php">
                    <button class="card-sum cs4">
                        <center>
                        <strong>Make  Sell</strong>
                        </center>
                    </button>
                    </a>
                </div>
                <br><br>
                <hr>
                <br>
                <div class="table-vew">
                    <div class="generatediv"><strong> Sales Report</strong> <a href="pdf.php"><button>generate report</button></a></div>
                    <br>
                    <table>
                        <thead>
                            <th>CODE</th>
                            <th>PRODUCT</th>
                            <th>TYPE</th>
                            <th>QUANTITY</th>
                            <th>DATE</th>
                            <th>PRICE</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </thead>
                        <tbody>
                        <?php
                        $conn=mysqli_connect('localhost','root','','pos');
                                     $sql="SELECT * FROM `sales` WHERE 1";
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
                                            $id=$row['id'];
                                            $date=$row['date'];
                                    ?>
                            <tr>
                                    <td>#P0<?php echo $id ?></td>
                                    <td><?php echo $product ?></td>
                                    <td><?php echo $type ?></td>
                                    <td><?php echo $quantity ?></td>
                                    <td><?php echo $date ?></td>
                                    <td>Ksh. <?php echo $price ?></td>
                                    <td>
                                        <form action="edit_report.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $id  ?>">
                                            <input type="hidden" name="product" value="<?php echo $product  ?>">
                                            <input type="hidden" name="type" value="<?php echo $type  ?>">
                                            <input type="hidden" name="quantity" value="<?php echo $quantity  ?>">
                                            <input type="hidden" name="date" value="<?php echo $date  ?>">
                                            <input type="hidden" name="price" value="<?php echo $price  ?>">
                                            <button name="btnEdit">Edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="del.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $id  ?>">
                                            <button name="btnDelere">Delete</button>
                                        </form>
                                    </td>
                            </tr>
                            <?php }}?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>TOTAL</strong></td>
                                <td><strong>KSH. <?php echo $total ?></strong></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
</body>

</html>