<?php
session_start();

require_once 'kernel/autoload.php';

function app()
{
    return \Kernel\Core::$app;
}

new Kernel\Core(require_once 'kernel/config.php');
