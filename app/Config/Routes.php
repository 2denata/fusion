<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//route view

// route untuk laporan PDF
$routes->match(['post'], '/laporanPDF', 'CRUDController::laporanPDF');

// route login
$routes->match(['post', 'get'], '/login', 'ControllerAccount::login');
$routes->match(['post', 'get'], '/signup', 'ControllerAccount::signup');
$routes->post('/prosesSignUp', 'ControllerAccount::prosesSignUp');
$routes->match(['post', 'get'], '/logout', 'ControllerAccount::logout');


// route untuk admin page
$routes->match(['post', 'get'], '/admin', 'CRUDController::admin');
$routes->match(['post', 'get'], '/adminCekAlat', 'CRUDController::cekAlat');
$routes->match(['post'], '/adminLihatAlat', 'CRUDController::lihatAlat');
$routes->match(['post', 'get'], '/adminInsertAlat', 'CRUDController::insertAlat');
$routes->match(['post'], '/adminEditAlat', 'CRUDController::updateAlat');
$routes->match(['post'], '/adminHapusAlat', 'CRUDController::hapusAlat');
$routes->match(['post', 'get'], '/adminCekRuangan', 'CRUDController::cekRuangan');
$routes->match(['post', 'get'], '/adminBookingRuangan', 'BookingController::tampilBookingRuangan');
$routes->match(['post', 'get'], '/adminBookingAlat', 'BookingController::tampilBookingAlat');
$routes->match(['post', 'get'], '/verifikasiBookingAlat', 'CRUDController::verifikasiBookingAlat');
$routes->match(['post', 'get'], '/verifikasiBookingRuangan', 'CRUDController::verifikasiBookingRuangan');
$routes->match(['post', 'get'], '/batalkanBookingAlat', 'CRUDController::batalkanBookingAlat');
$routes->match(['post', 'get'], '/batalkanBookingRuangan', 'CRUDController::batalkanBookingRuangan');


// route home dan checking
$routes->match(['post', 'get'], '/home', 'CheckingController::home');
$routes->match(['post', 'get'], '/alatMusik', 'CheckingController::alatMusik');
$routes->match(['post', 'get'], '/cekJadwal', 'CheckingController::cekJadwal');
$routes->match(['post', 'get'], '/cariAlat', 'CheckingController::cariAlat');
$routes->match(['post', 'get'], '/cekJadwalAlat', 'CheckingController::cekJadwalAlat');

// Routes booking
$routes->match(['post', 'get'], '/bookingRuangan', 'BookingController::pageBookingRuangan');
$routes->match(['post', 'get'], '/bookingAlatMusik', 'BookingController::pageBookingAlat');
$routes->match(['post', 'get'], '/prosesBookingAlat', 'BookingController::prosesBookingAlat');
$routes->match(['post', 'get'], '/prosesBookingRuangan', 'BookingController::prosesBookingRuangan');






