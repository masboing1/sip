<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::dologin');
$routes->get('/login/dologout', 'LoginController::dologout');

$routes->get('/', 'HomeController::index');
$routes->get('/cetak_struk', 'HomeController::cetak_struk');

$routes->get('/users', 'UsersController::index');
$routes->get('/users/create', 'UsersController::create');
$routes->get('/users/(:segment)', 'UsersController::change/$1'); //read data
$routes->post('/users/save', 'UsersController::save');
$routes->post('/users/update/(:segment)', 'UsersController::update/$1');
$routes->get('/users/delete/(:segment)', 'UsersController::delete/$1');

$routes->get('/password', 'PasswordController::index');
$routes->post('/password/update/(:segment)', 'PasswordController::update/$1');
$routes->get('/password/reset/(:segment)', 'PasswordController::reset/$1');
$routes->post('/password/doreset/(:segment)', 'PasswordController::doreset/$1');

$routes->get('/instansi', 'InstansiController::index');
$routes->get('/instansi/create', 'InstansiController::create');
$routes->post('/instansi/save', 'InstansiController::save');
$routes->get('/instansi/change/(:segment)', 'InstansiController::change/$1'); //read data
$routes->post('/instansi/update/(:segment)', 'InstansiController::update/$1');
$routes->get('/instansi/delete/(:segment)', 'InstansiController::delete/$1');

$routes->get('/level', 'LevelController::index');
$routes->get('/level/create', 'LevelController::create');
$routes->post('/level/save', 'LevelController::save');
$routes->get('/level/change/(:segment)', 'LevelController::change/$1'); //read data
$routes->post('/level/update/(:segment)', 'LevelController::update/$1');
$routes->get('/level/delete/(:segment)', 'LevelController::delete/$1');

$routes->get('/access', 'AccessController::index');
$routes->get('/access/create', 'AccessController::create');
$routes->post('/access/save', 'AccessController::save');
$routes->get('/access/change/(:segment)', 'AccessController::change/$1'); //read data
$routes->post('/access/update/(:segment)', 'AccessController::update/$1');
$routes->get('/access/delete/(:segment)', 'AccessController::delete/$1');

$routes->get('/satuan', 'SatuanController::index');
$routes->get('/satuan/create', 'SatuanController::create');
$routes->post('/satuan/save', 'SatuanController::save');
$routes->get('/satuan/change/(:segment)', 'SatuanController::change/$1'); //read data
$routes->post('/satuan/update/(:segment)', 'SatuanController::update/$1');
$routes->get('/satuan/delete/(:segment)', 'SatuanController::delete/$1');

$routes->get('/kategori', 'KategoriController::index');
$routes->get('/kategori/create', 'KategoriController::create');
$routes->post('/kategori/save', 'KategoriController::save');
$routes->get('/kategori/change/(:segment)', 'KategoriController::change/$1'); //read data
$routes->post('/kategori/update/(:segment)', 'KategoriController::update/$1');
$routes->get('/kategori/delete/(:segment)', 'KategoriController::delete/$1');

$routes->get('/jenisoperasional', 'JenisOperasionalController::index');
$routes->get('/jenisoperasional/create', 'JenisOperasionalController::create');
$routes->post('/jenisoperasional/save', 'JenisOperasionalController::save');
$routes->get('/jenisoperasional/change/(:segment)', 'JenisOperasionalController::change/$1'); //read data
$routes->post('/jenisoperasional/update/(:segment)', 'JenisOperasionalController::update/$1');
$routes->get('/jenisoperasional/delete/(:segment)', 'JenisOperasionalController::delete/$1');

$routes->get('/barang', 'BarangController::index');
$routes->get('/barang/create', 'BarangController::create');
$routes->post('/barang/save', 'BarangController::save');
$routes->get('/barang/change/(:segment)', 'BarangController::change/$1'); //read data
$routes->post('/barang/update/(:segment)', 'BarangController::update/$1');
$routes->get('/barang/delete/(:segment)', 'BarangController::delete/$1');

$routes->get('/pelanggan', 'PelangganController::index');
$routes->get('/pelanggan/create', 'PelangganController::create');
$routes->post('/pelanggan/save', 'PelangganController::save');
$routes->get('/pelanggan/change/(:segment)', 'PelangganController::change/$1'); //read data
$routes->post('/pelanggan/update/(:segment)', 'PelangganController::update/$1');
$routes->get('/pelanggan/delete/(:segment)', 'PelangganController::delete/$1');

