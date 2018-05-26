<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Video</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

</head>
<body>
<style>
    .hidden {
        opacity: 0;
    }

    video {
        width: 100%;
        display: block;
        position: relative;
    }
</style>
<script>
    var BASEURL = '<?= URL::to('/'); ?>';
</script>

<div class="loading js-loading">
    Syncing video to server... <span class="js-loaded">0</span>%
</div>
<div class="hidden js-hidden">
    <video autoplay muted loop controls preload
           src="<?= URL::to('/'); ?>/videos/<?= $cluster; ?>/<?= $video; ?>.mp4"></video>
</div>

<script src="<?= URL::to('/'); ?>/jquery.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
<script src="<?= URL::to('/'); ?>/index.min.js"></script>
</body>
</html>