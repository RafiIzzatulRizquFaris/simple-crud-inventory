<?php

include("connection.php");

$connection = openConn();
$query = mysqli_query($connection, "SELECT * FROM `data_product`");

$query_search = "SELECT MAX(kode_product) as kode FROM data_product";
$result_search = mysqli_query($connection, $query_search);
$ds_query = mysqli_fetch_array($result_search);
$take_code = substr($ds_query['kode'], 3, 6);

$query_count = "SELECT COUNT(kode_product)as total FROM data_product";
$result_count = mysqli_query($connection, $query_count);
$dc_query = mysqli_fetch_array($result_count);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVENTORY DATA</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container1">
        <h1>Form Input Master</h1>
        <br>
        <hr>
        <br>
        <table border="1" cellpadding="10" cellspacing="0">
            <form action="insert_process.php" method="post">
                <tr>
                    <td>Kode produk</td>
                    <td><input type="text" name="code_product" value="
                    <?php
                    $addingNum = $take_code + 1;
                    if ($addingNum < 10) {
                        echo "MD-00" . $addingNum;
                    } else {
                        echo "MD-0" . $addingNum;
                    }
                    ?>"></td>
                </tr>
                <tr>
                    <td>Nama produk</td>
                    <td><input type="text" name="product_name" id="nampro"></td>
                </tr>
                <tr>
                    <td>Harga produk</td>
                    <td><input type="number" name="product_price" placeholder="Rp" id="harpro"></td>
                </tr>
                <tr>
                    <td>satuan</td>
                    <td><select name="product_unit_weight" id="satpro">
                            <option disabled='disabled' selected='selected'>pilih..</option>
                            <option>KG</option>
                            <option>L</option>
                            <option>G</option>
                        </select></td>
                </tr>
                <tr>
                    <td>kategori</td>
                    <td><select name="product_type" id="katpro">
                            <option disabled='disabled' selected='selected'>pilih..</option>
                            <option>padat</option>
                            <option>cair</option>
                            <option>gas</option>
                        </select></td>
                </tr>
                <tr>
                    <td>url gambar</td>
                    <td><input type="text" name="product_pict_url" id="gampro"></td>
                </tr>
                <tr>
                    <td>stok awal</td>
                    <td><input type="number" name="product_stock" id="stopro"></td>
                </tr>
                <tr>
                    <td><button type="submit">Save</button></td>
                    <td></td>
                </tr>
            </form>
        </table>
    </div>
    <br>
    <br>
    <div>
        <table border="1" cellpadding="10" cellspacing="0" id="hasilinput">
            <tr>
                <thead>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Nama produk</th>
                    <th>Harga produk</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>URL gambar</th>
                    <th>stok</th>
                    <th>modifikasi</th>
                </thead>

            </tr>
            <?php
            $sda = 1;
            while ($list = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td>
                        <?php echo $sda++; ?>
                    </td>
                    <td><?php echo $list['kode_product']; ?></td>
                    <td><?php echo $list['nama_product']; ?></td>
                    <td> Rp <?php echo $list['harga_product']; ?></td>
                    <td><?php echo $list['satuan_product']; ?></td>
                    <td><?php echo $list['kategori_product']; ?></td>
                    <td><img src='<?php echo $list['gambar_product']; ?>' alt='' height="50" width="50"></td>
                    <td id="stock_product" class="
                    <?php
                    if ($list['stock_product'] < 5) {
                        echo "alert";
                    } else {
                        echo "none";
                    }
                    ?>">
                        <?php echo $list['stock_product']; ?>
                    </td>
                    <td>
                        <a href="update.php?product_code=<?php echo $list['kode_product'] ?>&product_name=<?php echo $list['nama_product'] ?>&product_url=<?php echo $list['gambar_product'] ?>">Edit</a>
                        <a href="delete_process.php?product_code=<?php echo $list['kode_product'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>