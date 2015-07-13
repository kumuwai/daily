<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Output</title>
</head>
<body>

    <ul>
        @foreach($data as $key=>$value)
            <li>{{$key}}: {!! $value !!}</li>
        @endforeach
    </ul>
    
</body>
</html>