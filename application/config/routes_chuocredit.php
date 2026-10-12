<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * ChuoCredit partner API routes.
 *
 * Paste these lines into application/config/routes.php, below the existing
 * routes and above any catch-all route (e.g. $route['(:any)'] = ...),
 * otherwise the catch-all will swallow these URLs.
 *
 * The REST library adds the HTTP verb to the method name, so
 * POST chuocredit_api/register runs Chuocredit_api::register_post().
 */
$route['chuocredit_api/register']['post'] = 'chuocredit_api/register';
$route['chuocredit_api/status']['get']    = 'chuocredit_api/status';
$route['chuocredit_api/campuses']['get']  = 'chuocredit_api/campuses';
