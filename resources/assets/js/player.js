class Player {
    constructor(el) {
        this.player = new plyr(el);

        // player settings
        this.player.muted = true;
        this.player.loop = true;
        this.player.autoplay = true;
        this.player.play();

        // check sync every second
        setInterval(() => {
            this.sync();
        }, 2000);
    }

    sync() {
        // get timestamp
        const timestamp = new Date();
        let min = timestamp.getMinutes();
        let sec = timestamp.getSeconds();
        //remove 10n1 from minutes and convert to seconds
        min = min.toString().split('').pop() * 60;

        // calculate where the video should be in secconds
        const total = min + sec;

        // set sync on exacly the right miliseonds
        setTimeout(() => {
            //set video to correct time
            player.currentTime = total;
        }, 1000 - timestamp.getMilliseconds());
    }
}

export default Player;