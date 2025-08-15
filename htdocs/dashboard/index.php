<?php 
define('_S_USR_S_', true);
session_start();

include($_SERVER['DOCUMENT_ROOT'].'/database/users.php'); 

/*
    if (!isset($_SESSION['user'])) {
        header('Location: /login/');
        exit();
    }
    */

define('_SBH_', true);
include($_SERVER['DOCUMENT_ROOT'].'/elements/sidebar_header.php'); 
?>

<html>
<head>
    <title>EdCore Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fef4ea;
            margin: 0;
            padding-top: 3vw;
        }

        .dashboard-container {
            margin: 30px; 
            margin-left: 6.8vw; 
            margin-right: 0.9vw;
        }

        .content-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 1vw; 
        }

        .sidepanel {
            width: 15vw;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            gap: 0.2vw;
        }

        .stats-overview {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 1vw;
            margin-bottom: 0.8vw;
        }

        .recent-activity, .quick-links {
            margin-bottom: 0.8vw;
        }

        .quick-links ul, .recent-activity ul {
            list-style-type: none;
            padding: 0;
        }

        .quick-links ul li, .recent-activity ul li {
            margin: 0.8vw;
            margin-left: 0.3vw;
        }

        .quick-links ul li a {
            text-decoration: none;
            color: #007bff;
        }

        .quick-links ul li a:hover {
            text-decoration: underline;
        }

        .section-nav {
            position: relative;
            top: 0;
            left: 0;
            background-color: #fef4ea;
            margin-left: 0;
            margin-top: -0.8vw;
            padding-top: 1vw;
            padding-right: 1vw;
            padding-left: -1.5vw;
            width: auto; 
            height: 3.2vw;
            text-align: left;
            transition: all 0.3s ease; 
        }

        .section-nav.fixed {
            position: fixed;
            top: 0;
            left: 0;
            padding: 1.8vw;
            margin-top: 3vw;
            margin-left: 4.5vw;
            background-color: white;
            width: 100%; 
            height: 4vw;
            z-index: 1; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease; 
        }

        .section-nav a {
            margin: 0 0.5vw;
            color: black;
            text-decoration: none;
            font-weight: bold;
            font-size: 1vw;
            padding: 0.7vw;
            background-color: #fef4ea;
            border-radius: 1vw;
            transition: all 0.3s ease; 
        }

        .section-nav.fixed a {
            background-color: white;
        }

        .section-nav.fixed a:hover {
            background-color: #fafafa;
            color: black;
        }

        .section-nav a:hover {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: black;
        }

        .section-nav a.active {
            background-color: #fbfbfb;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: black;
        }

        .section-nav a.active:hover {
            background-color: white;
            box-shadow: none;
            color: black;
        }

        .section-nav.fixed a:hover {
            background-color: #dadada;
            box-shadow: none;
            color: black;
        }

        .section-nav.fixed a.active {
            background-color: #ededed;
            box-shadow: none;
            color: black;
        }
        
        .section-nav.fixed a.active:hover {
            background-color: #dadada;
            box-shadow: none;
            color: black;
        }

        .clock {
            position: relative;
            font-family: Arial, sans-serif;
            height: auto;
            padding: 0.5vw;
            padding-left: 1vw;
            padding-right: 1vw;
            margin-right: -0.8vw;
            margin-top: -0.6vw;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 1vw;
            transition: all 0.3s ease;
            text-align: center;
            float: right;
            font-size: 1vw;
            font-weight: bold;
            color: black;
            background-color: white;
            border-radius: 1vw;
        }

        .clock .ampm {
            font-size: 0.5vw;
        }

        .section-nav.fixed .clock {
            background-color: white;
            margin-right: 5vw;
            color: black;
        }

    </style>
</head>
<body>
    <div class="dashboard-container">
    <div class="section-nav" id="section-nav">
        <a href="#dashboard-section" class="active">Dashboard</a>
        <a href="#modules-section">Courses</a>
        <a href="#news-section">News</a>
        <a href="#mindcheck-section">Mindcheck</a>
        <div id="clock" class="clock"></div>
    </div>
    <section id="dashboard">
        <div class="content-container">
            <div class="main-section" id="dashboard-section">
                <?php 
                    define('_WS_', true);
                    include('../elements/welcome-slideshow.php'); 
                ?>
                
                <?php 
                    define('_CS_', true);
                    include('../elements/courses.php'); 
                ?>
            </div>

            <div class="sidepanel">
                <?php
                    define('_CW_', true);
                    include('../elements/calendar-widget.php');
                ?>

                <?php
                    define('_AW_', true);
                    include('../elements/assignments-widget.php');
                ?>

                <?php
                    define('_OW_', true);
                    include('../elements/online-widget.php');
                ?>
            </div>
        </div>
    </section>
    <script>
    let isScrolling;

    function handleScroll() {
        const nav = document.getElementById('section-nav');
        const clock = document.getElementById('clock');

        if (window.scrollY > 100) {
            nav.classList.add('fixed');
        } else {
            nav.classList.remove('fixed');
        }
    }

    function updateClock() {
        const clock = document.getElementById('clock');
        const now = new Date();

        let hours = now.getHours();
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12; 
        hours = hours ? String(hours).padStart(2, '0') : '12';

        clock.innerHTML = `${hours}:${minutes}:${seconds} <span class="ampm">${ampm}</span>`;
    }

    window.addEventListener('scroll', handleScroll);
    setInterval(updateClock, 1000); // Update clock every second
    updateClock(); // Initial call to display the clock immediately

    // Simulated function for course card creation (adjust this as needed)
    
    createCourseCard('Gen. Mathematics', 'https://i.pinimg.com/236x/cf/f2/ff/cff2ff3175c8e4878084b1a3b236a3bd.jpg', 10, 'https://edcore.rf.gd/course/11291986');
    createCourseCard('Com. Programming', 'https://www.finoit.com/wp-content/uploads/2022/09/clean-code-java-principles.jpg', 20, 'https://edcore.rf.gd/course/11394238');
    createCourseCard('Web Programming', 'https://images.shiksha.com/mediadata/ugcDocuments/images/wordpressImages/2021_12_Programming-vs-Web-Development.jpg', 30, 'https://edcore.rf.gd/course/11455654');
    createCourseCard('21st Century Literature', 'https://comkyrieervin.home.blog/wp-content/uploads/2019/08/literature1blog.jpg?w=1024', 40, 'https://edcore.rf.gd/course/11596564');
    createCourseCard('Media & Information Literacy', 'https://i0.wp.com/www.niallmcnulty.com/wp-content/uploads/2023/12/media_literacy.png?ssl=1', 50, 'https://edcore.rf.gd/course/11044973');
    createCourseCard('Oral Communication', 'https://static.vecteezy.com/system/resources/previews/021/392/823/original/verbal-or-oral-communication-skill-storytelling-or-explanation-public-speaking-talking-or-discussion-telling-message-or-speech-concept-confidence-businessman-talking-with-multiple-speech-bubbles-vector.jpg', 60, 'https://edcore.rf.gd/course/11032890/');
    createCourseCard('Physical Education and Health', 'https://nunavik-ice.com/wp-content/uploads/2000/06/PE_EN_Cover.jpg', 70, 'https://edcore.rf.gd/course/11932474');
</script>

</body>
</html>
