<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['home/edit_faq/(:any)'] = 'home/add_faq';
$route['home/edit_info/(:any)'] = 'home/add_info';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
