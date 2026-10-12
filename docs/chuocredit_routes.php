<?php
/*
 * Paste into application/config/routes.php, above any catch-all route
 * such as $route['(:any)'] = ...
 *
 * The REST library adds the HTTP verb, so
 * POST student_register runs Waba_api::chuocredit_register_post().
 */

// ChuoCredit partner API
$route['student_register']['post'] = 'waba_api/chuocredit_register';
$route['student_status']['get']    = 'waba_api/chuocredit_status';
$route['campus_list']['get']       = 'waba_api/chuocredit_campuses';
