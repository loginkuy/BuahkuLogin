<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Tips | BuahKu</title>
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
                        <a class="nav-link active fw-bold" href="<?php echo base_url('Admin/Pesanan');?>" title="Daftar Pesanan">PESANAN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="<?php echo base_url('Admin/Tips');?>" title="Daftar Tips" style="color: #FF862C;">TIPS</a>
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
        <h1 class="m-5 pt-5 mb-0 h1 text-center fw-bold">Daftar Tips</h1>
    </div>

    <table class="table table-striped m-auto" style="width: 90%;">

        <thead>
            <tr>
                <th colspan="5">
                    <a href="javascript:void(0);" class="btn bg-pink fw-bold" id="addTips">+ Tambah Tips</a>
                    <?php
                    if (!empty(session()->getFlashdata('berhasiltips'))) {
                        echo '<div class="alert mt-1 mb-1 text-success p-0" role="alert">' . session()->getFlashdata('berhasiltips') . '</div>';
                    }
                    ?>
                </th>
            </tr>
            <tr class="table-dark text-center">
                <th style="width: 15%;">Tanggal</th>
                <th style="width: 15%;">Judul</th>
                <th class="w-50">Isi</th>
                <th>Penulis</th>
                <th style="width: 10%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($tips); $i++) {
            echo    '<tr>
                        <td class="text-center">'. $tips[$i]['tanggal'] .'</td>
                        <td class="text-center">'. $tips[$i]['judul'] .'</td>
                        <td class="text-center"><textarea type="text" rows="3" class="form-control" disabled>'. $tips[$i]['isi'] .'</textarea></td>
                        <td class="text-center">'. $tips[$i]['penulis'] .'</td>
                        <td class="text-center">
                            <a href="javascript:void(0);" class="btn bg-pink btn-sm edit" data-id="' . $tips[$i]['_id'] . '"><img src="'.base_url('assets/images/alat/edit.png').'" width="20" height="20"></a>
                            <a href="Tips/Delete/' . $tips[$i]['_id'] . '" class="btn bg-pink btn-sm" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data ' . $tips[$i]['judul'] . '?\');"><img src="'.base_url('assets/images/alat/delete.png').'" width="20" height="20"></a>
                        </td>
                    </tr>';
            }

            if (empty($tips)) {
                echo '<tr><td colspan="5" class="text-center">Tidak Ada Data Tips</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="modal fade" id="modalTips" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Form Tips</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formTips" action="<?= base_url('Admin/Tips/Save');?>" method="POST">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea class="form-control" id="isi" name="isi" placeholder="Isi" rows="10" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" form="formTips">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/adminTips.js');?>"></script>
</body>
<footer>
    <p class="text-center mt-5 m-auto">&copy; BuahKu 2023</p>
</footer>

</html>