<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Produk | BuahKu</title>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="images/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="<?php echo base_url('assets//css/style_admin.css');?>" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand m-auto" href="<?php echo base_url('Admin/Beranda');?>" title="Home"><img class="border-3" src="<?php echo base_url('assets/images/logo_2.png');?>" width="100" height="100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left:10px;">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="<?php echo base_url('Admin/Produk');?>" title="Daftar Produk" style="color: #FF862C;">PRODUK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="<?php echo base_url('Admin/Pesanan');?>" title="Daftar Pesanan">PESANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="<?php echo base_url('Admin/Tips');?>" title="Daftar Tips">TIPS</a>
                    </li>
                </ul>
                <span class="navbar-text text-white">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                            if (empty(session()->get('foto'))) {
                                echo '<img src="'.base_url('assets/images/profile/user.png').'" alt="' . session()->get('nama') . '" width="32" height="32" class="rounded-circle me-2">';
                            } else {
                                echo '<img src="'.base_url('assets/images/profile/admin/'). session()->get('foto') . '" alt="' . session()->get('nama') . '" width="32" height="32" class="rounded-circle me-2">';
                            }
                            ?>
                            <strong><?php echo session()->get('nama'); ?></strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow">
                            <li><a class="dropdown-item" href="<?php echo base_url('Admin/Profil');?>" title="Profil">Profil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url('Admin/Out');?>" title="Keluar">Keluar</a>
                            </li>
                        </ul>
                    </div>
                </span>
            </div>
        </div>
    </nav>
</head>

