<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
    <div class="">
        <?php include('admin-nav.php')  ?>
        <div>
            <div class="top-s"><h2>Services</h2></div>
            <table class="tableService">
                <thead>
                    <th>Searvice</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php
                         $conn=mysqli_connect("localhost","root","","beauty");
                         $sql="SELECT * FROM `services` WHERE 1";
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
                    ?>
                    <tr>
                        <td><?php echo $service ?></td>
                        <td>Ksh.<?php echo $price ?></td>
                        <td><?php echo $description ?></td>
                        <td>
                            <form action="editservice.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <input type="hidden" name="service" value="<?php echo $service ?>">
                                <input type="hidden" name="price" value="<?php echo $price ?>">
                                <input type="hidden" name="description" value="<?php echo $description ?>">
                                <button name="btnEdit">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="delreport.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button name="btnDele">Delete</button>
                            </form>
                        </td>
                    </tr>
                   <?php }}?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>