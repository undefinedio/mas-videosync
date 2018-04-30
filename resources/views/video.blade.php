<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Video</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
<div class="flex-center position-ref full-height">
    <video id="player">
        <source src="/videos/<?= $video; ?>.mp4" type="video/mp4">
    </video>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
