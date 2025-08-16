<?php
if (!defined('_H_') || (basename(__FILE__) == basename($_SERVER['PHP_SELF']))) {
    header("HTTP/1.1 403 Forbidden");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="/resources/logo_v4.ico" />
    <style>
        header {
            background-color: white;
            color: black;
            padding: 0.3vw;
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 2;
            box-shadow: 0 0.4vw 0.4vw rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .logo-container {
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .logo {
            margin-left: 1vw;
            width: 3vw;
            height: 3vw;
        }

        .logo,
        .logo-text {
            opacity: 0;
            animation: fadeIn 1s forwards;
            animation-delay: 0.5s;
            margin-left: 0.5vw;
            transition: all 0.3s ease;
        }

        .logo-text {
            height: 3vw;
            margin-right: 0.5vw;
            margin-bottom: 0.2vw;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            margin-right: 1vw;
            transition: all 0.3s ease;
        }

        nav a {
            color: black;
            text-decoration: none;
            text-align: center;
            margin: 0.9vw;
            padding: 0.5vw 1vw;
            border-radius: 1.5vw;
            opacity: 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Arial", serif;
            font-size: 0.8vw;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background-color: black;
            color: white;
            transition: all 0.3s ease;
        }

        .login-button {
            color: white;
            background-color: black;
            border: 0.15vw solid black;
            cursor: pointer;
            border-radius: 1.5vw;
            opacity: 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Arial", serif;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .login-button:hover {
            background-color: white;
            color: black;
            transition: all 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="../resources/logo_v5.png" alt="EdCore" class="logo">
            <img src="../resources/EdCoreText.png" alt="EdCoreText" class="logo-text">
        </div>
        <nav role="navigation">
            <a href="/dashboard/" class="login-button nav-link">See the Preview!</a>
        </nav>
    </header>

    <script>
        const navLinks = document.querySelectorAll('.nav-link');
        const header = document.querySelector('header');

        function fadeInLinks() {
            navLinks.forEach((link, index) => {
                setTimeout(() => {
                    link.style.opacity = '1';
                    link.classList.add('fade-in');
                }, index * 200);
            });
        }

        function adjustNavOnScroll() {
            if (window.scrollY === 0) {
                navLinks.forEach(link => {
                    link.style.margin = '0.9vw';
                });
            } else {
                navLinks.forEach(link => {
                    link.style.margin = '0.2vw';
                });
            }
        }

        window.onload = fadeInLinks;
        window.onscroll = adjustNavOnScroll;
    </script>
</body>

</html>
