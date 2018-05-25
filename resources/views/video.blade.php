<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Video</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <meta name="apple-mobile-web-app-capable" content="yes">

</head>
<body>
<button class="fullscreen">FULLSCREEN</button>

<video autoplay muted loop playsinline
       src="/videos/<?= $video; ?>.mp4"></video>

<script src="/jquery.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="/iphone-inline-video.js"></script>
<script src="/index.js"></script>
</body>
</html>