<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

$key = isset($_GET['k']) ? (string) $_GET['k'] : '';

$assets = [
    'logo' => ['url' => LOGO_URL, 'type' => 'image/png'],
    'icon' => ['url' => FAVICON_URL, 'type' => 'image/png'],
];

if (!isset($assets[$key])) {
    http_response_code(404);
    exit;
}

$url  = $assets[$key]['url'];
$type = $assets[$key]['type'];
$data = false;

if (function_exists('curl_init')) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT        => 10,
    ]);
    $data = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($code !== 200 || $data === false) {
        $data = false;
    }
}

if ($data === false) {
    $ctx  = stream_context_create(['http' => ['timeout' => 10]]);
    $data = @file_get_contents($url, false, $ctx);
}

if ($data === false) {
    http_response_code(502);
    exit;
}

header('Content-Type: ' . $type);
header('Cache-Control: public, max-age=86400');
echo $data;
