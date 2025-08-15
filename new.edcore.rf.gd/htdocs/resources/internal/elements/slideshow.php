<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>HTML Slideshow</title>
  <style>
    * { box-sizing: border-box; }
    body { font-family: Arial, sans-serif; margin: 0; background: #111; }

    .slideshow-container {
      position: relative;
      max-width: 800px;
      margin: auto;
      overflow: hidden;
      border-radius: 10px;
    }

    .slide {
      display: none;
    }

    .slide img {
      width: 100%;
      vertical-align: middle;
    }

    /* Next & previous buttons */
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.3s;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
      background-color: rgba(0,0,0,0.8);
    }

    /* Dots */
    .dots {
      text-align: center;
      padding: 10px;
      background: #111;
    }

    .dot {
      cursor: pointer;
      height: 12px;
      width: 12px;
      margin: 0 4px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.3s;
    }

    .active, .dot:hover {
      background-color: #717171;
    }
  </style>
</head>
<body>

<div class="slideshow-container">

  <div class="slide fade">
    <img src="https://picsum.photos/id/1015/800/400" alt="Slide 1">
  </div>

  <div class="slide fade">
    <img src="https://picsum.photos/id/1016/800/400" alt="Slide 2">
  </div>

  <div class="slide fade">
    <img src="https://picsum.photos/id/1018/800/400" alt="Slide 3">
  </div>

  <!-- Navigation buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<!-- Dots -->
<div class="dots">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slide");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

// Auto slideshow
setInterval(() => {
  plusSlides(1);
}, 3000); // change slide every 3 seconds
</script>

</body>
</html>
