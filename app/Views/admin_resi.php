<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resi Pesanan</title>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="images/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="<?php echo base_url('assets//css/style_admin.css');?>" type="text/css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <h1 class="m-5 pt-5 mb-0 h1 text-center fw-bold" style="text-align: center;">Resi Pesanan</h1>
    </div>
    <table style="border: 1px solid black;" class="table table-striped m-auto w-75">
        <thead style="border: 1px solid black;" class="text-center">
<?php
    for ($i = 0; $i < 1; $i++) {
        echo    '<tr style="text-align: center;">
                    <th style="border: 1px solid black;"><i>BuahKu</i></th>
                    <th style="border: 1px solid black;">'. $pesanan[$i]['nopes'].'</th>
                </tr>
            </thead>
            <tbody style="border: 1px solid black;">
                <tr style="border: 1px solid black;">
                    <th style="border: 1px solid black;" scope="col" colspan="2">Pengirim: <i>BuahKu</i></th>
                </tr>
                <tr style="border: 1px solid black;">
                    <th style="border: 1px solid black;" scope="col" colspan="2">Penerima: <i>'. $pesanan[$i]['pemesan'].'</i></th>
                </tr>
                <tr style="border: 1px solid black;">
                    <th style="border: 1px solid black;" scope="col" colspan="2">Alamat : <i>'. $pesanan[$i]['alamat'].'</i></th>
                </tr>
                <tr style="border: 1px solid black;" class="text-center">
                    <th style="border: 1px solid black; text-align: center;">Nama Produk</th>
                    <th style="border: 1px solid black; text-align: center;">Jumlah</th>
                </tr>';
    }
?>
            <?php
                for ($i = 0; $i < count($pesanan); $i++) {
                    echo    '<tr style="text-align: center;" class="text-center">
                                <td style="border: 1px solid black;">'. $pesanan[$i]['nama_produk'].'</td>
                                <td style="border: 1px solid black;">'.$pesanan[$i]['qty'].'</td>
                            </tr>';
                }
            ?>
        </tbody>
    </table>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>
<footer>
    <p class="mt-5 m-auto" style="text-align: center;">&copy; BuahKu 2023</p>
</footer>
</html>