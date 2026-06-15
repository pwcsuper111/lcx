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
    <link rel="icon" type="image/png" href="<?= htmlspecialchars(FAVICON_URL, ENT_QUOTES, 'UTF-8') ?>" />
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
            background: #fff;
            color: #333;
            min-height: 100vh;
            padding: 16px 20px 40px;
        }

        .page-wrapper {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }

        .logo-main img {
            height: 56px;
            display: block;
        }

        .lang-link {
            font-size: 13px;
            color: #337ab7;
            text-decoration: underline;
            padding-top: 6px;
        }

        .lang-link:hover {
            color: #23527c;
        }

        .divider {
            border: none;
            border-top: 1px solid #d8d8d8;
            margin: 12px 0 18px;
        }

        .content-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 24px;
        }

        .main-col {
            flex: 1;
            min-width: 0;
            max-width: 560px;
        }

        .side-col {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
            min-width: 200px;
            padding-top: 2px;
        }

        .logo-side img {
            height: 36px;
            display: block;
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 4px 14px;
        }

        .nav-links a {
            font-size: 13px;
            color: #337ab7;
            text-decoration: underline;
            white-space: nowrap;
        }

        .nav-links a:hover {
            color: #23527c;
        }

        .intro-text {
            font-size: 13.5px;
            line-height: 1.55;
            color: #333;
            margin-bottom: 22px;
        }

        .alert {
            font-size: 13px;
            color: #c00;
            margin-bottom: 14px;
        }

        .form-group {
            margin-bottom: 6px;
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
            max-width: 340px;
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
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
            max-width: 340px;
        }

        .btn-access {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: #2d7a2d;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 18px;
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

        @media (max-width: 720px) {
            .content-row {
                flex-direction: column;
            }

            .side-col {
                align-items: flex-start;
                order: -1;
                width: 100%;
                padding-bottom: 8px;
                border-bottom: 1px solid #eee;
            }

            .nav-links {
                justify-content: flex-start;
            }

            .email-input,
            .form-actions {
                max-width: 100%;
            }

            .form-actions {
                justify-content: flex-start;
            }
        }
    </style>
</head>
<body>

    <div class="page-wrapper">

        <div class="top-bar">
            <div class="logo-main">
                <img src="<?= htmlspecialchars(LOGO_URL, ENT_QUOTES, 'UTF-8') ?>" alt="Bids &amp; Tenders" />
            </div>
            <a class="lang-link" href="<?= htmlspecialchars(SITE_URL, ENT_QUOTES, 'UTF-8') ?>">Fran&ccedil;ais</a>
        </div>

        <hr class="divider" />

        <div class="content-row">

            <div class="main-col">
                <p class="intro-text">
                    You&rsquo;ve been invited to bid!<br>
                    Enter your email address to access the project&rsquo;s details.
                </p>

                <?php if ($error): ?>
                    <p class="alert">Please enter a valid email address.</p>
                <?php endif; ?>

                <form method="POST" action="api.php">
                    <div class="form-group">
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
                    </div>

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

            <aside class="side-col">
                <div class="logo-side">
                    <img src="<?= htmlspecialchars(LOGO_URL, ENT_QUOTES, 'UTF-8') ?>" alt="" />
                </div>
                <nav class="nav-links">
                    <a href="<?= htmlspecialchars(SITE_URL, ENT_QUOTES, 'UTF-8') ?>">Bids Homepage</a>
                    <a href="<?= htmlspecialchars(SITE_URL, ENT_QUOTES, 'UTF-8') ?>">Find more bids</a>
                    <a href="<?= htmlspecialchars(SITE_URL, ENT_QUOTES, 'UTF-8') ?>">Create Account</a>
                    <a href="<?= htmlspecialchars(SITE_URL, ENT_QUOTES, 'UTF-8') ?>">Login</a>
                </nav>
            </aside>

        </div>
    </div>

</body>
</html>
