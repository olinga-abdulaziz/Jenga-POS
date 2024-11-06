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
                    <?php
                        if (isset($_POST['btnAddq'])) {
                            $id=$_POST['id'];
                        }
                    ?>
                    <form action="addstock.php" method="POST" class="form-add">
                        <div>
                            <h2>Add Quantity</h2>
                        </div>
                        <div>
                            <strong>Sugar Mumias LTD</strong>
                        </div>
                       
                        <div>
                            <small>Quantity</small>
                        </div>
                        <div>
                            <input type="text" name="quantity">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                        </div>
                        <div>
                            <button class="" name="btnAdd">Add Qauantity</button>
                        </div>
                    </form>
                </section>
            </div>
            <?php
                if (isset($_POST['btnAdd'])) {
                    $conn=mysqli_connect('localhost','root','','pos');
                    $quantity=$_POST['quantity'];
                    $id=$_POST['id'];
                    
                    $sql="SELECT * FROM `products` WHERE id='$id'";
                    $exec=mysqli_query($conn,$sql);

                    $count=mysqli_num_rows($exec);

                    if ($count==0) {
                       # code...
                    }else{
                       while ($row=mysqli_fetch_array($exec)) {
                           $oldquantity=$row['quantity'];
                           $new_Q=$oldquantity + $quantity;
                           $sql1="UPDATE `products` SET `quantity`='$new_Q' WHERE id='$id'";
                            $exec1=mysqli_query($conn,$sql1);

                            if ($exec1) {
                                echo '
                                <section class="black-container">
                                       <div class="popbox">
                                           <center>
                                               <div><strong>Success !</strong></div>
                                               <div><small>Added Succesfully</small></div>
                                               <div>
                                                   <a href="outstock.php"><button>Done</button></a>
                                               </div>
                                           </center>
                                       </div>
                                   </section>
                               ';
                            }else{
                                echo 'sql error';
                            }
                       }}
                
                   
                  }
            ?>
        </div>
    </div>
</body>
</html>