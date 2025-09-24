<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Posisi::beranda');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/pengumuman', 'Diterima::pengumuman');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/daftarpelamar', 'Pelamar::index');
$routes->get('/pelamarditerima', 'Diterima::index');
$routes->get('/pelamarditolak', 'Ditolak::index');
$routes->get('/daftarlowongan', 'Posisi::index');
$routes->get('/wawancara', 'Wawancara::index');


$routes->delete('/pelamar/(:num)', "Pelamar::delete/$1");

$routes->get('/daftarpelamar/(:any)', 'Pelamar::detail/$1');
$routes->get('/pelamar/v_tambahpelamar', 'Pelamar::create');
$routes->post('pelamar/save', 'Pelamar::save');


$routes->get('/pelamar/delete/(:num)', 'Pelamar::delete/$1');


$routes->get('pelamar/edit/(:segment)', 'Pelamar::edit/$1');

$routes->post('pelamar/edit/pelamar/update/(:num)', 'Pelamar::update/$1');

$routes->get('/daftarlowongan/(:any)', 'Posisi::detail/$1');
$routes->get('/posisi/v_tambahposisi', 'Posisi::create');
$routes->post('posisi/save', 'Posisi::save');

$routes->delete('/posisi/(:num)', "Posisi::delete/$1");

$routes->get('posisi/edit/(:segment)', 'Posisi::edit/$1');
$routes->post('posisi/edit/posisi/update/(:num)', 'Posisi::update/$1');

$routes->get('pelamar/wawancara/(:num)', 'Pelamar::wawancara/$1');
$routes->delete('/wawancara/(:num)', 'Wawancara::delete/$1');
$routes->get('wawancara/edit/(:segment)', 'Wawancara::edit/$1');
$routes->post('wawancara/update/(:segment)', 'Wawancara::update/$1');



$routes->get('wawancara/terima/(:num)', 'Wawancara::terima/$1');
$routes->get('wawancara/tolak/(:num)', 'Wawancara::tolak/$1');

$routes->delete('/diterima/(:num)', 'Diterima::delete/$1');

$routes->get('pelamar/tolak/(:num)', 'Pelamar::tolak/$1');
$routes->delete('/ditolak/(:num)', 'Ditolak::delete/$1');

$routes->get('pelamar/sendterima', 'Pelamar::sendterima');
$routes->get('pelamar/sendtolak', 'Pelamar::sendtolak');
$routes->get('wawancara/sendterima/(:num)', 'Wawancara::sendterima/$1');

$routes->get('/user/v_kirimlamaran', 'Pelamar::kirimLamaran');
$routes->post('pelamar/simpan', 'Pelamar::simpanLamaran');

$routes->post('daftarpelamar', 'Pelamar::index');
$routes->post('pengumuman', 'Diterima::index');
