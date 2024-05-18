<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>درحال انتقال</title>
</head>
<body>
    <div style="text-align: center;padding: 20px;margin:20px 30px;">
        درحال انتقال به سایت پذیرنده ....
    </div>
    <script>
        @if(request()->get('Status') == 'NOK')
            window.location = "{{ 'http://satrapcctv.ir/callback?status=1' }}";
        @else
            window.location = "{{ 'http://satrapcctv.ir/callback?status=2' }}";
        @endif
        // window.location = url;

    </script>
</body>
</html>
