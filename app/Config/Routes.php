<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Authentication Routing ---- Removed 
// Routing custom 

// auth
$routes->get('login', 'Login::index', ['as' => 'login']);
$routes->post('do-login', 'Login::doLogin');
$routes->get('logout', 'Login::doLogout');

$routes->get('generate-cv-pdf/(:any)', 'PdfGenerator::index/$1', ['as' => 'generate-cv-pdf']);
$routes->get('generate-cv-excel/(:any)', 'ExcelGenerator::index/$1', ['as' => 'generate-cv-excel']);

// Master 
$routes->get('book', 'Master/Book::index');

$routes->group('users', function ($routes) {
    $routes->get('', 'Master\User::index', ['as' => 'user-list']);
    $routes->post('add', 'Master\User::add', ['as' => 'user-add']);
    $routes->get('edit/(:any)', 'Master\User::edit/$1', ['as' => 'user-edit']);
    $routes->post('update', 'Master\User::update', ['as' => 'user-update']);
    $routes->get('delete', 'Master\User::delete', ['as' => 'user-delete']);
});

// Transaction 
$routes->group('stocks', function ($routes) {
    $routes->get('', 'Transaction\Stock::index', ['as' => 'stock-list']);
    $routes->get('add', 'Transaction\Stock::add', ['as' => 'stock-add']);
    $routes->get('view/(:any)', 'Transaction\Stock::view/$1', ['as' => 'stock-view']);
    $routes->post('store', 'Transaction\Stock::store', ['as' => 'stock-store']);
    // $routes->get('delete', 'Transaction\Stock::delete', ['as' => 'stock-delete']);
});

$routes->group('stock-outs', function ($routes) {
    $routes->get('', 'Transaction\Stockout::index', ['as' => 'stock-out-list']);
    $routes->get('add', 'Transaction\Stockout::add', ['as' => 'stock-out-add']);
    $routes->post('store', 'Transaction\Stockout::store', ['as' => 'stock-out-store']);
    $routes->get('get-stock/(:any)', 'Transaction\Stockout::getStock/$1', ['as' => 'stock-get']);
    $routes->get('view/(:any)', 'Transaction\Stockout::view/$1', ['as' => 'stock-out-view']);
    // $routes->get('delete', 'Transaction\Stockout::delete', ['as' => 'stock-out-delete']);
});

$routes->group('stock-barang', function ($routes) {
    $routes->get('', 'StockController::index', ['as' => 'stock-barang']);
});

//Category
$routes->group('categories', function ($routes) {
    $routes->get('', 'Master\Category::index', ['as' => 'category-list']);
    $routes->post('add', 'Master\Category::add', ['as' => 'category-add']);
    $routes->get('edit/(:any)', 'Master\Category::edit/$1', ['as' => 'category-edit']);
    $routes->post('update', 'Master\Category::update', ['as' => 'category-update']);
    $routes->get('delete', 'Master\Category::delete', ['as' => 'category-delete']);
});

//Unit
$routes->group('units', function ($routes) {
    $routes->get('', 'Master\Unit::index', ['as' => 'unit-list']);
    $routes->post('add', 'Master\Unit::add', ['as' => 'unit-add']);
    $routes->get('edit/(:any)', 'Master\Unit::edit/$1', ['as' => 'unit-edit']);
    $routes->post('update', 'Master\Unit::update', ['as' => 'unit-update']);
    $routes->get('delete', 'Master\Unit::delete', ['as' => 'unit-delete']);
});

// Products
$routes->group('products', function ($routes) {
    $routes->get('', 'Master\Product::index', ['as' => 'product-list']);
    $routes->post('add', 'Master\Product::add', ['as' => 'product-add']);
    $routes->get('edit/(:any)', 'Master\Product::edit/$1', ['as' => 'product-edit']);
    $routes->post('update', 'Master\Product::update', ['as' => 'product-update']);
    $routes->get('delete', 'Master\Product::delete', ['as' => 'product-delete']);
});

// Curriculum Vitae
$routes->group('curriculum-vitaes', function ($routes) {
    $routes->get('', 'MastercvController::index', ['as' => 'cv-list']);
    $routes->get('add', 'MastercvController::add', ['as' => 'cv-add']);
    $routes->get('edit/(:any)', 'MastercvController::edit/$1', ['as' => 'cv-edit']);
    $routes->post('update', 'MastercvController::update', ['as' => 'cv-update']);
    $routes->get('delete', 'MastercvController::delete', ['as' => 'cv-delete']);
    $routes->post('store', 'MastercvController::store', ['as' => 'cv-store']);
});

