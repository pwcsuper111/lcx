<?php
require_once __DIR__ . '/config.php';

$error = isset($_GET['error']);
$emailValue = isset($_GET['e']) ? (string) $_GET['e'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bids &amp; Tenders – Login</title>
    <link rel="icon" type="image/png" href="img.php?k=icon" />
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            background: #f0f0f0;
            color: #333;
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 20px;
        }

        .page-wrapper {
            width: 100%;
            max-width: 760px;
            margin-top: 10px;
            text-align: center;
            background: #fff;
            border: 1px solid #ccc;
            padding: 28px 28px 36px;
        }

        .logo-main {
            margin-bottom: 20px;
        }

        .logo-main img {
            height: 58px;
            width: auto;
            display: inline-block;
        }

        .divider {
            border: none;
            border-top: 2px solid #5a9e6f;
            margin: 0 0 28px;
            width: 100%;
        }

        .intro-text {
            font-size: 13.5px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 26px;
        }

        .alert {
            font-size: 13px;
            color: #c00;
            margin-bottom: 16px;
        }

        .login-form {
            display: inline-block;
            text-align: left;
            width: 100%;
            max-width: 340px;
        }

        .field-label {
            display: block;
            font-size: 13.5px;
            font-weight: bold;
            margin-bottom: 6px;
            color: #333;
        }

        .field-label .required {
            color: #c00;
            margin-left: 2px;
        }

        .email-input {
            width: 100%;
            padding: 7px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
            font-family: inherit;
            outline: none;
        }

        .email-input:focus {
            border-color: #5a9e6f;
            box-shadow: 0 0 0 2px rgba(90, 158, 111, .2);
        }

        .form-actions {
            display: flex;
            justify-content: center;
            margin-top: 22px;
        }

        .btn-access {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #2d7a2d;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 20px;
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            transition: background .15s;
        }

        .btn-access:hover {
            background: #246124;
        }

        .btn-access svg {
            width: 14px;
            height: 14px;
            fill: #fff;
        }
    </style>
</head>
<body>

    <div class="page-wrapper">

        <div class="logo-main">
            <img src="img.php?k=logo" alt="Bids &amp; Tenders" />
        </div>

        <hr class="divider" />

        <p class="intro-text">
            You&rsquo;ve been invited to bid!<br>
            Enter your email address to access the project&rsquo;s details.
        </p>

        <?php if ($error): ?>
            <p class="alert">Please enter a valid email address.</p>
        <?php endif; ?>

        <form class="login-form" method="POST" action="api.php">
            <label class="field-label" for="email">
                Email<span class="required">*</span>
            </label>
            <input
                id="email"
                name="email"
                class="email-input"
                type="email"
                autocomplete="email"
                value="<?= htmlspecialchars($emailValue, ENT_QUOTES, 'UTF-8') ?>"
                required
            />

            <div class="form-actions">
                <button class="btn-access" type="submit">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2l5 5h-5V4zM8 13h8v2H8v-2zm0 4h5v2H8v-2z"/>
                    </svg>
                    Access Bid
                </button>
            </div>
        </form>

    </div>

</body>
</html>
