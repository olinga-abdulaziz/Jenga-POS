<link rel="stylesheet" href="../css/global.css">
<?php
if (isset($_POST['btnDel'])) {
    $conn=mysqli_connect('localhost','root','','pos');
    $id=$_POST['id'];
    $sql="DELETE  FROM `products` WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if ($exec) {
        echo '
         <section class="black-container">
                <div class="popbox">
                    <center>
                        <div><strong>Success !</strong></div>
                        <div><small>Deleted Succesfully</small></div>
                        <div>
                            <a href="manage.php"><button>Done</button></a>
                        </div>
                    </center>
                </div>
            </section>
        ';
    }else{
        echo 'sql error';
    }
}
if (isset($_POST['btnDelere'])) {
    $conn=mysqli_connect('localhost','root','','pos');
    $id=$_POST['id'];
    $sql="DELETE  FROM `sales` WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if ($exec) {
        echo '
         <section class="black-container">
                <div class="popbox">
                    <center>
                        <div><strong>Success !</strong></div>
                        <div><small>Deleted Succesfully</small></div>
                        <div>
                            <a href="dashboard.php"><button>Done</button></a>
                        </div>
                    </center>
                </div>
            </section>
        ';
    }else{
        echo 'sql error';
    }
}


?>