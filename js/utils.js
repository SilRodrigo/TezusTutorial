export default class Utils {
    constructor() { }

    static copyToClipBoard(url) {
        window.navigator.clipboard.writeText(url);
        Utils.showAlert('Copiado!');
    }

    static showAlert(text) {
        alertBox.querySelector('.alert').innerHTML = text;
        alertBox.classList.add('show');
        setTimeout(() => alertBox.classList.remove('show'), 2000);
    }

    static findSpecificOnPath(path, value) {
        if (!path && !path[0]) return;
        let response;
        path.find(item => response = item.querySelector(value));
        return response;
    }
}