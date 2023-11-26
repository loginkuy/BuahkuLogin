<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="images/icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login | BuahKu</title>
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
                        <h2>Masuk</h2>
                    </div>
                    <form id="form_daftar" action="<?= base_url('In');?>" method="POST">
                        <?php
                            if(!empty(session()->getFlashdata('error'))) {
                                echo '<div class="alert alert-danger w-100" role="alert">'.session()->getFlashdata('error').'</div>';
                            }
                        ?>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            <label>Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label>Password</label>
                        </div>
                        <h6 class="mt-3 mb-3 h6">Belum punya akun? <a class="text-decoration-none" href="<?= base_url('Regist')?>">Daftar</a></h6>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <p class="mt-5 mb-3 text-body-secondary text-center">&copy; BuahKu 2023</p>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>