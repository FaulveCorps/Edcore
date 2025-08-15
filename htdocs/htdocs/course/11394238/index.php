<?php 
    define('_SBH_', true);
    include($_SERVER['DOCUMENT_ROOT'].'/elements/sidebar_header.php'); 
?>
<html>
<head>
    <title>Computer Programming</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .banner {
            width: 100%;
            height: auto;
            margin: 0;
            padding: 0;
        }

        .section-nav {
            position: relative;
            top: 0;
            left: 0;
            background-color: white;
            margin-top: 1vw; 
            margin-bottom: 1vw;
            padding: 0;
            width: 100%; 
            text-align: left;
            transition: all 0.3s ease; 
        }

        .section-nav.fixed {
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            margin-top: 3.6vw;
            margin-left: 5.3vw;
            width: 100%; 
            height: 2vh;
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
            padding: 10px;
            background-color: white;
            border-radius: 8px;
            transition: all 0.3s ease; 
        }

        .section-nav a:hover {
            background-color: #dadada;
            color: black;
            border-radius: 8px;
        }

        .section-nav a.active {
            background-color: #dadada;
            color: black;
        }

        .main-container {
            margin-top: 3.7vw;
            margin-left: 6vw; 
            transition: margin-top 0.3s ease; 
        }

        section {
            padding: 20px;
        }

        section:nth-child(odd) {
            background-color: #f4f4f4;
        }

        section:nth-child(even) {
            background-color: #ddd;
        }

        .progress-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
        }

        .progress-item {
            text-align: center;
        }

        canvas {
            display: block;
            height: 10vw;
            width: 10vw;
            margin: auto;
            transition: all 1s ease-in-out; 
        }

        p {
            font-weight: bold;
        }

        .dropdown {
            display: none;
            margin-top: 0.3vw;
            margin-left: 0.5vw;
            padding-left: 0.8vw;
            border-left: 2px solid black;
            transition: all 0.1s ease-in-out; 
        }

        .dropdown a {
            display: block;
            padding: 5px 0;
            color: black;
            text-decoration: none;
        }

        .dropdown a:hover {
            font-weight: bold;
        }

        .toggle {
            cursor: pointer;
            transition: all 0.1s ease-in-out; 
        }

        .toggle:hover {
            font-weight: bold;
        }

        .lesson {
            margin-bottom: 0.5vw;
        }

        li {
            margin-left: 1vw;
            margin-top: 0.5vw;
            font-size: 0.8vw;
        }
    </style>
</head>
<body>
    <div class="main-container" id="main-container">
        <img src="/resources/ComProgBanner.jpg" alt="Banner Image" class="banner">
        <div class="section-nav" id="section-nav">
            <a href="#section1" class="active">Dashboard</a>
            <a href="#section2">Modules</a>
            <a href="#section4">Assignments</a>
            <a href="#section3">News</a>
        </div>
        <section id="section1">
            <h1>Dashboard</h1>
            <div class="progress-container">
                <div class="progress-item">
                    <canvas id="progressChart" data-percentage="20" data-color="blue" data-type="percentage" width="200" height="200"></canvas>
                    <p>Progress</p>
                </div>
                <div class="progress-item">
                    <canvas id="masteryChart" data-percentage="1.5" data-color="yellow" data-type="score" width="200" height="200"></canvas>
                    <p>Score</p>
                </div>
            </div>
        </section>

        <section id="section2">
            <h1>Modules</h1>
            <div class="lesson">
                <div class="toggle" onclick="toggleDropdown('dp1')">📂 Lesson 1: Introduction to Programming</i></div>
                <div class="dropdown" id="dp1">
                    <div class="toggle" onclick="toggleDropdown('dph1')">📚 Handouts</i></div>
                    <div class="dropdown" id="dph1">
                        <a href="https://edcore.rf.gd/resources/files/01_Skills_Checklist_1(5).pdf">📑 01_Skills_Checklist_1(5).pdf</a>
                        <a href="https://edcore.rf.gd/resources/files/01_Worksheet_1(5).pdf">📑 01_Worksheet_1(5).pdf</a>
                    </div>
                    <!-- <a href="#presentation1">🖼️ PowerPoint Presentation</a> -->
                </div>
            </div>
            <div class="lesson">
                <div class="toggle" onclick="toggleDropdown('dropdown2')">📂 Lesson 2: Basic Concepts</div>
                <div class="dropdown" id="dropdown2">
                    <div class="toggle" onclick="toggleDropdown('dph2')">📚 Handouts</i></div>
                    <div class="dropdown" id="dph2">
                        <a href="https://edcore.rf.gd/resources/files/Basic_Concepts.pdf">📑 Basic_Concepts.pdf</a>
                        <a href="https://edcore.rf.gd/resources/files/02_Laboratory_Exercise_1(49).pdf">📑 02_Laboratory_Exercise_1(49).pdf</a>
                    </div>
                    <!-- <a href="#presentation2">🖼️ PowerPoint Presentation</a> -->
                </div>
            </div>
        </section>
        <section id="section4">
            <p>Assignments</p>
            <ul>
                <li style="color:orange;">Mobile App iLS (Almost Due) [No Submssion from Office Yet]</li>
            </ul>
        </section>
        <section id="section3">
            <h1>News</h1>
            <ul>
                <li>[Alert]: Build a Calculator Using JavaScript by Friday!</li>
                <li>[Inst. Ada Heikkila]: Midterm Project Deadline: December 15th, 2024.</li>
                <li>[Inst. Ada Heikkila]: Why Learning Rust Is Crucial for Modern Developers.</li>
                <li>[New Video]: Guide: Understanding Object-Oriented Programming Concepts.</li>
                <li>[Inst. Ada Heikkila]: Join Us for a Webinar on Cloud Computing Next Wednesday</li>
            </ul>
        </section>
    </div>

    <script>
        function drawChart(canvas) {
            const ctx = canvas.getContext('2d');
            const type = canvas.getAttribute('data-type');
            const rawValue = parseFloat(canvas.getAttribute('data-percentage'));
            const color = canvas.getAttribute('data-color');
            const centerX = canvas.width / 2;
            const centerY = canvas.height / 2;

            const radius = Math.min(canvas.width, canvas.height) / 2 - 15; // Reduced by 15px to provide space for shadow

            let percentage, labelText;

            if (type === 'score') {
                percentage = (5 - rawValue) / 4 * 100;
                labelText = rawValue.toFixed(1);
            } else {
                percentage = rawValue;
                labelText = `${percentage}%`;
            }

            const startAngle = -Math.PI / 2;
            const endAngle = startAngle + (percentage / 100) * 2 * Math.PI;

            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.shadowColor = 'rgba(0, 0, 0, 0.7)';
            ctx.shadowBlur = 15; 
            ctx.shadowOffsetX = 0; 
            ctx.shadowOffsetY = 4; 

            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
            ctx.fillStyle = '#dadada';
            ctx.fill();

            ctx.shadowColor = 'transparent';

            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, startAngle, endAngle, false);
            ctx.lineWidth = 15;
            ctx.lineCap = 'round';
            ctx.strokeStyle = color;
            ctx.stroke();

            ctx.font = '40px Arial';
            ctx.fillStyle = 'black';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(labelText, centerX, centerY);
        }

        const charts = document.querySelectorAll('canvas');
        charts.forEach(drawChart);

        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</body>
</html>
