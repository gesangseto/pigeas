<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// COMPRO
$route['Home'] = 'Compro/Home/Index';
$route['About'] = 'Compro/Home/About';
$route['Service'] = 'Compro/Home/Service';
$route['Contact'] = 'Compro/Home/Contact';

// Admin Area
$route['Area-Admin'] = 'Login';
$route['Area-Admin/Logout'] = 'Logout';
$route['Login'] = '404';
$route['Logout'] = '404';
