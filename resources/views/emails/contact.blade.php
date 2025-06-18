<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <p><strong>নাম:</strong> {{ $data['name'] }}</p>
    <p><strong>ইমেইল:</strong> {{ $data['email'] }}</p>
    <p><strong>ফোন:</strong> {{ $data['phone'] }}</p>
    <p><strong>বার্তা:</strong><br>{{ $data['message'] }}</p>

</body>

</html>
