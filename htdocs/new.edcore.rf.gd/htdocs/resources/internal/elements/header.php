<!DOCTYPE html>
<html lang="en">
<head>
  <style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  color: #333;
  background: #f9f9f9;  
  transition: background 0.3s, color 0.3s;
}

body.dark-mode {
  background: #121212;
  color: #f9f9f9;
}

header {
  background: #ffffff;
  padding: 2vw 3.5vw 1.5vw 3.5vw;
  width: 100%;
  z-index: 2;
  position: relative;
  box-shadow: none;
  transition: box-shadow 0.5s ease, background 0.3s;
}

body.dark-mode header {
  background: #1f1f1f;
}

header.fixed {
  position: fixed;
  top: 0;
  left: 0;
  box-shadow: 0 0.3vw 1vw rgba(0, 0, 0, 0.3);
  padding: 0.5vw 3.5vw 0vw 3.5vw;
  animation: slideDown 0.5s ease forwards;
}

@keyframes slideDown {
  from { transform: translateY(-100%); }
  to { transform: translateY(0); }
}

.navbar {
  display: flex;
  align-items: center;
}

.logo-section img {
  width: 15vw;
  margin-right: 1.8vw;
}

.nav-links {
  margin-right: 1.8vw;
}

.nav-buttons {
  right: 3.5vw;
  position: absolute;
}

.nav-links, .nav-buttons {
  list-style: none;
  display: flex;
  gap: 1.8vw;
  align-items: center;
}

.nav-links li a, .nav-buttons li a {
  display: inline-block;
  text-decoration: none;
  font-weight: bold;
  font-size: 1.2vw;
  padding: 0.7vw 1vw;
  border-radius: 0.5vw; 
  transition: background 0.3s, color 0.3s;
}

.btn-normal {
  color: #000000;
  text-decoration: none;
  position: relative;
}

body.dark-mode .btn-normal {
  color: #fff;
}

.btn-normal::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -0.1vw;
  width: 100%;
  height: 0.2vw;
  background: currentColor;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.3s ease;
}

.btn-normal:hover::after {
  transform: scaleX(1);
  transform-origin: left;
}

.btn-login {
  position: relative;
  color: #016fff;
  background-color: #ffd000;
  text-decoration: none;
  overflow: hidden;
  z-index: 0;
}

.btn-login::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -0.1vw;
  width: 100%;
  height: 0.6vw;
  background: currentColor;
  transform: scaleX(0);
  transform-origin: right;
  transition: transform 0.3s ease;
  z-index: 2;
}

.btn-login::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 100%;
  background: currentColor;
  transform: translateY(100%);
  transition: transform 0.4s ease;
  z-index: 1;
}

.btn-login:hover::after {
  transform: scaleX(1);
  transform-origin: left;
}

.btn-login:hover::before {
  transition-delay: 0.3s;
  transform: translateY(0);
}

.btn-login > span {
  position: relative;
  z-index: 3;
}

.btn-login span {
  color: #000000;
}

.btn-apply {
  position: relative;
  display: inline-block;
  background: linear-gradient(135deg, #ff7b00, #ffd000, #ff0000);
  background-size: 300% 300%;
  color: #fff;
  cursor: pointer;
  overflow: hidden;
  transition: background 0.3s ease, transform 0.3s ease;
}

.btn-apply::before {
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

.btn-apply:hover {
  animation: holographicShift 3s ease infinite;
}

@keyframes holographicShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.btn-large {
  padding: 1vw 1.8vw;
  font-size: 1vw;
}

/* Toggle Switch */
.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 25px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0; left: 0;
  right: 0; bottom: 0;
  background-color: #ffd000;
  transition: 0.4s;
  border-radius: 34px;
  overflow: hidden;
}

.slider:before {
  position: absolute;
  content: "";
  height: 19px;
  width: 19px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  transition: 0.5s;
  border-radius: 50%;
}

input:checked + .slider {
  background-color: #ff7b00;
}

input:checked + .slider:before {
  transform: translateX(25px);
}
  </style>
</head>
<body>

<script>
window.addEventListener('scroll', () => {
  const header = document.querySelector('header');
  const body = document.querySelector('body');
  if (window.scrollY > 100) {
    header.classList.add('fixed');
    body.style.padding = "8vw 0 0 0 ";
  } else {
    header.classList.remove('fixed');
    body.style.padding = "0";
  }
});

document.addEventListener('DOMContentLoaded', () => {
  const btnLiquid = document.querySelector('.btn-login');
  if (!btnLiquid) return;
  const span = btnLiquid.querySelector('span');

  let timeoutId;

  btnLiquid.addEventListener('mouseenter', () => {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => {
      span.style.color = '#fff';
    }, 350);
  });

  btnLiquid.addEventListener('mouseleave', () => {
    clearTimeout(timeoutId);
    span.style.color = '#000';
  });

  const toggle = document.getElementById('darkModeToggle');
  toggle.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode');
  });
});
</script>

<header>
  <nav class="navbar">
    <div class="logo-section"><img id="logo" src="/resources/internal/EdCore.png" alt="EdCore Logo"></div>

    <ul class="nav-links">
      <li><a href="#about" class="btn-normal">About</a></li>
      <li><a href="#features" class="btn-normal">Features</a></li>
      <li><a href="#pricing" class="btn-normal">Pricing</a></li>
      <li><a href="#docs" class="btn-normal">Documentation</a></li>
      <li><a href="#updates" class="btn-normal">Updates</a></li>
    </ul>

    <div class="nav-buttons">
      <li><button class="search-btn">Search</button></li>
      <li>
        <!-- Dark/Light toggle switch -->
        <label class="switch">
          <input type="checkbox" id="darkModeToggle">
          <span class="slider"></span>
        </label>
      </li>
      <li><a href="login.php" class="btn-login"><span>Login</span></a></li>
      <li><a href="register.php" class="btn-apply">Apply Now</a></li>
    </div>
  </nav>
</header>

</body>
</html>
