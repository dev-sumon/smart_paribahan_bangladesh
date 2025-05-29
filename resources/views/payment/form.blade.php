<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>পেমেন্ট ফর্ম</h2>
        <form action="{{ route('payment') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>পরিমাণ</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label>নাম</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>ইমেইল</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>ফোন নম্বর</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">পেমেন্ট করুন</button>
        </form>
    </div>
</body>

</html>
