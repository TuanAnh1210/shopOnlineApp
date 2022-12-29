<?php
$css_file = 'http://localhost/du_an_mau/public/css/styles.css';
$css_responsive = 'http://localhost/du_an_mau/public/css/reponsives.css';
$grid_css = 'http://localhost/du_an_mau/public/css/bootstrap-grid.css';
$gridmap_css = 'http://localhost/du_an_mau/public/css/bootstrap-grid.css.map';

function css_file()
{
    return $GLOBALS['css_file'];
}
function grid_css()
{
    return $GLOBALS['grid_css'];
}
function gridmap_css()
{
    return $GLOBALS['gridmap_css'];
}
function css_responsive()
{
    return $GLOBALS['css_responsive'];
}