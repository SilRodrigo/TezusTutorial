var tag = document.createElement('script'),
    player;

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onYouTubeIframeAPIReady(videoId) {
    if (!document.querySelector("[yt-link]")?.getAttribute('yt-link') && !videoId) return;
    player = new YT.Player('player', {
        videoId: document.querySelector("[yt-link]").getAttribute('yt-link') || videoId
    });
}