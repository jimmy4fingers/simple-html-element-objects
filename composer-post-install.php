<?php
/**
 * Composer script
 */
echo "Running post composer install scripts..." . PHP_EOL;

// set up git hooks
include_once('composer'.DIRECTORY_SEPARATOR.'scripts'.DIRECTORY_SEPARATOR.'git'.DIRECTORY_SEPARATOR.'git-hooks.php');