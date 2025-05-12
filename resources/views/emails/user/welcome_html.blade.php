<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            margin: 0;
            padding: 0;
            background-color: #edf2f7;
            color: #718096;
            line-height: 1.4;
        }
        .container {
            width: 100%;
            max-width: 570px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e8e5ef;
            box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
        }
        .header {
            text-align: center;
            padding: 25px 0;
        }
        .header img {
            height: 50px;
        }
        .content h1 {
            color: #3d4852;
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            text-align: left;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5em;
            margin-top: 0;
            text-align: left;
        }
        .button-container {
            text-align: center;
            margin: 30px auto;
        }
        .button {
            background-color: #CC0000;
            border: none;
            color: white;
            padding: 10px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 4px;
        }
        .footer {
            text-align: center;
            padding: 25px 0;
            font-size: 12px;
            color: #b0adc5;
        }
        a {
            color: #CC0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="{{ config('app.url') }}">
                <img src="https://jumpstarters.be/wp-content/uploads/2023/03/SyntraPXL-Logo-Digitaal-RGB.png" alt="SyntraPXL Logo">
            </a>
        </div>
        <div class="content">
            <h1>Welcome to Our Application, {{ $userName }}!</h1>
            <p>We are thrilled to have you on board.</p>
            <p>We've attached a small welcome guide to help you get started.</p>
            <div class="button-container">
                <a href="{{ route('login') }}" class="button">Get Started</a>
            </div>
            <p>Thanks,<br>{{ config('app.name') }}</p>
        </div>
        <div class="footer">
            © 2025 Syntrapxl. All rights reserved.
        </div>
    </div>
</body>
</html>