<style>
    body {
        font-family: sans-serif;
        color: #3a3a3a;
        margin: 0;
    }

    button:hover {
        cursor: pointer;
    }
</style>

<?php
session_start();
require "config/config.php";

define('BASEPATH', dirname(__FILE__) . '/');
define('VIEWPATH', BASEPATH . 'application/views/');
define('CONTROLPATH', BASEPATH . 'application/controllers/');
define('MODELPATH', BASEPATH . 'application/models/');



#code here


$url = $_GET['url'];
$api = (isset($_REQUEST['api']) ? true : false);
require "lib/ajax.php";
require "lib/function.php";
