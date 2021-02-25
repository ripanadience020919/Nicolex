<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['home/edit_faq/(:any)'] = 'home/add_faq';
$route['home/edit_info/(:any)'] = 'home/add_info';
$route['home/edit_business_rate/(:any)'] = 'home/add_business_rate';
$route['home/edit_property_rate/(:any)'] = 'home/add_property_rate';
$route['home/edit_vehicle_rate/(:any)'] = 'home/add_vehicle_rate';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
