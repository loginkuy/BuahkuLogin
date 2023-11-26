<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="images/icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Daftar Admin | BuahKu</title>
</head>

<body style="background: #e1f7e1;">
    <div class="container d-flex justify-content-center mt-5 mb-5 align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #e1f7e1 ;">
                <div class="featured-image mb-3">
                    <img src="<?php echo base_url('assets/images/logo.png');?>" class="img-fluid" style="width: 250px;">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center mt-3">
                        <h2>Daftar</h2>
                    </div>
                    <form id="form_daftar" action="<?= base_url('Admin/Up');?>" method="POST">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo session()->getFlashdata('username')?>" placeholder="Username">
                            <label>Username</label>
                            <?php
                                if(!empty(session()->getFlashdata('usernameada'))) {
                                    echo '<div class="alert mt-1 mb-1 text-danger p-0" role="alert">'.session()->getFlashdata('usernameada').'</div>';
                                }
                            ?>
                        </div>
                        
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo session()->getFlashdata('nama')?>" placeholder="Nama">
                            <label>Nama</label>
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo session()->getFlashdata('email')?>" placeholder="Email">
                            <label>Email</label>
                        </div>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo session()->getFlashdata('telepon')?>" placeholder="Telepon">
                            <label>No. Telepon</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo session()->getFlashdata('alamat')?>" placeholder="Alamat">
                            <label>Alamat</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label>Password</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi Password">
                            <label>Konfirmasi Password</label>
                            <?php
                                if(!empty(session()->getFlashdata('bedapass'))) {
                                    echo '<div class="alert mt-1 mb-1 text-danger p-0" role="alert">'.session()->getFlashdata('bedapass').'</div>';
                                }
                            ?>
                        </div>
                        <h6 class="mt-2 mb-2 h6">Sudah punya akun? <a class="text-decoration-none" href="<?= base_url('Admin')?>">Login</a></h6>
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                    <p class="mt-5 mb-3 text-body-secondary text-center">&copy; BuahKu 2023</p>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>