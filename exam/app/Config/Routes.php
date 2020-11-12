<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->post('/addExam', 'ExamCreator::addExam',['namespace' => 'App\Controllers\admin']);
$routes->post('/viewExamsAdmin', 'ExamCreator::viewExamsAdmin',['namespace' => 'App\Controllers\admin']);
$routes->post('/viewExamsScore', 'ExamCreator::viewExamsScore',['namespace' => 'App\Controllers\admin']);
$routes->post('/updateExam', 'ExamCreator::updateExam',['namespace' => 'App\Controllers\admin']);
$routes->post('/removeExam', 'ExamCreator::removeExam',['namespace' => 'App\Controllers\admin']);
$routes->post('/viewExams', 'ExamTaker::viewExam',['namespace' => 'App\Controllers\user']);
$routes->post('/gradeExam', 'ExamTaker::gradeExam',['namespace' => 'App\Controllers\user']);


$routes->group('admin', function($routes) {
	$routes->get('/', 'ExamCreator::index',['as' => 'Exam Creator','namespace' => 'App\Controllers\admin']);
	$routes->get('addingexam', 'ExamCreator::addExamUrl',['as' => 'Add Exam','namespace' => 'App\Controllers\admin']);
	$routes->get('viewScores', 'ExamCreator::examanduser',['as' => 'ViewScores','namespace' => 'App\Controllers\admin']);

	$routes->get('viewThisExam/(:num)', 'ExamCreator::viewThisExam/$1',['namespace' => 'App\Controllers\admin']);
	$routes->get('editThisExam/(:num)', 'ExamCreator::editThisExam/$1',['as' => 'editExamUrl','namespace' => 'App\Controllers\admin']);

});

$routes->group('user', function($routes) {
	$routes->get('/', 'ExamTaker::index',['as' => 'examTaker','namespace' => 'App\Controllers\user']);
	$routes->get('take/(:num)', 'ExamTaker::take/$1',['namespace' => 'App\Controllers\user']);
});



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
