<?php 

$composerPath = $argv[1];
$extension = pathinfo($composerPath, PATHINFO_EXTENSION);

if(! file_exists($composerPath) || $extension != 'json') {
    display('Invalid composer path provided');
    exit;
}

$composerContent = json_decode(file_get_contents($composerPath), JSON_OBJECT_AS_ARRAY);

display('Adding autoload helper...');
$composerContent['autoload']['files'] = ["support/helpers.php"];

display('Adding csfix script...');
$composerContent['scripts']['csffix'] = ["PHP_CS_FIXER_IGNORE_ENV=1 vendor/bin/php-cs-fixer fix -n"];

file_put_contents($composerPath, json_encode($composerContent, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));

display('Successfully added autoload helper and csfix script in composer');

function display($output) {
    echo $output . PHP_EOL;
}
