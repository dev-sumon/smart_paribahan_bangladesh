<!DOCTYPE html>
<html>
<head>
    <title>QR Code Generator</title>
</head>
<body>
    <h2>QR Code Generator</h2>
    <form method="POST" action="{{ route('stand_manager.qr.generate') }}">
        @csrf
        <label for="url">Enter URL:</label>
        <input type="url" name="url" required>
        <button type="submit">Generate QR</button>
    </form>
</body>
</html>