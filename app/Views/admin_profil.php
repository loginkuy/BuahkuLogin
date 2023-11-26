<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Admin | BuahKu</title>
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png');?>" type="images/icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
        <h1 class="m-5 pt-5 mb-0 h1 text-center fw-bold">Profil</h1>
    </div>
    <table class="table table-striped m-auto w-75">
        <?php
        foreach ($profil as $row) :
            echo '<thead class="text-center" style="vertical-align: middle;">
                        <tr>
                            <th colspan="2"><img class="w-25 p-4 rounded-circle" src="'.base_url('assets/images/profile/'). (empty($row->foto) ? 'user.png' : 'admin/' . $row->foto) . '"></th>
                        </tr>
                        </thead>
                        <tbody><tr>
                        <th scope="col"><i>Username :</i></th>
                        <td><i>' . (empty($row->username) ? '' : $row->username) . '</i></td>
                        </tr>
                        <tr>
                        <th scope="row"><i>Nama :</i></th>
                        <td><i>' . (empty($row->nama) ? '' : $row->nama) . '</i></td>
                        </tr>
                        <tr>
                        <th scope="row"><i>Email :</i></th>
                        <td><i>' . (empty($row->email) ? '' : $row->email) . '</i></td>
                        </tr>
                        <tr>
                        <th scope="row"><i>Telepon :</i></th>
                        <td><i>' . (empty($row->telepon) ? '' : $row->telepon) . '</i></td>
                        </tr>
                        <tr>
                        <th scope="row"><i>Alamat :</i></th>
                        <td><i>' . (empty($row->alamat) ? '' : $row->alamat) . '</i></td>
                        </tr>';
        endforeach;
        ?>
        </tbody>
    </table>
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
    <div class="text-center mt-2">
        <?php echo '<a href="javascript:void(0);" class="btn bg-pink m-2" id="edit_profile" title="Ubah Profile">Ubah Profile</a>' ?>
        <?php echo '<a href="javascript:void(0);" class="btn bg-pink m-2" id="edit_pass" title="Ubah Password">Ubah Password</a>' ?>
        <?php echo '<a href="javascript:void(0);" class="btn bg-pink m-2" id="edit_foto" title="Ubah Foto">Ubah Foto</a>' ?>
        <?php echo '<a href="Profil/HapusAkun/' . session()->get('username') . '" class="btn bg-pink m-2" onclick="return confirm(\'Apakah Anda Yakin Menghapus Akun ' . $_SESSION['nama'] . '?\');" title="Hapus Akun">Hapus Akun</a>'
        ?>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAkun" action="<?= base_url('Admin/Profil/EditProfil');?>" method="POST">
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
                    <form id="formPass" action="<?= base_url('Admin/Profil/EditPassword');?>" method="POST">
                        <div class="mb-3">
                            <label for="passwordLama" class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="passwordLama" name="passwordLama" placeholder="Password Lama" required>
                            <input type="hidden" id="username" name="username" value="<?php echo (empty($row->username) ? '' : $row->username) ?>">
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
                    <form id="formFoto" enctype="multipart/form-data" action="<?= base_url('Admin/Profil/EditFoto');?>" method="POST">
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
    <script src="<?php echo base_url('assets/js/adminProfil.js');?>"></script>
</body>
<footer>
    <p class="text-center mt-5 m-auto">&copy; BuahKu 2023</p>
</footer>

</html>