$routes->get('/suplier', 'SuplierController::index');
$routes->get('/suplier/create', 'SuplierController::create');
$routes->post('/suplier/save', 'SuplierController::save');
$routes->get('/suplier/change/(:segment)', 'SuplierController::change/$1'); //read data
$routes->post('/suplier/update/(:segment)', 'SuplierController::update/$1');
$routes->get('/suplier/delete/(:segment)', 'SuplierController::delete/$1');

$routes->get('/pembelian', 'PembelianController::index');
$routes->get('/pembelian/cart_read', 'PembelianController::cart_read');
$routes->get('/pembelian/total', 'PembelianController::total');
$routes->post('/pembelian/getbarang', 'PembelianController::getbarang');
$routes->post('/pembelian/cart_add', 'PembelianController::cart_add');
$routes->get('/pembelian/cart_delete/(:segment)', 'PembelianController::cart_delete/$1'); //read data
$routes->get('/pembelian/cart_reset', 'PembelianController::cart_reset');
$routes->post('/pembelian/save', 'PembelianController::save');

$routes->get('/pembelianlist', 'PembelianlistController::index');
$routes->post('/pembelianlist/getdata', 'PembelianlistController::getdata');
$routes->get('/pembelianlist/cetak/(:segment)/(:segment)', 'PembelianlistController::cetak/$1/$2');

$routes->get('/penjualan', 'PenjualanController::index');
$routes->get('/penjualan/cart_read', 'PenjualanController::cart_read');
$routes->get('/penjualan/total', 'PenjualanController::total');
$routes->post('/penjualan/getbarang', 'PenjualanController::getbarang');
$routes->post('/penjualan/cart_add', 'PenjualanController::cart_add');
$routes->get('/penjualan/cart_delete/(:segment)', 'PenjualanController::cart_delete/$1'); //read data
$routes->get('/penjualan/cart_reset', 'PenjualanController::cart_reset');
$routes->post('/penjualan/save', 'PenjualanController::save');
$routes->get('/penjualan/struk/(:segment)', 'PenjualanController::struk/$1');

$routes->get('/penjualanlist', 'PenjualanlistController::index');
$routes->post('/penjualanlist/getdata', 'PenjualanlistController::getdata');
$routes->get('/penjualanlist/cetak/(:segment)/(:segment)', 'PenjualanlistController::cetak/$1/$2');

$routes->get('/returpenjualan', 'ReturpenjualanController::index');
$routes->get('/returpenjualan/cart_read', 'ReturpenjualanController::cart_read');
$routes->get('/returpenjualan/total', 'ReturpenjualanController::total');
$routes->post('/returpenjualan/getbarang', 'ReturpenjualanController::getbarang');
$routes->post('/returpenjualan/getfaktur', 'ReturpenjualanController::getfaktur');
$routes->post('/returpenjualan/cart_add', 'ReturpenjualanController::cart_add');
$routes->get('/returpenjualan/cart_delete/(:segment)', 'ReturpenjualanController::cart_delete/$1'); //read data
$routes->get('/returpenjualan/cart_reset', 'ReturpenjualanController::cart_reset');
$routes->post('/returpenjualan/save', 'ReturpenjualanController::save');

$routes->get('/operasional', 'operasionalController::index');
$routes->get('/operasional/view/(:segment)', 'operasionalController::view/$1');
$routes->get('/operasional/create/(:segment)', 'operasionalController::create/$1');
$routes->post('/operasional/save/(:segment)', 'operasionalController::save/$1');
$routes->get('/operasional/change/(:segment)', 'operasionalController::change/$1'); //read data
$routes->post('/operasional/update/(:segment)', 'operasionalController::update/$1');
$routes->get('/operasional/delete/(:segment)', 'operasionalController::delete/$1');

$routes->get('/labarugi', 'labarugiController::index');
$routes->post('/labarugi/getdata', 'labarugiController::getdata');
$routes->get('/labarugi/cetak/(:segment)/(:segment)', 'labarugiController::cetak/$1/$2');

$routes->get('/ajax', 'AjaxController::index');
$routes->get('/ajax/cart_read', 'AjaxController::cart_read');
$routes->post('/ajax/getbarang', 'AjaxController::getbarang');
$routes->post('/ajax/cart_add', 'AjaxController::cart_add');
$routes->get('/ajax/cart_delete/(:segment)', 'AjaxController::cart_delete/$1');
$routes->get('/ajax/cart_reset', 'AjaxController::cart_reset');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
