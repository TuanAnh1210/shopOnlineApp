<?php
$view_folder = './app/Views';

$mail_folder = './mail';

function ipView($path, array $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    return require($GLOBALS['view_folder'] . '/' . str_replace('.', '/', $path) . '.php');
}


function mailAuth($path, array $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    return require($GLOBALS['mail_folder'] . '/' . str_replace('.', '/', $path) . '.php');
}
