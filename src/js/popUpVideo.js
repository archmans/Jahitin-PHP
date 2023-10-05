function closePopup(index) {
    var popup = document.getElementById("popup" + index);
    popup.style.display = "none";

    var video = document.getElementById("vid" + index);
    video.pause();
    video.currentTime = 0;
}