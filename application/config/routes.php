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
|	https://codeigniter.com/user_guide/general/routing.html
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

$route['default_controller'] = "login";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['adminpanel/dashboard'] = 'user';
$route['adminpanel/logout'] = 'user/logout';
$route['adminpanel/userListing'] = 'user/userListing';
$route['adminpanel/userListing/(:num)'] = "user/userListing/$1";
$route['adminpanel/addNewUser'] = "user/addNewUser";
$route['adminpanel/addingNewUser'] = "user/addingNewUser";
$route['adminpanel/editUser'] = "user/editUser";
$route['adminpanel/editUser/(:num)'] = "user/editUser/$1";
$route['adminpanel/editingUser'] = "user/editingUser";
$route['adminpanel/deleteUser'] = "user/deleteUser";
$route['adminpanel/activeDeactiveOrDeleteAllUsers'] = "user/active_deactive_delete_all_users"; 

$route['adminpanel/profile'] = "user/profile";
$route['adminpanel/profile/(:any)'] = "user/profile/$1";
$route['adminpanel/profileUpdate'] = "user/profileUpdate";
$route['adminpanel/profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['adminpanel/fileupload'] = "fileupload";
$route['adminpanel/fileuploading'] = "fileupload/UploadFile"; 



$route['adminpanel/loadChangePass'] = "user/loadChangePass";
$route['adminpanel/changePassword'] = "user/changePassword";
$route['adminpanel/changePassword/(:any)'] = "user/changePassword/$1";
$route['adminpanel/pageNotFound'] = "user/pageNotFound";
$route['adminpanel/checkEmailExists'] = "user/checkEmailExists";
$route['adminpanel/login-history'] = "user/loginHistoy";
$route['adminpanel/login-history/(:num)'] = "user/loginHistoy/$1";
$route['adminpanel/delete_all_history/(:num)'] = "user/delete_all_history/$1";





$route['adminpanel/login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2"; 

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

// delete data in admin panel---
$route['adminpanel/Delete/(:any)/(:any)/(:num)'] = "user/Delete/$1/$2/$3";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
