<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EdCore - Unified Learning Experience</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Segoe UI', sans-serif; background: #fff; }

  .slideshow-container {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
  }

  .slides-wrapper {
    display: flex;
    width: 100%;
    height: 100%;
    transition: transform 0.6s ease-in-out;
  }

  .slide {
    flex: 1 0 100%;
    height: 100%;
    position: relative;
  }

  .slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease, filter 0.8s ease; 
  }

  .slide:hover img {
    transform: scale(1.08);
    filter: blur(3px);
  }

  /* Overlay for better text contrast */
  .slide::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
    z-index: 1;
  }

  /* Navigation buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    padding: 1vw 1.7vw;
    color: #ffca28;
    font-weight: bold;
    font-size: 24px;
    background: rgba(0,0,0,0.4);
    user-select: none;
    transform: translateY(-50%);
    transition: background 0.8s, opacity 0.8s ease, transform 0.8s ease, color 0.8s ease;
    border-radius: 8vw;
    z-index: 1;
    opacity: 0;
    pointer-events: none;
  }
  .prev { left: 10px; transform: translate(-10px, -50%); }
  .next { right: 10px; transform: translate(10px, -50%); }

  .prev:hover, .next:hover {
    background: rgba(0,0,0,0.7);
    color: #1976d2;
  }

  /* Show on hover with animation */
  .slideshow-container:hover .prev,
  .slideshow-container:hover .next {
    opacity: 1;
    transform: translateY(-50%);
    pointer-events: auto;
  }

  /* Dots */
  .dots {
    position: absolute;
    bottom: 15px;
    width: 100%;
    text-align: center;
    opacity: 0;
    transform: translateY(10px);
    transition: opacity 0.8s ease, transform 0.8s ease;
    pointer-events: none;
    z-index: 1;
  }
  .slideshow-container:hover .dots {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
  }
  .dot {
    cursor: pointer;
    background-color: #ffca28;
    height: 14px;
    width: 14px;
    margin: 0 5px;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.8s;
  }
  .active {
    background-color: #1976d2;
  }

  .dot:hover {
    background-color: #ffa000;
  }

  /* Slide text */
  .slide-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    z-index: 2;
    max-width: 80%;
    padding: 20px;
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }

  .slide-text h1 {
    font-size: 4vw;
    margin-bottom: 1vh;
    text-shadow: 0 4px 20px rgba(0,0,0,0.7);
    font-weight: 600;
  }

  .slide-text p {
    font-size: 1.5vw;
    text-shadow: 0 2px 15px rgba(0,0,0,0.6);
    font-weight: 300;
  }

  .slide.active .slide-text {
    opacity: 1;
  }

  .slide-text a.cta {
    position: relative;
    display: inline-block;
    background: linear-gradient(135deg, #ff7b00, #ffd000cf, #ff0000c8); 
    background-size: 300% 300%;
    padding: 1vw;
    top: 1.8vw;
    font-weight: bold;
    border-radius: 1vw;
    text-decoration: none;
    color: #fff;
    cursor: pointer;
    overflow: hidden;
    transition: background 0.3s ease, transform 0.3s ease;
  }

  .slide-text a.cta::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(25deg) translate(-100%, -100%);
    transition: transform 0.5s ease;
    pointer-events: none;
  }

  .slide-text a.cta:hover {
    transform: translateY(-2px);
    animation: holographicShift 3s ease infinite;
  }

  @keyframes holographicShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

  .disable-hover .slide img {
    pointer-events: none; /* Temporarily prevent hover effects */
    transform: none !important; /* Reset any ongoing transform */
    filter: none !important;    /* Reset any ongoing filter */
  }
  
</style>
</head>
<body>

<div class="slideshow-container">

  <div class="slides-wrapper" id="slidesWrapper">
    <div class="slide">
      <img src="/resources/internal/slide1.jpg" alt="Slide 1" loading="lazy" >
      <div class="slide-text">
        <h1>The Future of Campus Management</h1>
        <p>Your unified learning and campus management platform</p>
        <a href="register.php" class="cta">Get Started Now</a>
      </div>
    </div>
    <div class="slide">
      <img src="/resources/internal/slide2.jpg" alt="Slide 2" loading="lazy" >
      <div class="slide-text">
        <h1>Seamless Access</h1>
        <p>All your academic tools in one place — anytime, anywhere</p>
        <a class="cta">Learn More</a>
      </div>
    </div>
    <div class="slide">
      <img src="/resources/internal/slide3.jpg" alt="Slide 3" loading="lazy" >
      <div class="slide-text">
        <h1>Empowering Students & Faculty</h1>
        <p>Collaborate, learn, and succeed with EdCore</p>
        <a class="cta">Join Us Today</a>
      </div>
    </div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <div class="dots">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>
</div>

<script>
let slideIndex = 1;
const slidesWrapper = document.getElementById("slidesWrapper");
const dots = document.getElementsByClassName("dot");
const slideshowContainer = document.querySelector(".slideshow-container");

let slideInterval = setInterval(nextSlide, 8000); // 8 seconds
let hoverTimeout;

function updateSlides() {
  // Disable hover during transition
  slideshowContainer.classList.add("disable-hover");
  clearTimeout(hoverTimeout);
  hoverTimeout = setTimeout(() => {
    slideshowContainer.classList.remove("disable-hover");
  }, 1000); // 1-second delay

  slidesWrapper.style.transform = `translateX(-${(slideIndex - 1) * 100}%)`;

  const allSlides = document.querySelectorAll('.slide');
  allSlides.forEach(slide => slide.classList.remove('active'));
  for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  allSlides[slideIndex - 1].classList.add('active');
  dots[slideIndex - 1].classList.add("active");
}

function plusSlides(n) {
  slideIndex += n;
  if (slideIndex > dots.length) slideIndex = 1;
  if (slideIndex < 1) slideIndex = dots.length;
  updateSlides();
}

function currentSlide(n) {
  slideIndex = n;
  updateSlides();
}

function nextSlide() {
  plusSlides(1);
}

slideshowContainer.addEventListener("mouseenter", () => {
  clearInterval(slideInterval);
});
slideshowContainer.addEventListener("mouseleave", () => {
  slideInterval = setInterval(nextSlide, 8000);
});

updateSlides();
</script>

</body>
</html>
