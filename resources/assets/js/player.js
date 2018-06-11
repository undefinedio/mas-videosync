var videos = document.querySelectorAll('video');
var behavior = document.querySelector('#behavior');

if (location.search === '?enabled=false') {
    behavior.innerHTML = '(module disabled everywhere via <code>?enabled=false</code>';
} else if (location.search === '?enabled=true') {
    enableVideos(true);
    behavior.innerHTML = '(module enabled everywhere (whether it’s necessary or not) via <code>?enabled=true</code>)';
} else {
    enableVideos();
}

function enableButtons(video) {
    var playBtn = video.parentNode.querySelector('.play');
    var fullscreenButton = video.parentNode.querySelector('.fullscreen');

    if (playBtn) {
        playBtn.addEventListener('click', function () {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        });
    }

    if (fullscreenButton) {
        fullscreenButton.addEventListener('click', function () {
            var elem = document.getElementById("myvideo");
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen();
            }
        });
    }
}

// debug events
function debugEvents(video) {
    [
        'loadstart',
        'progress',
        'suspend',
        'abort',
        'error',
        'emptied',
        'stalled',
        'loadedmetadata',
        'loadeddata',
        'canplay',
        'canplaythrough',
        'playing', // fake event
        'waiting',
        'seeking',
        'seeked',
        'ended',
        // 'durationchange',
        'timeupdate',
        'play', // fake event
        'pause', // fake event
        // 'ratechange',
        // 'resize',
        // 'volumechange',
        'webkitbeginfullscreen',
        'webkitendfullscreen',
    ].forEach(function (event) {
        video.addEventListener(event, function () {
            console.info('@', event);
        });
    });
}

function timer(video) {
    setInterval(function () {
        var timestamp = new Date();
        var min = timestamp.getMinutes();
        var sec = timestamp.getSeconds();
        //remove 10n1 from minutes and convert to seconds
        min = min.toString().split('').pop() * 60;

        // calculate where the video should be in secconds
        var total = min + sec;

        // set sync on exacly the right miliseonds
        video.currentTime = total;

        window.$('.timer').html(total);

    }, 2000);
}

function enableVideos(everywhere) {
    for (var i = 0; i < videos.length; i++) {
        window.enableInlineVideo(videos[i], {everywhere: everywhere});
        enableButtons(videos[i]);
        timer(videos[i]);
    }
}
