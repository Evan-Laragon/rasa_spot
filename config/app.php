<?php

$applicationRoot = realpath(dirname(__DIR__));
$documentRoot = isset($_SERVER['DOCUMENT_ROOT'])
    ? realpath($_SERVER['DOCUMENT_ROOT'])
    : false;
$detectedBaseUrl = '';

if ($applicationRoot !== false && $documentRoot !== false) {
    $normalizedApplicationRoot = str_replace('\\', '/', $applicationRoot);
    $normalizedDocumentRoot = rtrim(str_replace('\\', '/', $documentRoot), '/');

    if (strpos($normalizedApplicationRoot, $normalizedDocumentRoot . '/') === 0) {
        $detectedBaseUrl = substr($normalizedApplicationRoot, strlen($normalizedDocumentRoot));
    }
}

$configuredBaseUrl = getenv('APP_BASE_URL');
define(
    'APP_BASE_URL',
    rtrim($configuredBaseUrl !== false ? $configuredBaseUrl : $detectedBaseUrl, '/')
);

function app_url(string $path = ''): string
{
    return APP_BASE_URL . '/' . ltrim($path, '/');
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
