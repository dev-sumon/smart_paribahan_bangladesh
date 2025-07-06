<!DOCTYPE html>
<html>

<head>
    <title>QR Code Result</title>
</head>

<body>
    <h2>Generated QR Code for:</h2>
    {{-- <p>{{ $qrCode->url }}</p> --}}
    <div>
        {{ $qrCode }}
    </div>
    <br>
    {{-- <a href="{{ $downloadLink }}" download="qrcode.png">QR কোড ডাউনলোড করুন</a> --}}
    <br><br>
    <a href="{{ route('stand_manager.qr.form') }}">Go Back</a>
</body>

</html>
