<?php
function my_autoloader($class)
{
    $filename = __DIR__ . "/class/" . str_replace('\\', '/', $class) . '.php';
    if (file_exists($filename)) {
        include $filename;
    }
}
session_start();
spl_autoload_register('my_autoloader');
include("structure/header.php");
new main();
include("structure/footer.php");
