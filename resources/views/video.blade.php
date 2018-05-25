<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Video</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= URL::to('/'); ?>/style.css">
    <meta name="apple-mobile-web-app-capable" content="yes">

</head>
<body>
<script>
    var BASEURL = '<?= URL::to('/'); ?>';
    console.log('test base');
</script>
<button class="fullscreen">FULLSCREEN</button>

<video autoplay muted loop playsinline
       src="<?= URL::to('/'); ?>/videos/<?= $video; ?>.mp4"></video>

<script src="<?= URL::to('/'); ?>/jquery.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="<?= URL::to('/'); ?>/iphone-inline-video.js"></script>
<script src="<?= URL::to('/'); ?>/index.js"></script>
</body>
</html>