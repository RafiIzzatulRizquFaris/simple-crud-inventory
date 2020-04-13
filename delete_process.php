<?php
include('connection.php');
$pro_cod = $_GET['product_code'];
$query = "DELETE FROM `data_product` WHERE `data_product`.`kode_product` = '$pro_cod' ";
$result = mysqli_query(openConn(), $query);
if ($result) {
    header("location:index.php");
}else{
    header("location:error.php");
}
?>