<body>
    <div class="container py-5">
        <h1 class="m-5 h1 text-center pt-5 fw-bold mb-0">Daftar Produk</h1>
    </div>
    <table class="table table-striped m-auto" style="width: 90%;">
        <thead>
            <tr>
                <th colspan="5">
                    <a href="javascript:void(0);" class="btn bg-pink fw-bold" id="addProduk">+ Tambah Produk</a>
                    <a href="javascript:void(0);" class="btn bg-pink fw-bold" id="grafikStok">Lihat Grafik Stok</a>
                    <?php
                    if (!empty(session()->getFlashdata('gagalproduk'))) {
                        echo '<div class="alert mt-1 mb-1 text-success p-0" role="alert">' . session()->getFlashdata('gagalproduk') . '</div>';
                    }
                    if (!empty(session()->getFlashdata('berhasilproduk'))) {
                        echo '<div class="alert mt-1 mb-1 text-success p-0" role="alert">' . session()->getFlashdata('berhasilproduk') . '</div>';
                    }
                    ?>
                </th>
            </tr>
            <tr class="table-dark text-center">
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th class="w-50">Deskripsi</th>
                <th style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function formatRupiah($angka)
            {
                $rupiah = "Rp" . number_format($angka, 0, ',', '.');
                return $rupiah;
            }
            for ($i = 0; $i < count($produk); $i++) {
                echo '<tr>
                        <td class="text-center">'. $produk[$i]['nama_produk'] .'</td>
                        <td class="text-center">' . formatRupiah($produk[$i]['harga']) . '</td>
                        <td class="text-center">'. $produk[$i]['stok'] .'</td>
                        <td style="text-align: justify;"><textarea type="text" rows="3" class="form-control" disabled>'. $produk[$i]['deskripsi'] .'</textarea></td>
                        <td class="text-center">
                            <a href="javascript:void(0);" class="btn bg-pink btn-sm edit" data-id="'. $produk[$i]['_id'] .'"><img src="'. base_url('assets/images/alat/edit.png'). '" width="20"
                            height="20"></a>
                            <a href="Produk/Delete/'. $produk[$i]['_id'] .'" class="btn bg-pink btn-sm" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data '. $produk[$i]['nama_produk'] .'?\');"><img src="'. base_url('assets/images/alat/delete.png'). '" width="20"
                            height="20"></a>
                        </td>
                    </tr>';
            }
            
            if (empty($produk)) {
                echo '<tr><td colspan="5" class="text-center">Tidak Ada Data Produk</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="modal fade" id="modalProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Form Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formProduk" enctype="multipart/form-data" action="<?= base_url('Admin/Produk/Add');?>" method="POST">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_latin" class="form-label">Nama Latin</label>
                            <input type="text" class="form-control" id="nama_latin" name="nama_latin" placeholder="Nama Latin" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="khasiat" class="form-label">Khasiat</label>
                            <textarea class="form-control" id="khasiat" name="khasiat" placeholder="Khasiat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gizi" class="form-label">Nilai Gizi</label>
                            <textarea class="form-control" id="gizi" name="gizi" placeholder="Nilai Gizi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="budidaya" class="form-label">Cara Budidaya</label>
                            <textarea type="text" class="form-control" id="budidaya" name="budidaya" placeholder="Cara Budidaya" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tanah" class="form-label">Jenis Tanah</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahLatosol" value="Tanah Latosol">
                                <label class="form-check-label" for="tanahLatosol">
                                    Tanah Latosol
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahPodsolikMerahKuning" value="Tanah Podsolik Merah Kuning">
                                <label class="form-check-label" for="tanahPodsolikMerahKuning">
                                    Tanah Podsolik Merah Kuning
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahAluvial" value="Tanah Aluvial">
                                <label class="form-check-label" for="tanahAluvial">
                                    Tanah Aluvial
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahMediteran" value="Tanah Mediteran">
                                <label class="form-check-label" for="tanahMediteran">
                                    Tanah Mediteran
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahAndosol" value="Tanah Andosol">
                                <label class="form-check-label" for="tanahAndosol">
                                    Tanah Andosol
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahPodsol" value="Tanah Podsol">
                                <label class="form-check-label" for="tanahPodsol">
                                    Tanah Podsol
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahRegosol" value="Tanah Regosol">
                                <label class="form-check-label" for="tanahRegosol">
                                    Tanah Regosol
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahGrumosol" value="Tanah Grumosol">
                                <label class="form-check-label" for="tanahGrumosol">
                                    Tanah Grumosol
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahRensina" value="Tanah Rensina">
                                <label class="form-check-label" for="tanahGrumosol">
                                    Tanah Rensina
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahGambut" value="Tanah Gambut (Organol)">
                                <label class="form-check-label" for="tanahGambut">
                                    Tanah Gambut (Organol)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahGleiHumus" value="Tanah Glei Humus">
                                <label class="form-check-label" for="tanahGleiHumus">
                                    Tanah Glei Humus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahLitosol" value="Tanah Litosol">
                                <label class="form-check-label" for="tanahLitosol">
                                    Tanah Litosol
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahHidromorfKelabu" value="Tanah Hidromorf Kelabu">
                                <label class="form-check-label" for="tanahHidromorfKelabu">
                                    Tanah Hidromorf Kelabu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tanah[]" id="tanahPlanosol" value="Tanah Planosol">
                                <label class="form-check-label" for="tanahPlanosol">
                                    Tanah Planosol
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="suhu" class="form-label">Suhu</label>
                            <select class="form-select" aria-label="Default select example" id="dropdownMenuButton" name="suhu">
                                <option selected>Pilih Suhu</option>
                                <option value="15 - 20">15 - 20 &#x2103;</option>
                                <option value="21 - 25">21 - 25 &#x2103;</option>
                                <option value="26 - 30">26 - 30 &#x2103;</option>
                                <option value="31 - 35">31 - 35 &#x2103;</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Produk</label>
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto Produk" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" form="formProduk">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEditProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Form Edit Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditProduk" action="<?= base_url('Admin/Produk/Edit');?>" method="POST">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produkedit" name="nama_produk" placeholder="Nama Produk" required>
                            <input type="hidden" name="id" id="idedit">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stokedit" name="stok" placeholder="Stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="hargaedit" name="harga" placeholder="Harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_latin" class="form-label">Nama Latin</label>
                            <input type="text" class="form-control" id="nama_latinedit" name="nama_latin" placeholder="Nama Latin" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="deskripsiedit" name="deskripsi" placeholder="Deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="khasiat" class="form-label">Khasiat</label>
                            <textarea type="text" class="form-control" id="khasiatedit" name="khasiat" placeholder="Khasiat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gizi" class="form-label">Nilai Gizi</label>
                            <textarea type="text" class="form-control" id="giziedit" name="gizi" placeholder="Nilai Gizi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="budidaya" class="form-label">Cara Budidaya</label>
                            <textarea type="text" class="form-control" id="budidayaedit" name="budidaya" placeholder="Cara Budidaya" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" form="formEditProduk">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalGrafik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Grafik Stok</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div style="width:80%;" class="m-auto">
                    <canvas id="myChart"></canvas>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo base_url('assets/js/adminProduk.js');?>"></script>
    <script>
        var data = <?php echo json_encode($produk); ?>;

        var labels = data.map(item => item.nama_produk);
        var values = data.map(item => item.stok);

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Stok',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
<footer>
    <p class="text-center mt-5 m-auto">&copy; BuahKu 2023</p>
</footer>

</html>