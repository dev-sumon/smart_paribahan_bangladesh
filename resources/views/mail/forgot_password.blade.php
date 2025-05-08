<!DOCTYPE html>
<html>
<head>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3490dc;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello, {{ ucfirst($role) }}!</h2>
        <p>You requested to reset your password. Here’s your OTP:</p>
        <h1>{{ $otp }}</h1>
        <p>Please use this OTP within the next 10 minutes to reset your password.</p>
        <p>Thanks,<br>The Support Team</p>
    </div>
</body>
</html>
