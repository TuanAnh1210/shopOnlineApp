<?php
$css_file = $domainPage . "/public/css/style.css";
$dashboard_css = $domainPage . "/public/css/dashboard.css";
$css_responsive = $domainPage . "/public/css/reponsive.css";
$grid_css = $domainPage . "/public/css/bootstrap-grid.css";
$gridmap_css = $domainPage . "/public/css/bootstrap-grid.css.map";

function css_file()
{
    return $GLOBALS['css_file'];
}

function dashboard_css()
{
    return $GLOBALS['dashboard_css'];
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
