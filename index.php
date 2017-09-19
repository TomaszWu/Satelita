<?php
//require __DIR__ . '/vendor/autoload.php';
//use \src\classes\ISSPosition;
//use \src\service\GetPosition;


//$location = new ISSPosition();
//
//$location = $location->findCurrentLocation();
//
//$currentPostion = new GetPosition($location);
//
//$result = $currentPostion->prepareDraftPosition()->preparePositionToDisplay();
//
//$host  = $_SERVER['HTTP_HOST'];
//$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
//$file = 'src/Views/mainTemplate.php?address='.$result[0];
//
//header("Location: $uri/$file");
//exit();
//phpinfo();

require_once ('Routes.php');

function __autoload($class_name)
{
    if (file_exists('./src/Classes/' . $class_name . '.php')){
        require_once './src/Classes/' . $class_name . '.php';
    }
    elseif (file_exists('./src/Controllers/' . $class_name . '.php')){
        require_once './src/Controllers/' . $class_name . '.php';
    }
}