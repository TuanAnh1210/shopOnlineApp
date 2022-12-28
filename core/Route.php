<?php
class Route
{
    function handleRoute($url)
    {
        global $routes;
        unset($routes['default_controller']);
        $url = trim($url, '/');

        if (empty($url)) {
            $url = '/';
        }

        $handleUrl = $url;
        if (!empty($routes)) {
            foreach ($routes as $key => $value) {
                if (preg_match('~' . $key . '~is', $url)) {
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url);
                }
            }
        }

        return $handleUrl;
    }
}