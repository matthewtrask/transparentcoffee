<?php
if(file_exists('vendor/autoload.php')){
	require 'vendor/autoload.php';
} else {
	echo "<h1>Please install via composer.json</h1>";
	echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
	echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
	exit;
}

if (!is_readable('app/core/config.php')) {
	die('No config.php found, configure and rename config.example.php to config.php in app/core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}

//initiate config
new \core\config();

//create alias for Router
use \core\router,
    \helpers\url;

//define routes
Router::any('', '\controllers\ttc@index');
Router::any('home', '\controllers\ttc@index');
Router::any('about', '\controllers\ttc@about');
Router::any('transparency', '\controllers\ttc@transparency');
Router::any('seg', 'controllers\ttc@seg');
Router::any('transparentcoffees', '\controllers\ttc@ttcoffees');
Router::any('register', '\controllers\ttc@register');
Router::any('registrationinfo', '\controllers\ttc@registrationInfo');
Router::any('submitRegister', '\controllers\ttc@submitRegister');
Router::any('thankyou', '\controllers\ttc@thankyou');
// Router::any('insights','\controllers\ttc@insights');
Router::any('scrpi', '\controllers\ttc@scrpi');
Router::any('roasters', '\controllers\ttc@roasters');
Router::any('contact', '\controllers\ttc@contact');
Router::any('ttcoffeesAjax', '\controllers\ttc@ttcoffeesAjax');
Router::any('extraCoffeeAjax', '\controllers\ttc@extraCoffeeAjax');
Router::any('sendContact', '\controllers\ttc@sendContact');
Router::any('bloguploads', '\uploads\blog');


Router::any('admin', '\controllers\admin\admin@index');
Router::any('admin/login', '\controllers\admin\auth@login');
Router::any('logout', '\controllers\admin\auth@logout');
Router::any('admin/pending', '\controllers\admin\admin@pending');
Router::any('pendingAjax', '\controllers\admin\admin@pendingAjax');
Router::any('rejectAjax', '\controllers\admin\admin@rejectAjax');
Router::any('archiveAjax', '\controllers\admin\admin@archiveAjax');
Router::any('activeAjax', '\controllers\admin\admin@activeAjax');
Router::any('submitUpdate', '\controllers\admin\admin@submitUpdate');
Router::any('roasterAjax', '\controllers\admin\admin@roasterAjax');
Router::any('pendingEmail', '\controllers\admin\admin@pendingEmail');
Router::any('activeEmail', '\controllers\admin\admin@activeEmail');
Router::any('archiveEmail', '\controllers\admin\admin@archiveEmail');
Router::any('gppProof', '\controllers\admin\admin@gppProof');

Router::any('admin/notes', '\controllers\admin\messages@index');
Router::any('admin/postNote','\controllers\admin\messages@postNote');

Router::any('admin/users', '\controllers\admin\users@index');
Router::any('admin/users/add', '\controllers\admin\users@add');
Router::any('admin/users/edit/(:num)', '\controllers\admin\users@edit');

Router::any('admin/csv', '\controllers\admin\csv@index');
Router::any('admin/csv/coffees', '\controllers\admin\csv@getCoffees');
Router::any('admin/csv/roasters', '\controllers\admin\csv@getRoasters');
Router::any('admin/csv/growers', '\controllers\admin\csv@getGrowers');

Router::any('admin/scrpi', '\controllers\admin\scrpi@index');
Router::any('admin/scrpi/add', '\controllers\admin\scrpi@add');
Router::any('admin/scrpi/edit/(:num)', '\controllers\admin\scrpi@edit');
Router::any('admin/scrpi/delete/(:num)', '\controllers\admin\scrpi@delete');

Router::any('admin/posts', '\controllers\admin\posts@index');
Router::any('admin/posts/add', '\controllers\admin\posts@add');
Router::any('admin/posts/edit/(:num)', '\controllers\admin\posts@edit');
Router::any('admin/posts/delete/(:num)', '\controllers\admin\posts@delete');

Router::any('admin/cats', '\controllers\admin\cats@index');
Router::any('admin/cats/add', '\controllers\admin\cats@add');
Router::any('admin/cats/edit/(:num)', '\controllers\admin\cats@edit');
Router::any('admin/cats/delete/(:num)', '\controllers\admin\cats@delete');

Router::get('admin/report-data', '\controllers\admin\admin@data');


// utilities
Router::any('admin/coffee/clear', '\controllers\admin\registration@clearPending');

Router::any('insights', '\controllers\blog@index');
Router::any('category/(:any)', '\controllers\blog@cat');
Router::any('insights/(:any)', '\controllers\blog@post');

//if no route found
Router::error('\core\error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
