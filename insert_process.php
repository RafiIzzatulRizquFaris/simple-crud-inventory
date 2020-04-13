<?php
include('connection.php');
$kode = trim($_POST['code_product']);
$nama = $_POST['product_name'];
$harga = $_POST['product_price'];
$satuan = $_POST['product_unit_weight'];
$kategori = $_POST['product_type'];
$url = $_POST['product_pict_url'];
$stok = $_POST['product_stock'];

$query = "INSERT INTO `data_product` (`kode_product`, `nama_product`, `harga_product`, `satuan_product`, `kategori_product`, `gambar_product`, `stock_product`) VALUES ('$kode', '$nama', '$harga', '$satuan', '$kategori', '$url', '$stok');";
$result = mysqli_query(openConn(), $query);
if ($result) {
    header("location:index.php");
}else{
    header("location:error.php");
}
?>