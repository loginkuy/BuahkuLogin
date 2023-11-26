<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pesanan | BuahKu</title>
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
                        <a class="nav-link active fw-bold" href="<?php echo base_url('Admin/Produk');?>" title="Daftar Produk">PRODUK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="<?php echo base_url('Admin/Pesanan');?>" title="Daftar Pesanan" style="color: #FF862C;">PESANAN</a>
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
        <h1 class="m-5 pt-5 mb-0 h1 text-center fw-bold">Daftar Pesanan</h1>
    </div>
    <table class="table table-striped m-auto" style="width: 90%;">
        <thead>
            <tr>
                <th colspan="9">
                    <?php
                    if (!empty(session()->getFlashdata('berhasilpesanan'))) {
                        echo '<div class="alert mt-1 mb-1 text-success p-0" role="alert">' . session()->getFlashdata('berhasilpesanan') . '</div>';
                    }
                    ?>
                </th>
            </tr>
            <tr class="table-dark text-center">
                <th>Tanggal</th>
                <th>Nama Pemesan</th>
                <th>Alamat</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Pembayaran</th>
                <th>Status Pesanan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            function formatRupiah($angka)
            {
                $rupiah = "Rp" . number_format($angka, 0, ',', '.');
                return $rupiah;
            }

            foreach ($pesanan as $row) :
                echo    '<tr class="text-center">
                                <td>' . (empty($row->tanggal) ? '' : $row->tanggal) . '</td>
                                <td>' . (empty($row->pemesan) ? '' : $row->pemesan) . '</td>
                                <td>' . (empty($row->alamat) ? '' : $row->alamat) . '</td>
                                <td>' . (empty($row->nama_produk) ? '' : $row->nama_produk) . '</td>
                                <td>' . (empty($row->qty) ? '' : $row->qty) . '</td>
                                <td>' . formatRupiah(empty($row->total) ? '' : $row->total) . '</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn bg-pink btn-sm cek" data-id="' . $row->nopes . '">Cek</a>
                                </td>
                                <td>' . (empty($row->status) ? '' : $row->status) . '</td>
                                <td>
                                    <a href="javascript:void(0);" class="btn bg-pink btn-sm edit" data-id="' . $row->nopes . '"><img src="'. base_url('assets/images/alat/edit.png'). '" width="20"
                                    height="20"></a>
                                    <a href="Pesanan/Resi/' . $row->nopes .'" class="btn bg-pink btn-sm"><img src="'. base_url('assets/images/alat/printer.png').'" width="20"
                                    height="20"></a>
                                </td>
                            </tr>';
            endforeach;

            if (empty($pesanan)) {
                echo '<tr><td colspan="8" class="text-center">Tidak Ada Data Pesanan</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="modal fade" id="modalCek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Cek Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="pembayaran">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Pesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEdit" action="<?= base_url('Admin/Pesanan/Edit');?>" method="POST">
                        <div class="mb-3">
                            <label for="nopes" class="form-label">Id Pesanan</label>
                            <input type="text" class="form-control" id="nopes" name="nopes" disabled>
                            <input type="hidden" class="form-control" id="nopes2" name="nopes2">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pesanan</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Status Pesanan" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" form="formEdit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/adminPesanan.js');?>"></script>
</body>
<footer>
    <p class="text-center mt-5 m-auto">&copy; BuahKu 2023</p>
</footer>

</html>