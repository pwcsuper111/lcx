<?php
declare(strict_types=1);

// ===== CHANGE YOUR REDIRECT URL HERE =====
define('REDIRECT_URL', 'https://youtube.com');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php', true, 302);
    exit;
}

$emailValue = trim((string) ($_POST['email'] ?? ''));
$email = filter_var($emailValue, FILTER_VALIDATE_EMAIL);

if ($email === false) {
    $back = 'index.php?error=1&e=' . rawurlencode($emailValue);
    header('Location: ' . $back, true, 302);
    exit;
}

header('Location: ' . REDIRECT_URL . '#' . rawurlencode($email), true, 302);
exit;
