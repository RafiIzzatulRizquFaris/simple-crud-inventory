<?php
include('connection.php');
$kode = trim($_POST['code_product']);
$nama = $_POST['product_name'];
$harga = $_POST['product_price'];
$satuan = $_POST['product_unit_weight'];
$kategori = $_POST['product_type'];
$url = $_POST['product_pict_url'];
$stok = $_POST['product_stock'];

$query = "UPDATE `data_product` SET `nama_product` = '$nama', `harga_product` = '$harga', `satuan_product` = '$satuan', `kategori_product` = '$kategori', `gambar_product` = '$url', `stock_product` = '$stok' WHERE `data_product`.`kode_product` = '$kode'; ";
$result = mysqli_query(openConn(), $query);
if ($result) {
    header("location:index.php");
}else{
    header("location:error.php");
}
?>