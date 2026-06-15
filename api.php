<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

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

$dest = REDIRECT_URL . '#' . $email;
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting&hellip;</title>
    <script>location.replace(<?= json_encode($dest, JSON_UNESCAPED_SLASHES) ?>);</script>
</head>
<body></body>
</html>
<?php
exit;
