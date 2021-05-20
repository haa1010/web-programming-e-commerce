<?php
function show_404()
{
    header('HTTP/1.1 Not Found 404', true, 404);
    require(VIEWPATH . 'base/404.php');
    exit();
}
function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        ini_set('display_errors', 'On');
    } else {
        ini_set('display_errors', 'Off');
        ini_set('log_errors', 'On');
    }
}

# auto load controller classes
// function autoload()
// {
//     $fileList = glob(CONTROLPATH . "*");

//     foreach ($fileList as $filename) {
//         if (is_file($filename)) {
//             if (file_exists($filename)) {
//                 require_once $filename;
//             }
//         }
//     }
// }
function __autoload($className)
{
    if (file_exists(BASEPATH . '/lib/' . strtolower($className) . '.class.php')) {
        require_once(BASEPATH . '/lib/' . strtolower($className) . '.class.php');
    } elseif (file_exists(CONTROLPATH . $className . '.php')) {
        require_once(CONTROLPATH . $className . '.php');
    } else if (file_exists(MODELPATH . $className . '.model.php')) {
        require_once(MODELPATH . $className . '.model.php');
    } else {
        /* Error Generation Code Here */
    }
}

function callHook()
{
    global $url;
    $urlArray = array();
    $urlArray = explode("/", $url);
    $controllerName = "Home";
    $controller = $urlArray[0];
    array_shift($urlArray);
    $action = $urlArray[0];
    array_shift($urlArray);
    $queryString = $urlArray;

    if (!empty($controllerName)) {
        $controllerName = $controller;
    }
    $controller = ucfirst($controller);
    $model = $controller;
    $controller .= 'Controller';
    $dispatch = new $controller($model, $controllerName, $action);
    // $dispatch->render();
    if ((int)method_exists($controller, $action)) {
        call_user_func_array(array($dispatch, $action), $queryString);
    }
    // } else {
    //     /* Error Generation Code Here */
    // }
}

setReporting();
// autoload();
callHook();
