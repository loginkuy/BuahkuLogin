<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil | BuahKu</title>
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
                <h2>PROFIL</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <?php
    foreach ($profil as $row) :
    echo    '<div class="container-home m-auto w-75" style="margin-top: 5%;" >
                <div class="row mt-3">
                    <div class="col-lg-4 text-center">
                        <img class="w-75 m-4 p-4 rounded-circle" src="../assets/images/profile/' . (empty($row->foto) ? 'user.png' : 'pengguna/' . $row->foto) . '">
                    </div>
                    <div class="col-lg-7 m-1">
                        <div class="row mt-3">
                            <div class="col-lg-3 m-1 text-end">
                                <i>Username :</i>
                            </div>
                            <div class="col-lg-7 m-1">
                                <i>' . (empty($row->username) ? '' : $row->username) . '</i>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 m-1 text-end">
                                <i>Nama :</i>
                            </div>
                            <div class="col-lg-7 m-1">
                                <i>' . (empty($row->nama) ? '' : $row->nama) . '</i>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 m-1 text-end">
                                <i>Email :</i>
                            </div>
                            <div class="col-lg-7 m-1">
                                <i>' . (empty($row->email) ? '' : $row->email) . '</i>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 m-1 text-end">
                                <i>Telepon :</i>
                            </div>
                            <div class="col-lg-7 m-1">
                                <i>' . (empty($row->telepon) ? '' : $row->telepon) . '</i>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 m-1 text-end">
                                <i>Alamat :</i>
                            </div>
                            <div class="col-lg-7 m-1">
                                <i>' . (empty($row->alamat) ? '' : $row->alamat) . '</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    endforeach;
    ?>
    <div class="text-center">
        <?php
        if (!empty(session()->getFlashdata('gagalprofil'))) {
            echo '<div class="alert mt-1 mb-1 text-danger p-0" role="alert">' . session()->getFlashdata('gagalprofil') . '</div>';
        }
        if (!empty(session()->getFlashdata('berhasilprofil'))) {
            echo '<div class="alert mt-1 mb-1 text-success p-0" role="alert">' . session()->getFlashdata('berhasilprofil') . '</div>';
        }
        ?>
    </div>
    <div class="text-center mt-2 mb-5">
        <?php echo '<a href="javascript:void(0);" class="btn bg-pink m-2" id="edit_profile" title="Ubah Profile">Ubah Profile</a>' ?>
        <?php echo '<a href="javascript:void(0);" class="btn bg-pink m-2" id="edit_pass" title="Ubah Password">Ubah Password</a>' ?>
        <?php echo '<a href="javascript:void(0);" class="btn bg-pink m-2" id="edit_foto" title="Ubah Password">Ubah Foto</a>' ?>
        <?php echo '<a href="Profil/HapusAkun/' . session()->get('usernameuser') . '" class="btn bg-pink m-2" onclick="return confirm(\'Apakah Anda Yakin Menghapus Akun ' . session()->get('usernameuser') . '?\');" title="Hapus Akun">Hapus Akun</a>'?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAkun" action="<?= base_url('Profil/EditProfil');?>" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="usernamebaru" name="usernamebaru" value="<?php echo (empty($row->username) ? '' : $row->username) ?>" placeholder="Username" required>
                            <input type="hidden" id="username" name="username" value="<?php echo (empty($row->username) ? '' : $row->username) ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo (empty($row->_id) ? '' : $row->_id) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo (empty($row->nama) ? '' : $row->nama) ?>" placeholder="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo (empty($row->email) ? '' : $row->email) ?>" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo (empty($row->telepon) ? '' : $row->telepon) ?>" placeholder="Telepon" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo (empty($row->alamat) ? '' : $row->alamat) ?>" placeholder="Alamat" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" form="formAkun">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formPass" action="<?= base_url('Profil/EditPassword');?>" method="POST">
                        <div class="mb-3">
                            <label for="passwordLama" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="passwordLama" name="passwordLama" placeholder="Password Lama" required>
                            <input type="hidden" id="username" name="username" value="<?php echo (empty($row->username) ? '' : $row->username)?>">
                            <input type="hidden" id="pass" name="pass" value="<?php echo (empty($row->password) ? '' : $row->password)?>">
                        </div>
                        <div class="mb-3">
                            <label for="passwordBaru" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" placeholder="Password Baru" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password Baru" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" form="formPass">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Foto Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formFoto" enctype="multipart/form-data" action="<?= base_url('Profil/EditFoto');?>" method="POST">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Profile</label>
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto Profile" required>
                            <input type="hidden" id="username" name="username" value="<?php echo (empty($row->username) ? '' : $row->username) ?>">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" form="formFoto">Simpan</button>
                </div>
            </div>
        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="<?php echo base_url('assets/js/profil.js');?>"></script>
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