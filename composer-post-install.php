<?php
/**
 * Composer script
 */
echo "Running post composer install scripts..." . PHP_EOL;

// create logs folder
if (!file_exists('logs')) {
    mkdir('logs', 0777, true);
}

// set up git hooks
include_once('composer'.DIRECTORY_SEPARATOR.'scripts'.DIRECTORY_SEPARATOR.'git'.DIRECTORY_SEPARATOR.'git-hooks.php');