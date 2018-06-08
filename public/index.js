var videos = document.querySelectorAll('video');
var behavior = document.querySelector('#behavior');
var hidden = document.querySelector('.js-hidden');
var loading = document.querySelector('.js-loading');
var loaded = document.querySelector('.js-loaded');
var averageOffset = 0;

function enableButtons(video) {
    synchronize(video);

    setInterval(function () {
        synchronize(video);
    }, 10 * 1000);
}

function synchronize(video) {
    var timestamp = new Date();
    var min = timestamp.getMinutes();
    var sec = timestamp.getSeconds();
    var mili = timestamp.getMilliseconds();

    //remove 10n1 from minutes and convert to seconds
    min = min.toString().split('').pop() * 60;

    // calculate where the video should be in secconds
    var total = min + sec + (mili / 1000) - averageOffset;

    var dif = video.currentTime - total;
    if (dif < -0.3 || dif > 0.3) {
        video.currentTime = total;
    }
}

function enableVideos() {
    for (var i = 0; i < videos.length; i++) {
        enableButtons(videos[i]);
    }
}

$(document).ready(function () {
    var offsets = [];
    var counter = 0;
    var maxTimes = 50;
    var beforeTime = null;

    // get average
    var mean = function (array) {
        var sum = 0;

        array.forEach(function (value) {
            sum += value;
        });

        return sum / array.length;
    };

    var getTimeDiff = function () {
        beforeTime = Date.now();
        $.ajax(BASEURL + '/api/time', {
            type: 'GET',
            success: function (response) {
                var now, timeDiff, serverTime, offset;
                counter++;

                // Get offset
                now = Date.now();
                timeDiff = (now - beforeTime) / 2;
                serverTime = response.time - timeDiff;
                offset = now - serverTime;

                // Push to array
                offsets.push(offset);
                if (counter < maxTimes) {
                    loaded.innerHTML = counter * 2;
                    // Repeat
                    getTimeDiff();
                } else {
                    //synchronization complete
                    averageOffset = mean(offsets) / 1000;

                    hidden.className = hidden.className.replace(/\bhidden\b/g, "");
                    loading.className += " " + 'hidden';
                    enableVideos();
                }
            }
        });
    };

    setInterval(function () {
        getTimeDiff();
    }, 2000);
});