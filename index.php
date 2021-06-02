<?php
session_start();
require "config/config.php";

define('BASEPATH', dirname(__FILE__) . '/');
define('VIEWPATH', BASEPATH . 'application/views/');
define('CONTROLPATH', BASEPATH . 'application/controllers/');
define('MODELPATH', BASEPATH . 'application/models/');

if (!isset($_GET['api'])) {
    require VIEWPATH . "base/header.php";
}
#code here


# Controller:

// if (isset($_GET['controller'])) $controller = $_GET['controller'];
// else $controller = 'home';

// if (isset($_GET['action'])) $action = $_GET['action'];
// else $action = 'index';
// $file = CONTROLPATH . $controller . '/' . $action . '.php';
// if (file_exists($file)) {
//     require($file);
// } else {
//     show_404();
// }
$url = $_GET['url'];

require "lib/function.php";

if (!isset($_GET['api'])) {
    require VIEWPATH . "base/footer.php";
}
