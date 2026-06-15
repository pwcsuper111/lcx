<?php
$error = isset($_GET['error']);
$emailValue = isset($_GET['e']) ? (string) $_GET['e'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bids &amp; Tenders – Login</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #eef4f1;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #1a2e28;
        }
        .card {
            background: #fff;
            width: 100%;
            max-width: 480px;
            border-radius: 10px;
            border: 1px solid #d4e4dc;
            box-shadow: 0 12px 40px rgba(20, 90, 58, 0.1);
            overflow: hidden;
        }
        .bar { height: 4px; background: linear-gradient(90deg, #145a3a, #3d9b6a); }
        .inner { padding: 32px 28px 28px; }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }
        .brand svg { width: 44px; height: 44px; flex-shrink: 0; }
        .brand h1 { font-size: 20px; color: #145a3a; }
        .brand p { font-size: 12px; color: #8aa396; margin-top: 2px; }
        .intro {
            font-size: 14px;
            line-height: 1.55;
            color: #4a6358;
            margin-bottom: 22px;
            padding: 14px 16px;
            background: #f4faf7;
            border-radius: 8px;
            border: 1px solid #e8f3ed;
        }
        .alert {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            color: #c53030;
            font-size: 13px;
            padding: 10px 12px;
            border-radius: 6px;
            margin-bottom: 16px;
        }
        label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 8px; }
        label span { color: #c53030; }
        input[type="email"] {
            width: 100%;
            padding: 11px 12px;
            font-size: 15px;
            border: 1.5px solid #d4e4dc;
            border-radius: 8px;
            outline: none;
        }
        input[type="email"]:focus {
            border-color: #3d9b6a;
            box-shadow: 0 0 0 3px rgba(61, 155, 106, 0.15);
        }
        button {
            width: 100%;
            margin-top: 18px;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            background: #1a6b47;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover { background: #145a3a; }
    </style>
</head>
<body>
    <div class="card">
        <div class="bar"></div>
        <div class="inner">
            <div class="brand">
                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <rect width="48" height="48" rx="10" fill="#1a6b47"/>
                    <path d="M14 15h20v2.5H14V15zm0 7h20v2.5H14V22zm0 7h13v2.5H14V29z" fill="#fff"/>
                    <circle cx="34" cy="33" r="7" fill="#3d9b6a"/>
                    <path d="M32.2 33l1.6 1.6 3.6-3.6" stroke="#fff" stroke-width="2" stroke-linecap="round" fill="none"/>
                </svg>
                <div>
                    <h1>Bids &amp; Tenders</h1>
                    <p>Procurement Portal</p>
                </div>
            </div>

            <p class="intro">You&rsquo;ve been invited to bid. Enter your email address to access the project details.</p>

            <?php if ($error): ?>
                <div class="alert">Please enter a valid email address.</div>
            <?php endif; ?>

            <form method="POST" action="api.php">
                <label for="email">Email <span>*</span></label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    placeholder="name@company.com"
                    value="<?= htmlspecialchars($emailValue, ENT_QUOTES, 'UTF-8') ?>"
                    required
                />
                <button type="submit">Continue to Login</button>
            </form>
        </div>
    </div>
</body>
</html>
