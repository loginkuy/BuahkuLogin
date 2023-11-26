<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda Admin | BuahKu</title>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="images/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="<?php echo base_url('assets//css/style_admin.css');?>" type="text/css" rel="stylesheet">
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
        <?php echo
        '<div class="m-5 h1 text-center pt-5">Selamat Datang, '
            . session()->get('nama') .
            '</div>'; ?>
        <div class="container m-auto text-center">
            <img class="border-3 m-auto align-center" style="width: 20%;" src="<?php echo base_url('assets/images/logo_2.png');?>">
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 mt-1"><a class="text-decoration-none" href="<?php echo base_url('Admin/Produk');?>" title="Lihat Daftar Produk">
                    <div class="card bg-pink">
                        <div class="card-body text-center btn bg-pink">
                            <h3 class="card-title h3 pt-2 fw-bold">Daftar Produk</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-1"><a class="text-decoration-none" href="<?php echo base_url('Admin/Pesanan');?>" title="Lihat Daftar Pesanan">
                    <div class="card bg-pink">
                        <div class="card-body text-center btn bg-pink">
                            <h3 class="card-title h3 pt-2 fw-bold">Daftar Pesanan</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mt-1"><a class="text-decoration-none" href="<?php echo base_url('Admin/Tips');?>" title="Lihat Daftar Tips">
                    <div class="card bg-pink">
                        <div class="card-body text-center btn bg-pink">
                            <h3 class="card-title h3 pt-2 fw-bold">Daftar Tips</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

<footer>
    <p class="text-center mt-5 m-auto">&copy; BuahKu 2023</p>
</footer>

</html>