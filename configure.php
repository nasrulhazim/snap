<?php 

$composerPath = $argv[1];
$extension = pathinfo($composerPath, PATHINFO_EXTENSION);

if(! file_exists($composerPath) || $extension != 'json') {
    display('invalid input');
    exit;
}

display('Composer file provided exists');

$composerContent = json_decode(file_get_contents($composerPath), JSON_OBJECT_AS_ARRAY);

$composerContent['autoload']['files'] = ["support/helpers.php"];

file_put_contents($composerPath, json_encode($composerContent, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));

display('Composer helpers');

function display($output)
{
    echo $output . PHP_EOL;
}