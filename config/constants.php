<?php

$defaultEnv = 'prod';

$env = getenv('PHP_ENV') ?: $defaultEnv;

$dir = __DIR__;
$configFile = "$dir/$env/constants.php";

if (!file_exists($configFile)) {
    error_log("no configuration file has been defined for "
        . "environment $env : `$defaultEnv' will be used instead.");
    $env = $defaultEnv;
    $configFile = "$dir/$env/constants.php";
}

require_once $configFile;