// Routing template nya ya guys
$routes->get('/', 'Home::index', ['as' => 'dashboard']);
$routes->get('/home', 'Home::index');
$routes->get('index-dark', 'Home::show_index_dark');
$routes->get('index-rtl', 'Home::show_index_rtl');
$routes->get('layouts-boxed', 'Home::show_layouts_boxed');
$routes->get('layouts-colored-sidebar', 'Home::show_colored_sidebar');
$routes->get('layouts-compact-sidebar', 'Home::show_compact_sidebar');
$routes->get('layouts-dark-sidebar', 'Home::show_dark_sidebar');
$routes->get('layouts-icon-sidebar', 'Home::show_icon_sidebar');
$routes->get('layouts-scrollable', 'Home::show_layouts_scrollable');

//Multi-language functionality 
$routes->get('/lang/{locale}', 'Language::index');

// //Layout section routing
$routes->get('layouts-horizontal', 'Home::show_layouts_horizontal');
$routes->get('layouts-horizontal-boxed', 'Home::show_layouts_horizontal_boxed');
$routes->get('layouts-horizontal-dark', 'Home::show_layouts_horizontal_dark');
$routes->get('layouts-horizontal-rtl', 'Home::show_layouts_horizontal_rtl');
$routes->get('layouts-horizontal-scrollable', 'Home::show_layouts_horizontal_scrollable');
$routes->get('layouts-horizontal-dark-topbar', 'Home::show_layouts_dark_topbar');

// UI Elements
$routes->get('ui-alerts', 'Home::show_ui_alerts');
$routes->get('ui-buttons', 'Home::show_ui_buttons');
$routes->get('ui-cards', 'Home::show_ui_cards');
$routes->get('ui-carousel', 'Home::show_ui_carousel');
$routes->get('ui-dropdowns', 'Home::show_ui_dropdowns');
$routes->get('ui-grid', 'Home::show_ui_grid');
$routes->get('ui-images', 'Home::show_ui_images');
$routes->get('ui-modals', 'Home::show_ui_modals');
$routes->get('ui-progressbars', 'Home::show_ui_progressbars');
$routes->get('ui-tabs-accordions', 'Home::show_ui_tabs_accordions');
$routes->get('ui-typography', 'Home::show_ui_typography');
$routes->get('ui-video', 'Home::show_ui_video');
$routes->get('ui-general', 'Home::show_ui_general');
$routes->get('ui-colors', 'Home::show_ui_colors');
$routes->get('ui-offcanvas', 'Home::show_ui_offcanvas');

//Extended
$routes->get('extended-lightbox', 'Home::show_extended_lightbox');
$routes->get('extended-sweet-alert', 'Home::show_extended_sweet_alert');
$routes->get('extended-notifications', 'Home::show_extended_notification');

// Forms
$routes->get('form-elements', 'Home::show_form_elements');
$routes->get('form-validation', 'Home::show_form_validation');
$routes->get('form-advanced', 'Home::show_form_advanced');
$routes->get('form-editors', 'Home::show_form_editors');
$routes->get('form-uploads', 'Home::show_form_uploads');
$routes->get('form-xeditable', 'Home::show_form_xeditable');
$routes->get('form-repeater', 'Home::show_form_repeater');
$routes->get('form-wizard', 'Home::show_form_wizard');
$routes->get('form-mask', 'Home::show_form_mask');

// Tables
$routes->get('tables-basic', 'Home::show_tables_basic');
$routes->get('tables-datatable', 'Home::show_tables_datatable');
$routes->get('tables-responsive', 'Home::show_tables_responsive');
$routes->get('tables-editable', 'Home::show_tables_editable');

// Charts
$routes->get('charts-apex', 'Home::show_charts_apex');
$routes->get('charts-chartjs', 'Home::show_charts_chartjs');
$routes->get('charts-echart', 'Home::show_charts_echart');
$routes->get('charts-knob', 'Home::show_charts_knob');
$routes->get('charts-sparkline', 'Home::show_charts_sparkline');

// Icons
$routes->get('icons-boxicons', 'Home::show_icons_boxicons');
$routes->get('icons-materialdesign', 'Home::show_icons_materialdesign');
$routes->get('icons-dripicons', 'Home::show_icons_dripicons');
$routes->get('icons-fontawesome', 'Home::show_icons_fontawesome');

// Maps
$routes->get('maps-google', 'Home::show_maps_google');
$routes->get('maps-vector', 'Home::show_maps_vector');
$routes->get('maps-leaflet', 'Home::show_maps_leaflet');



/**
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
