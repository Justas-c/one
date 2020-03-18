<?php
require_once 'functions.php';

                    /* Define general constants: */
// Root
define('ROOT', dirname(dirname(dirname(__FILE__)))); //C:\xampp\htdocs\one
// App Root
//define('APPROOT', dirname(dirname(__FILE__))); //C:\xampp\htdocs\one\App
// new app root:
define('APPROOT', dirname(dirname(__FILE__)));
// Url Root
define('URLROOT', 'https://jcenys.lt/one/'); //http://localhost/one/
//die(APPROOT);
// Sitename
define('SITENAME', 'oneTravel');

//Other
define('AVAILABLE_COUNTRIES', ['Lietuva', 'Ispanija', 'Italija', 'Prancuzija', 'Anglija', 'Meksika', 'Olandija', 'Turkija', 'Kinija', 'Tailandas']);
// reiketu ir kitus options cia sudet, kad paskui nevargt

                            /* Session */
session_start();


                    /* Error and Exception handling */

// error_reporting(E_ALL);
// set_error_handler('Core\Error::errorHandler');
// set_exception_handler('Core\Error::exceptionHandler');

                            /* Autoload 1 */

// spl_autoload_register(function ($class){
//     //get the pararent directory
//     $root = dirname(dirname(__DIR__));
//     $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
//     if (is_readable($file)) {
//         require $root . '/' . str_replace('\\', '/', $class) . '.php';
//
//         // TEST-----------------------------------------------------------------
//         echo '<div style="color:blue">Classes loaded: ' . str_replace('C:\xampp\htdocs\log/', '', $file) . '<br></div>';
//         // TEST-----------------------------------------------------------------
//     }
// });

                            /* Autoload 2 */

require ROOT . '/vendor/autoload.php';

                            /* Router */

$router = new App\Core\Router();
// Routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('{controller}/{action}/{postid:\d+}');
$router->add('user/{controller}/{action}', ['namespace' => 'User']);
$router->add('user/UserC/activateAccount/{token:[\da-f]+}', ['controller' => 'UserC', 'action' => 'activateAccount', 'namespace' => 'user']);
$router->add('login', ['controller' => 'UserC', 'action' => 'Login', 'namespace' => 'User']);
// dispatch
$router->dispatch($_SERVER['QUERY_STRING']);
