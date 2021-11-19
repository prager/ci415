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

$routes->add('home', 'Home::index');
$routes->add('Home', 'Home::index');
$routes->add('staff', 'Staff::index');
$routes->add('member', 'Member::index');
$routes->add('member', 'Member::index');
$routes->add('master', 'Master::index');
$routes->add('login', 'Login::index');
$routes->add('add-mem', 'Staff::add_mem');
$routes->add('staff-report', 'Staff::staff_report');
$routes->add('staff-report/(:alphanum)', 'Staff::staff_report');
$routes->add('edit-mem/(:num)', 'Staff::edit_mem');
$routes->add('delete-mem/(:num)', 'Staff::delete_mem');
$routes->add('set-silent-key/(:num)', 'Staff::set_silent');
$routes->add('load-silent/(:num)', 'Staff::load_silent');
$routes->add('unset-silent-key/(:num)', 'Staff::unset_silent');
$routes->add('members', 'Staff::show_members');
$routes->add('logout', 'Home::logout');
$routes->add('register', 'Home::register');
$routes->add('print-dir', 'Staff::print_dir');
$routes->add('edit-users', 'Master::edit_users');
$routes->add('delete-user/(:num)', 'Master::delete_user');
$routes->add('set-pass/(:alphanum)', 'Home::set_pass');
$routes->add('load-user/(:num)', 'Home::load_usr');
$routes->add('load-admin/(:num)', 'Master::load_admin');
$routes->add('activate/(:num)', 'Master::activate');
$routes->add('authorize/(:num)', 'Master::authorize');
$routes->add('deactivate/(:num)', 'Master::activate');
$routes->add('unauthorize/(:num)', 'Master::authorize');
$routes->add('reset-user/(:num)', 'Master::reset_user');
$routes->add('set-user/:alphanum', 'Home::set_user');
$routes->add('send-reg', 'Home::send_reg');
$routes->add('reset-password', 'Home::reset_password');
$routes->add('load-pass', 'Home::load_password');
$routes->add('lost-username', 'Home::lost_username');
$routes->add('change-username', 'Home::lost_username');
$routes->add('email-username', 'Home::email_username');
$routes->add('load-username/(:num)', 'Home::load_username');
$routes->add('new-username', 'Home::new_username');
$routes->add('set-username', 'Home::set_username');
$routes->add('confirm-membership', 'Home::confirm_mem');
$routes->add('convert-call', 'Master::convert_callsign');
$routes->add('master', 'Master::index');

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

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
