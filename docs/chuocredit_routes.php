<?php
/*
 * Paste into application/config/routes.php, above any catch-all route
 * such as $route['(:any)'] = ...
 *
 * The REST library adds the HTTP verb, so
 * POST api/v1/students/register runs Waba_api::chuocredit_register_post().
 */

// ChuoCredit partner API
$route['api/v1/students/register']['post'] = 'waba_api/chuocredit_register';
$route['api/v1/students/(:num)']['get']    = 'waba_api/chuocredit_status/$1';
$route['api/v1/campuses']['get']           = 'waba_api/chuocredit_campuses';
