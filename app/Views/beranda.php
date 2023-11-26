<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | BuahKu</title>
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
                    <a class="nav-link active fw-bold" aria-current="page" href="<?php echo base_url('/');?>" title="Beranda" id="link-navbar">BERANDA</a>
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
<!--Slider-->
<div id="carouselExampleFade" class="carousel slide mt-3 carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleFade" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="<?php echo base_url('assets/images/alpukat.png');?>" class="d-block w-100" alt="Slide 1">
            <div class="carousel-caption ">
                <h5 >BuahKu</h5>
                <p style="color: white; font-weight: 400;">Buah Segar Berkualitas Untuk Kita!</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
            <img src="<?php echo base_url('assets/images/jeruk.png');?>" class="d-block w-100" alt="Slide 2">
            <div class="carousel-caption ">
                <h5 >BuahKu</h5>
                <p>Buah Segar Berkualitas Untuk Kita!</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="10000">
            <img src="<?php echo base_url('assets/images/apel.png');?>" class="d-block w-100" alt="Slide 3">
            <div class="carousel-caption ">
                <h5  >BuahKu</h5>
                <p>Buah Segar Berkualitas Untuk Kita!</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--Slider End-->

<!--REKOMENDASI BUDIDAYA-->
<section class="container pb-5 h-100">
    <h1 class="text-center mb-2"
        style="padding-top: 5%;">Rekomendasi Budidaya Buah Lokal
    </h1>
    <h5 class="h5 text-center">Cek Rekomendasi Budidaya Buah Lokal Yang Tepat Bagimu</h5>
    <div class="dropdown mt-3 pt-3 text-center">
        <form>
            <h5 class="h5 text-center">Pilih Suhu LokasiMu :
                <select class="form-select btn btn-secondary w-25 dropdown-toggle bg-pink" aria-label="Default select example" id="suhu" name="suhu">
                    <option selected>Pilih Suhu</option>
                    <option value="15 - 20">15 - 20 &#x2103;</option>
                    <option value="21 - 25">21 - 25 &#x2103;</option>
                    <option value="26 - 30">26 - 30 &#x2103;</option>
                    <option value="31 - 35">31 - 35 &#x2103;</option>
                </select>
            </h5>
            <h5 class="h5 text-center">Pilih Jenis TanahMu :
                <select class="form-select btn btn-secondary w-25 dropdown-toggle bg-pink" aria-label="Default select example" id="tanah" name="tanah">
                    <option selected>Pilih Jenis Tanah</option>
                    <option value="Tanah Latosol">Tanah Latosol</option>
                    <option value="Tanah Podsolik Merah Kuning">Tanah Podsolik Merah Kuning</option>
                    <option value="Tanah Mediteran">Tanah Mediteran</option>
                    <option value="Tanah Aluvial">Tanah Aluvial</option>
                    <option value="Tanah Andosol">Tanah Andosol</option>
                    <option value="Tanah Podsol">Tanah Podsol</option>
                    <option value="Tanah Regosol">Tanah Regosol</option>
                    <option value="Tanah Grumosol">Tanah Grumosol</option>
                    <option value="Tanah Rensina">Tanah Rensina</option>
                    <option value="Tanah Gambut (Organol)">Tanah Gambut (Organol)</option>
                    <option value="Tanah Glei Humus">Tanah Glei Humus</option>
                    <option value="Tanah Litosol">Tanah Litosol</option>
                    <option value="Tanah Hidromorf Kelabu">Tanah Hidromorf Kelabu</option>
                    <option value="Tanah Planosol">Tanah Planosol</option>
                </select>
            </h5>
            <button class="btn3 text-center mt-3 w-50" type="submit" id="rekomendasi">Dapatkan Rekomendasi</button>
        </form>
    </div>
    <div class="container">
        <div class="row m-auto" id="listRekomendasi">
        </div>
    </div>
</section>
<!--REKOMENDASI BUDIDAYA END-->

<!--Tips Sukses Budidaya Start-->
<div class="wrapper-1 mb-5">
    <div class="container">
        <h1 class="text-center" style="padding-top: 2%;">Tips Sukses Budidaya Buah Lokal Indonesia</h1>
        <div class="container text-center">
            <div class="row">
                <?php
                    for ($i = 0; $i < count($tips); $i++) {
                        if ($i > 0 && $i % 2 == 0) {
                            echo    '</div><div class="row">';
                        }
                    echo    '<div class="col-md-6 mt-5">
                                <a class="text-decoration-none" href="Tips/Detail/'. $tips[$i]['_id'] .'" title="'. $tips[$i]['judul'] .'">
                                <div class="card bg-pink">
                                    <div class="card-body text-center btn bg-pink">
                                        <h3 class="card-title h3 pt-2 fw-bold">'. $tips[$i]['judul'] .'</h3>
                                        <h5 class="card-text">Baca Selengkapnya...</h5>
                                    </div>
                                </div>
                                </a>
                            </div>';
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Tips Sukses Budidaya end-->

<!-- Start Products  -->
<div class="categories-shop m-3 mb-5">
    <div class="container">
        <div class="row">
            <div class="container-home mt-1">
                <div class="row mt-1">
                    <div class="col-lg-6">
                        <h5 class="toko">Toko BuahKu</h5>
                    </div>
                    <div class="col-lg-6">
                        <a href="<?php echo base_url('Toko');?>" class="text-decoration-none btn4 btn-xl lihat text-md-end">Lihat Semua ></a>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-4 g-4 py-2">
                <?php
                    function formatRupiah($angka){
                        $rupiah = "Rp" . number_format($angka, 0, ',', '.');
                        return $rupiah;
                    }
                    for ($i = 0; $i < 4; $i++) {
                        if ($i > 0 && $i % 4 == 0) {
                            echo    '</div><div class="row row-cols-1 row-cols-md-4 g-4 py-2">';
                        }
                        $st=$toko[$i]['stok'];
                        $persen=  $st/50*100;
                        $tersedia=  100 - $persen;
                        echo    '<div class="col-lg-3">
                                    <a href="Toko/Detail/'.$toko[$i]['_id'].'">
                                        <div class="card" >
                                                <img src="'.base_url('assets/images/produk/').$toko[$i]['foto'] .'" class="card-img-top" alt="'. $toko[$i]['nama_produk'] .'">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color:black;">'. $toko[$i]['nama_produk'] .'</h5>
                                        </div>
                                        <div class="progress" style="margin-left: 5%; margin-right: 5%;" role="progressbar" aria-label="Basic example" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="background-color: #FF862C; width: '.$tersedia.'%">
                                            </div>
                                        </div>
                                        <div style="margin-left: 5%; margin-right: 5%;"';
                                        if ($st > 10) {
                                            echo ' class="text-success">Tersedia';
                                        } else if ($st > 0) {
                                            echo ' class="text-danger">Segera Habis';
                                        } else {
                                            echo ' class="text-danger">Habis';
                                        }
                        echo            '</div>
                                    </a>
                                    <br>
                                    <div class="d-flex justify-content-around mb-3">
                                        <h3>'.formatRupiah($toko[$i]['harga']).'/kg</h3>
                                        <a href="Keranjang/Add/'.$toko[$i]['_id'].'/'.$toko[$i]['nama_produk'].'/'.$toko[$i]['harga'].'"class="btn btn4';
                                        if ($st < 1) {
                                            echo " disabled";
                                        }
                        echo    '"><buttom>+ Keranjang</buttom></a>
                                        </div>
                                    </div>
                                </div>';
                    }
                ?>
                </div>
            </div>        
        </div>
    </div>
</div>
<!-- End Products  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/beranda.js');?>"></script>
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