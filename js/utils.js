export default class Utils {
    constructor() { }

    static copyToClipBoard(url) {
        window.navigator.clipboard.writeText(url);
        Utils.showAlert('Copiado!');
    }

    static showAlert(text, duration, colorClass) {
        alertBox.querySelector('.alert').innerHTML = text;
        alertBox.classList.add('show', colorClass || 'alert-success');
        setTimeout(() => alertBox.classList.remove('show'), duration || 2000);
    }

    static findSpecificOnPath(path, value) {
        if (!path && !path[0]) return;
        let response;
        path.find(item => response = item.querySelector(value));
        return response;
    }

    static fancyTimeFormat(duration) {
        // Hours, minutes and seconds
        var hrs = ~~(duration / 3600);
        var mins = ~~((duration % 3600) / 60);
        var secs = ~~duration % 60;

        // Output like "1:01" or "4:03:59" or "123:03:59"
        var ret = "";

        if (hrs > 0) {
            ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
        }

        ret += "" + mins + ":" + (secs < 10 ? "0" : "");
        ret += "" + secs;
        return ret;
    }
}