<?php
if (!defined('_WS_') || (basename(__FILE__) == basename($_SERVER['PHP_SELF']))) {
    header("HTTP/1.1 403 Forbidden");
    exit();
}
?>
<style>
    .slideshow-container {
        border: 0.5vw solid white; /* Added border */
        position: relative;
        width: auto; 
        margin: auto;
        overflow: hidden;
        background-color: #f2f0f0;
        border-radius: 1vw; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        animation: fadeInContainer 1s ease-in-out;
        transition: all 0.3s ease;
        margin-bottom: 1vw;
    }

    @keyframes fadeInContainer {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    .slideshow-slide {
        display: none;
        opacity: 0;
        animation: fadeOut 2s ease-in-out;
    }

    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }

    .slideshow-slide.active-slide {
        display: block;
        opacity: 1;
        animation: fadeInOut 2s ease-in-out;
    }

    @keyframes fadeInOut {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    img {
        width: 100%;
        height: auto;
        display: block;
        transition: all 0.3s ease;
    }

    .slideshow-prev, .slideshow-next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: 3vw;
        height: 3vw; 
        margin-top: -1.5vw;
        color: white;
        font-size: 1vw;
        background-color: rgba(0, 0, 0, 0.5); 
        border: none;
        border-radius: 50%;
        user-select: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .slideshow-prev { left: 1vw; }
    .slideshow-next { right: 1vw; }

    .slideshow-prev:hover, .slideshow-next:hover {
        background-color: rgba(0, 0, 0, 0.8); 
    }

    .slideshow-controls {
        text-align: center;
        position: absolute;
        bottom: 2vw;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .control-dot {
        cursor: pointer;
        height: 0.8vw;
        width: 0.8vw;
        margin: 0 0.3vw;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .control-dot.active-dot, .control-dot:hover {
        background-color: #717171;
    }

    .play-pause-button {
        padding: 0.5vw;
        cursor: pointer;
        color: white;
        font-size: 1.5vw;
        margin-left: 1vw;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .play-pause-button:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>


<div class="slideshow-container">
    <div class="slideshow-slide active-slide">
        <img src="../resources/EdCoreSupport.jpg">
    </div>
    <div class="slideshow-slide">
        <img src="../resources/BackToSchoolBanner.jpg">
    </div>
    <div class="slideshow-slide">
        <img src="../resources/NewGenBanner.jpg">
    </div>

    <a class="slideshow-prev" onclick="changeSlideshow(-1)">&#10094;</a>
    <a class="slideshow-next" onclick="changeSlideshow(1)">&#10095;</a>

    <div class="slideshow-controls">
        <div class="controls-dots">
            <span class="control-dot" onclick="setSlideshow(1)"></span> 
            <span class="control-dot" onclick="setSlideshow(2)"></span> 
            <span class="control-dot" onclick="setSlideshow(3)"></span>
        </div>

        <div class="play-pause-button" onclick="toggleSlideshowPlayPause()">
            <span id="playPauseText">⏸️</span>
        </div>
    </div>
</div>

<script>
    let currentSlideIndex = 0;
    let slideshowInterval;
    let slideshowIsPlaying = true;
    const slideshowSlides = document.querySelectorAll(".slideshow-slide");
    const slideshowDots = document.querySelectorAll(".control-dot");

    function updateSlideshow() {
        slideshowSlides.forEach((slide, i) => {
            slide.classList.remove("active-slide");
            slideshowDots[i].classList.remove("active-dot");
        });
        slideshowSlides[currentSlideIndex].classList.add("active-slide");
        slideshowDots[currentSlideIndex].classList.add("active-dot");
    }

    function showSlideshowSlides() {
        currentSlideIndex = (currentSlideIndex + 1) % slideshowSlides.length;
        updateSlideshow();
    }

    function changeSlideshow(n) {
        clearInterval(slideshowInterval);
        currentSlideIndex = (currentSlideIndex + n + slideshowSlides.length) % slideshowSlides.length;
        updateSlideshow();
        if (slideshowIsPlaying) {
            slideshowInterval = setInterval(showSlideshowSlides, 8000);
        }
    }

    function setSlideshow(n) {
        clearInterval(slideshowInterval);
        currentSlideIndex = n - 1;
        updateSlideshow();
        if (slideshowIsPlaying) {
            slideshowInterval = setInterval(showSlideshowSlides, 8000);
        }
    }

    function toggleSlideshowPlayPause() {
        const playPauseText = document.getElementById("playPauseText");
        if (slideshowIsPlaying) {
            clearInterval(slideshowInterval);
            playPauseText.textContent = "▶️";
        } else {
            slideshowInterval = setInterval(showSlideshowSlides, 8000);
            playPauseText.textContent = "⏸️";
        }
        slideshowIsPlaying = !slideshowIsPlaying;
    }
    
    slideshowInterval = setInterval(showSlideshowSlides, 8000);
</script>
