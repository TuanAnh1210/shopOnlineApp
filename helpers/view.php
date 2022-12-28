<?php
$view_folder = './app/Views';

function ipView($path, array $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    return require($GLOBALS['view_folder'] . '/' . str_replace('.', '/', $path) . '.php');
}