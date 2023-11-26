<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//User
$routes->get('/', 'Beranda::index');
$routes->add("Login", "Sign::index");
$routes->add("In", "Sign::in");
$routes->add("Up", "Sign::up");
$routes->add("Regist", "Sign::regist");
$routes->add("Out", "Sign::out");
$routes->add("Toko", "Toko::index");
$routes->add("Toko/Detail/(:any)", "Toko::detail/$1");
$routes->add("Tips/Detail/(:any)", "Tips::detail/$1");
$routes->add("Budidaya", "Budidaya::index");
$routes->add("Budidaya/Detail/(:any)", "Budidaya::detail/$1");
$routes->add("Pesanan", "Pesanan::index", ['filter' => 'pengguna']);
$routes->add("Keranjang", "Keranjang::index", ['filter' => 'pengguna']);
$routes->add("Keranjang/Edit", "Keranjang::edit", ['filter' => 'pengguna']);
$routes->add("Keranjang/Pesan", "Keranjang::pesan", ['filter' => 'pengguna']);
$routes->add("Keranjang/Add/(:any)/(:any)/(:any)", "Keranjang::add/$1/$2/$3", ['filter' => 'pengguna']);
$routes->add("Keranjang/Delete/(:any)", "Keranjang::delete/$1", ['filter' => 'pengguna']);
$routes->add("Profil", "Profil::index", ['filter' => 'pengguna']);
$routes->add("Profil/EditProfil", "Profil::editProfil", ['filter' => 'pengguna']);
$routes->add("Profil/EditFoto", "Profil::editFoto", ['filter' => 'pengguna']);
$routes->add("Profil/EditPassword", "Profil::editPassword", ['filter' => 'pengguna']);
$routes->add("Profil/HapusAkun/(:any)", "Profil::delete/$1", ['filter' => 'pengguna']);


//Admin
$routes->group('Admin', function ($routes) {
    $routes->add("", "Admin\AdminSign::index");
    $routes->add("In", "Admin\AdminSign::in");
    $routes->add("Up", "Admin\AdminSign::up");
    $routes->add("Regist", "Admin\AdminSign::regist");
    $routes->add("Out", "Admin\AdminSign::out");
    $routes->add("Beranda", "Admin\AdminBeranda::index", ['filter' => 'admin']);
    $routes->add("Produk", "Admin\AdminProduk::index", ['filter' => 'admin']);
    $routes->add("Produk/Add", "Admin\AdminProduk::add", ['filter' => 'admin']);
    $routes->add("Produk/Edit", "Admin\AdminProduk::edit", ['filter' => 'admin']);
    $routes->add("Produk/Delete/(:any)", "Admin\AdminProduk::delete/$1", ['filter' => 'admin']);
    $routes->add("Pesanan", "Admin\AdminPesanan::index", ['filter' => 'admin']);
    $routes->add("Pesanan/Edit", "Admin\AdminPesanan::edit", ['filter' => 'admin']);
    $routes->add("Pesanan/Resi/(:any)", "Admin\AdminPesanan::resi/$1", ['filter' => 'admin']);
    $routes->add("Tips", "Admin\AdminTips::index", ['filter' => 'admin']);
    $routes->add("Tips/Save", "Admin\AdminTips::save", ['filter' => 'admin']);
    $routes->add("Tips/Delete/(:any)", "Admin\AdminTips::delete/$1", ['filter' => 'admin']);
    $routes->add("Profil", "Admin\AdminProfil::index", ['filter' => 'admin']);
    $routes->add("Profil/EditProfil", "Admin\AdminProfil::editProfil", ['filter' => 'admin']);
    $routes->add("Profil/EditFoto", "Admin\AdminProfil::editFoto", ['filter' => 'admin']);
    $routes->add("Profil/EditPassword", "Admin\AdminProfil::editPassword", ['filter' => 'admin']);
    $routes->add("Profil/HapusAkun/(:any)", "Admin\AdminProfil::delete/$1", ['filter' => 'admin']);
});

