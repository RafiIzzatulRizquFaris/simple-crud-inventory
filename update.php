<?php
include('connection.php');
$pro_cod = $_GET['product_code'];
$pro_nam = $_GET['product_name'];
$pro_url = $_GET['product_url'];
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
        <h1>UPDATE FORM</h1>
        <br>
        <hr>
        <br>
        <table border="1" cellpadding="10" cellspacing="0">
            <form action="update_process.php" method="post">
                <tr>
                    <td>Kode produk</td>
                    <td><input type="text" name="code_product" value="<?php echo $pro_cod; ?>"></td>
                </tr>
                <tr>
                    <td>Nama produk</td>
                    <td><input type="text" name="product_name" id="nampro" value="<?php echo $pro_nam; ?>"></td>
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
                    <td>gambar</td>
                    <td><input type="text" name="product_pict_url" id="gampro" value="<?php echo $pro_url; ?>"></td>
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
</body>
</html>