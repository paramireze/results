<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['races/(:any)']          = 'races/listRaces/$1';
$route['races/(:any)/(:any)']   = 'races/results/$1/$2';
$route['races']                 = 'races/index';
$route['auth']                  = 'auth/index';
$route['excel/import']          = 'excel_import/index';
$route['excel/import-data']     = 'excel_import/import_data';
$route['people']                = 'people/index';
$route['default_controller']    = 'pages/view';
$route['(:any)']                = 'pages/view/$1';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

/*
 *
$route['posts/create']          = 'posts/create';
$route['posts/update']          = 'posts/update';
$route['posts/(:any)']          = 'posts/view/$1';
$route['posts']                 = 'posts/index';
$route['race_events']           = 'race_events/index';
$route['categories']            = 'categories/index';


 */
