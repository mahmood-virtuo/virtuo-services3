<?php
if (!function_exists('virtuo_asset_url')) {
    function virtuo_asset_url($assetPath)
    {
        $assetPath = (string) $assetPath;

        if ($assetPath === '') {
            return $assetPath;
        }

        if (preg_match('/^(?:[a-z][a-z0-9+.-]*:)?\/\//i', $assetPath) || preg_match('/^[a-z][a-z0-9+.-]*:/i', $assetPath)) {
            return $assetPath;
        }

        $fragment = '';
        $pathAndQuery = $assetPath;
        $fragmentPosition = strpos($assetPath, '#');

        if ($fragmentPosition !== false) {
            $fragment = substr($assetPath, $fragmentPosition);
            $pathAndQuery = substr($assetPath, 0, $fragmentPosition);
        }

        $queryPosition = strpos($pathAndQuery, '?');
        $publicPath = $queryPosition === false ? $pathAndQuery : substr($pathAndQuery, 0, $queryPosition);

        if ($publicPath === '') {
            return $assetPath;
        }

        $decodedPath = rawurldecode($publicPath);

        if (strpos($decodedPath, "\0") !== false || strpos($decodedPath, '\\') !== false) {
            return $assetPath;
        }

        $relativePath = ltrim($decodedPath, '/');

        if (!preg_match('#^assets/(?:css|js)/#', $relativePath) || preg_match('#(?:^|/)\.\.(?:/|$)#', $relativePath)) {
            return $assetPath;
        }

        $projectRoot = dirname(__DIR__);
        $projectRootReal = realpath($projectRoot);
        $assetRealPath = realpath($projectRoot . '/' . $relativePath);

        if ($projectRootReal === false || $assetRealPath === false || strpos($assetRealPath, $projectRootReal . DIRECTORY_SEPARATOR) !== 0 || !is_file($assetRealPath)) {
            return $assetPath;
        }

        $version = filemtime($assetRealPath);

        if ($version === false) {
            return $assetPath;
        }

        $separator = $queryPosition === false ? '?' : '&';

        return $pathAndQuery . $separator . 'v=' . $version . $fragment;
    }
}
