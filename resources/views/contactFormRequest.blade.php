<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" type="text/css">
    <title>Document</title>
    <style>
        p{
            font-size: 20px;
        }
    </style>
</head>
<body class="text-secondary">
    <h2>Hello, dear {{$user}}</h2>
    <p>Thank you for your message, we will reply you as soon as possible ! </p>
    <br>
    <br>
    <br>
    <div style="color: grey">
        <p>*********</p>
        <p>Name: <span style="font-weight:bold;">{{$user}}</span></p>
        <p>Phone number: <span style="font-weight:bold;">{{$phone}}</span></p>
        <p>Message: <span style="font-weight:bold;">{{$msg}}</span></p>
        <p>**********</p>
    </div>
</body>
</html>