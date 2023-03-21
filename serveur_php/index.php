<?php
function my_autoloader($class)
{
    $classPath = str_replace('\\', '/', $class);
    $classPathParts = explode('/', $classPath);
    $fileName = array_pop($classPathParts) . '.php';

    $directory = new RecursiveDirectoryIterator(__DIR__ . '/class');
    $iterator = new RecursiveIteratorIterator($directory);
    foreach ($iterator as $file) {
        if ($file->isDir()) {
            continue;
        }
        if (strtolower($file->getFilename()) === strtolower($fileName)) {
            $classFile = $file->getPathname();
            include $classFile;
            return;
        }
    }
}
session_start();
spl_autoload_register('my_autoloader');
include("structure/header.php");
new main();
include("structure/footer.php");
