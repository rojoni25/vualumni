<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <div style="background-color: #c44d2d; color:white; height:35px; width:100%; padding:10px; text-align:center; display:flex; align-items:center;">{{$title}}</div>
    <div style="margin:10px;">
        <div style="margin-bottom:10px;">Dear {{$user->name}},</div>
        {{$message}}
    </div>
    <div>
        Regards,
    </div>
    <div>
        <img src="{{ asset('aavu_logo_02.png') }}" style="width:80px; height:80px; object-fit:contain;" alt="AAVU">
    </div>
    <div>Varendra University Alumni Association</div>
</body>

</html>
