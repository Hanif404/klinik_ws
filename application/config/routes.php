<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/* api router */
$route['api/v1/user/login']['post']='Auth/login'; // login
$route['api/v1/user/get']['get']='Auth/getProfile';
$route['api/v1/register']['post']='Auth/register';
$route['api/v1/user/upload/(:any)']['post']='Auth/uploadFoto/$1';
$route['api/v1/user/edit']['post']='Auth/editUser';
$route['api/v1/user/change']['post']='Auth/changePassword';
$route['api/v1/user/reset']['post']='Auth/resetPassword';

/*Jadwal Klinik*/
$route['api/v1/klinik/all']['get']='Klinik/index';
$route['api/v1/klinik/last']['get']='Klinik/lastSchedule';
$route['api/v1/klinik/add']['post']='Klinik/create';
$route['api/v1/klinik/edit']['post']='Klinik/edit';
$route['api/v1/klinik/delete']['post']='Klinik/delete';

/*Jadwal Pemeriksaan*/
$route['api/v1/pemeriksaan/all']['get']='Pemeriksaan/index';
$route['api/v1/pemeriksaan/add']['post']='Pemeriksaan/create';
$route['api/v1/pemeriksaan/edit']['post']='Pemeriksaan/edit';
$route['api/v1/pemeriksaan/delete']['post']='Pemeriksaan/delete';

/*Antrian Klinik*/
$route['api/v1/antrian']['get']='Antrian/index';
$route['api/v1/antrian/add']['get']='Antrian/create';
$route['api/v1/antrian/edit']['post']='Antrian/edit';
$route['api/v1/antrian/delete']['post']='Antrian/delete';

/*Registrasi*/
$route['api/v1/registrasi/all/(:any)']['get']='Registrasi/index/$1';
$route['api/v1/registrasi/detail/(:any)/(:any)']['get']='Registrasi/getOne/$1/$2';

$route['api/v1/registrasi/all']['get']='Registrasi/getByUser';
$route['api/v1/registrasi/detail/(:any)']['get']='Registrasi/getOneByUser/$1';

$route['api/v1/registrasi/add']['post']='Registrasi/create';
$route['api/v1/registrasi/edit']['post']='Registrasi/edit';
$route['api/v1/registrasi/delete']['post']='Registrasi/delete';

/*Rekam Medis*/
$route['api/v1/rekam_medis/all/(:any)']['get']='Rekammedis/index/$1'; //id registrasi
$route['api/v1/rekam_medis/detail/(:any)']['get']='Rekammedis/getOne/$1'; //id rekam medis
$route['api/v1/rekam_medis/last']['get']='Rekammedis/getLastPeriksa';

$route['api/v1/rekam_medis/add']['post']='Rekammedis/create';
$route['api/v1/rekam_medis/edit']['post']='Rekammedis/edit';
$route['api/v1/rekam_medis/delete']['post']='Rekammedis/delete';

/*Konsultasi*/
$route['api/v1/konsultasi/all/(:any)']['get']='Konsultasi/getComment/$1';
$route['api/v1/konsultasi/user/(:any)']['get']='Konsultasi/getCommentUser/$1';
$route['api/v1/konsultasi/add']['post']='Konsultasi/addComment';
$route['api/v1/konsultasi/edit']['post']='Konsultasi/editComment';
$route['api/v1/konsultasi/edit_read']['post']='Konsultasi/editReadComment';
$route['api/v1/konsultasi/delete']['post']='Konsultasi/deleteComment';

/* default router */
$route['default_controller'] ='Api/index';
$route['admin']='admin';
$route['404_override'] = 'Api/routerNotFoundHandler';
$route['translate_uri_dashes'] = FALSE;
