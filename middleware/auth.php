<?php

require_once __DIR__ . '/../config/app.php';

const LOGIN_URL = 'pages/auth/login.php';
const HOME_URL = 'index.php';

function sessionStart(): void
{
    if (session_status() !== PHP_SESSION_NONE) {
        return;
    }

    ini_set('session.use_strict_mode', '1');
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => APP_BASE_URL === '' ? '/' : APP_BASE_URL . '/',
        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax',
    ]);

    if (!session_start()) {
        throw new RuntimeException('Sesi tidak dapat dimulai.');
    }
}

function isLoggedIn(): bool
{
    sessionStart();

    return isset($_SESSION['user']) && is_array($_SESSION['user']);
}

function getAuthUser(): ?array
{
    sessionStart();
    $user = $_SESSION['user'] ?? null;

    return is_array($user) ? $user : null;
}

function requireAuth(): void
{
    if (isLoggedIn()) {
        return;
    }

    $_SESSION['errors'] = [
        'login' => 'Silakan login terlebih dahulu.',
    ];
    header('Location: ' . app_url(LOGIN_URL));
    exit;
}

function requireGuest(): void
{
    if (!isLoggedIn()) {
        return;
    }

    header('Location: ' . app_url(HOME_URL));
    exit;
}
