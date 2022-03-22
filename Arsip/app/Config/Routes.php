<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
//$routes->get('/registration_user_bappeda_arsip', 'RegistrationUserArsipBappeda::index');
//
//$routes->post('/dataRegistration', 'RegistrationUserArsipBappeda::dataRegistration');
$routes->post('/dataLogin', 'Login::dataLogin');

$routes->post('/logout', 'Dashboard::logout', ['filter' => 'isAdmin']);

// Kategori Arsip
$routes->get('/kategori_arsip', 'KategoriArsip::index', ['filter' => 'isAdmin']);
$routes->get('/kategori_arsip/tambah_data', 'KategoriArsip::tambahData', ['filter' => 'isAdmin']);
$routes->get('/kategori_arsip/edit/(:segment)', 'KategoriArsip::editData/$1', ['filter' => 'isAdmin']);
$routes->post('/getDataKategori', 'KategoriArsip::getDataKategori', ['filter' => 'isAdmin']);
$routes->post('/dataEditKategori', 'KategoriArsip::dataEditKategori', ['filter' => 'isAdmin']);
$routes->post('/hapusDataKategori', 'KategoriArsip::hapusDataKategori', ['filter' => 'isAdmin']);

// Klasifikasi Arsip
$routes->get('/klasifikasi_arsip', 'KlasifikasiArsip::index', ['filter' => 'isAdmin']);
$routes->get('/klasifikasi_arsip/tambah_data', 'KlasifikasiArsip::tambahData', ['filter' => 'isAdmin']);
$routes->get('/klasifikasi_arsip/edit/(:segment)', 'KlasifikasiArsip::editData/$1', ['filter' => 'isAdmin']);
$routes->post('/getDataKlasifikasi', 'KlasifikasiArsip::getDataKlasifikasi', ['filter' => 'isAdmin']);
$routes->post('/hapusDataKlasifikasi', 'KlasifikasiArsip::hapusDataKlasifikasi', ['filter' => 'isAdmin']);
$routes->post('/dataEditKlasifikasi', 'KlasifikasiArsip::dataEditKlasifikasi', ['filter' => 'isAdmin']);

// Perkembangan Arsip
$routes->get('/perkembangan_arsip', 'PerkembanganArsip::index', ['filter' => 'isAdmin']);
$routes->get('/perkembangan_arsip/tambah_data', 'PerkembanganArsip::tambahData', ['filter' => 'isAdmin']);
$routes->get('/perkembangan_arsip/edit/(:segment)', 'PerkembanganArsip::editData/$1', ['filter' => 'isAdmin']);
$routes->post('/getDataPerkembangan', 'PerkembanganArsip::getDataPerkembangan', ['filter' => 'isAdmin']);
$routes->post('/hapusDataPerkembangan', 'PerkembanganArsip::hapusDataPerkembangan', ['filter' => 'isAdmin']);
$routes->post('/dataEditPerkembangan', 'perkembanganArsip::dataEditPerkembangan', ['filter' => 'isAdmin']);

// Retensi Arsip
$routes->get('/retensi_arsip', 'RetensiArsip::index', ['filter' => 'isAdmin']);
$routes->get('/retensi_arsip/tambah_data', 'RetensiArsip::tambahData', ['filter' => 'isAdmin']);
$routes->get('/retensi_arsip/edit/(:segment)', 'RetensiArsip::editData/$1', ['filter' => 'isAdmin']);
$routes->post('/getDataRetensi', 'RetensiArsip::getDataRetensi', ['filter' => 'isAdmin']);
$routes->post('/dataEditRetensi', 'RetensiArsip::dataEditRetensi', ['filter' => 'isAdmin']);
$routes->post('/hapusDataRetensi', 'RetensiArsip::hapusDataRetensi', ['filter' => 'isAdmin']);

// Satuan Arsip
$routes->get('/satuan_arsip', 'SatuanArsip::index', ['filter' => 'isAdmin']);
$routes->get('/satuan_arsip/tambah_data', 'SatuanArsip::tambahData', ['filter' => 'isAdmin']);
$routes->get('/satuan_arsip/edit/(:segment)', 'SatuanArsip::editData/$1', ['filter' => 'isAdmin']);
$routes->post('/getDataSatuan', 'SatuanArsip::getDataSatuan', ['filter' => 'isAdmin']);
$routes->post('/dataEditSatuan', 'SatuanArsip::dataEditSatuan', ['filter' => 'isAdmin']);
$routes->post('/hapusDataSatuan', 'SatuanArsip::hapusDataSatuan', ['filter' => 'isAdmin']);

// Inaktif Arsip
$routes->get('/inaktif_arsip', 'InaktifArsip::index', ['filter' => 'isAdmin']);
$routes->get('/inaktif_arsip/tambah_data', 'InaktifArsip::tambahData', ['filter' => 'isAdmin']);
$routes->get('/inaktif_arsip/edit/(:segment)', 'InaktifArsip::editData/$1', ['filter' => 'isAdmin']);
$routes->post('/getDataInaktif', 'InaktifArsip::getDataInaktif', ['filter' => 'isAdmin']);
$routes->post('/dataEditInaktif', 'InaktifArsip::dataEditInaktif', ['filter' => 'isAdmin']);
$routes->post('/hapusDataInaktif', 'InaktifArsip::hapusDataInaktif', ['filter' => 'isAdmin']);

// Kesimpulan Arsip
$routes->get('/kesimpulan_arsip', 'KesimpulanArsip::index', ['filter' => 'isAdmin']);

// Print Excel
$routes->post('/print_excel', 'PrintExcel::index', ['filter' => 'isAdmin']);

// Setting
$routes->get('/settings', 'Setting::index', ['filter' => 'isAdmin']);
$routes->get('/settings/password_ubah', 'Setting::ubahPassword', ['filter' => 'isAdmin']);
$routes->post('/dataUser', 'Setting::dataUser', ['filter' => 'isAdmin']);
$routes->post('/dataPassword', 'Setting::dataPassword', ['filter' => 'isAdmin']);



















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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
