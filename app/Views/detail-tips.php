<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tips | BuahKu</title>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="images/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="<?php echo base_url('assets/css/index.css');?>" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <nav class="navbar navbar-expand-lg bg-pink fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand m-auto" href="#"><img class="border-3" src="<?php echo base_url('assets/images/logo_2.png');?>" width="100" height="100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-bold" aria-current="page" href="<?php echo base_url('/');?>" title="Beranda" id="link-navbar">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="<?php echo base_url('Toko');?>" title="Toko" id="link-navbar">TOKO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="<?php echo base_url('Budidaya');?>" title="Budidaya" id="link-navbar">BUDIDAYA</a>
                </li>
                </ul>
                <span class="navbar-text text-black">
                <?php
                if (empty(session()->get('usernameuser'))) {
                    echo '<button id="tablink" button class="btn btn-pink" title="MASUK"><a class="text-decoration-none"
                    href="'.base_url('Login').'">
                    Masuk</a>
                </button>
                <button id="tablink" button class="btn btn-pink" title="DAFTAR"><a class="text-decoration-none"
                    href="'.base_url('Regist').'">
                    Daftar</a>
                </button>';
                } else {
                    echo    '<div class="dropdown">
                                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">';
                    if(empty(session()->get('foto'))){
                        echo    '<img src="'.base_url('assets/images/profile/user.png').'"
                                    alt="'.session()->get('nama').'" width="32" height="32" class="rounded-circle me-2">
                                <strong>'.session()->get('nama').'</strong>';
                    }else{
                        echo    '<img src="'.base_url('assets/images/profile/pengguna/'). session()->get('foto') . '"
                                    alt="'.session()->get('nama').'" width="32" height="32" class="rounded-circle me-2">
                                <strong>'.session()->get('nama').'</strong>';
                    }
                    echo        '</a>
                                <ul class="dropdown-menu text-small shadow">
                                    <li><a class="dropdown-item" href="'.base_url('Profil').'" title="Akun Saya">Profil</a></li>
                                    <li><a class="dropdown-item" href="'.base_url('Keranjang').'" title="Keranjang Saya">Keranjang</a></li>
                                    <li><a class="dropdown-item" href="'.base_url('Pesanan').'" title="Pesanan Saya">Pesanan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="'.base_url('/Out').'" title="Keluar">Keluar</a></li>
                                </ul>
                            </div>';
                }
                ?>
                </span>
            </div>
        </div>
    </nav>
</head>

<body>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-caption">
                    <h2>DETAIL TIPS BUDIDAYA BUAH</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

  <!--Card Start-->
  <div class="container py-5">
        <?php
        echo    '<h1 class="text-center" style="margin-top: -5%; padding-top: 5%;">' . $tips[0]['judul'] . '</h1>
                        <h5 class="text-center">' . $tips[0]['penulis'] . ' - Tips Budidaya<h5>
                        <h5 class="text-center">' . substr($tips[0]['tanggal'], 0, 24) . '<h5>
                        <div class="w-75 m-auto mt-5" style="text-align: justify;"><p>' . $tips[0]['isi'] . '</p></div>';

        ?>
  </div>
  <!--Card end-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

<!--Footer-->
<footer class="text-black pt-5 pb-4 bg-pink">
  <div class="container text-center text-md-start">
    <div class="row text-center text-md-start">
      <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mt-3">
        <h1 class="mb-4" style="font-weight: 700">BuahKu</h1>
        <p style="font-weight: 500; text-align: justify;">Nikmati kemudahan berbelanja buah-buahan segar dari kenyamanan rumah Anda, dengan pengiriman yang cepat dan aman. Kami bangga menjadi destinasi pilihan Anda untuk memenuhi semua kebutuhan buah-buahan Anda </p>
      </div>

      <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mt-3">
        <h1 class="mb-4" style="font-weight: 700;">Kontak</h1>
        <p style="font-weight: 500;">
          <i class="bi bi-geo-alt mr-3"></i> Kota Bogor, Jawa Barat
        </p>
        <p style="font-weight: 500;">
          <i class="bi bi-envelope mr-3"></i> BuahKu@gmail.com
        </p>
        <p style="font-weight: 500;">
          <i class="bi bi-telephone"></i> +62 81234567891
        </p>
      </div>
    </div>
    <hr class="mb-4">
    <div class="row align-items-center" style="font-weight: 500;">
      <div class="text-center">
        <p> Hak Cipta @2023 Semua hak dilindungi undang-undang oleh:
          <a href="#" style="text-decoration: none;">
            <strong class="text-black" style="font-weight: 500;">BuahKu</strong>
          </a>
        </p>
      </div>
    </div>
  </div>

</footer>
<!--Footer end-->

</html>