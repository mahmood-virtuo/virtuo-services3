<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if ($path !== "/" && file_exists(__DIR__ . $path . ".php")) {
    require __DIR__ . $path . ".php";
    return;
}

if ($path !== "/" && file_exists(__DIR__ . $path)) {
    return false;
}

if ($path === "/") {
    require __DIR__ . "/index.php";
    return;
}

http_response_code(404);
require __DIR__ . "/error.php";