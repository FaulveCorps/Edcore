<?php
if (!defined('_CS_') || (basename(__FILE__) == basename($_SERVER['PHP_SELF']))) {
    header("HTTP/1.1 403 Forbidden"); 
    exit();
}
?>

<style>
    .course-list {
        flex-grow: 1; /* Allows the course list to take up as much space as available */
        display: flex;
        flex-wrap: center;
        gap: 1vw; /* Adjust gap between course cards */
    }
    .courses-container {
        padding: 1vw;
        margin-bottom: 0.8vw;
        background-color: #fff;
        border-radius: 1vw; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
        animation: fadeInContainer 1s ease-in-out;
        transition: all 0.3s ease;
    }

    h2 {
        font-size: 1vw;
        margin-bottom: 0.3vw;
    }

    .stats-overview {
        width: auto; 
        overflow: hidden;
        animation: fadeInContainer 1s ease-in-out;
        transition: all 0.3s ease;
    }
    .course-card {
        width: 15vw;
        height: 15vw;
        background-size: cover;
        background-position: center;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4); 
        color: #333;
        position: relative;
        border-radius: 1vw;
        overflow: hidden;
        text-align: center;
        margin: 0.8vw;
        transition: transform 0.3s ease;
        text-decoration: none; /* Ensures no underline for the anchor link */
    }
    .course-card:hover {
        transform: scale(1.10);
    }
    .title-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        min-height: 2vw;
        background-color: rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.7vw;
        transition: min-height 0.3s ease;
    }
    .course-title {
        font-size: 1.3vw;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        color: #FFD700;
        text-shadow: 5px 5px 5px rgba(0, 0, 0, 0.7);
        transition: font-size 0.3s ease;
    }
    .progress {
        position: absolute;
        bottom: -60px;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.7);
        padding: 0.8vw;
        border-radius: 5px;
        transition: bottom 0.3s ease;
    }
    .progress p {
        color: white;
        margin: 0;
        font-size: 16px;
        margin-top: 5px;
        font-family: Arial, Helvetica, sans-serif;
    }
    .progress-indicator {
        background-color: #FFA500;
        height: 0.3vw;
        border-radius: 3px;
        margin: 0 auto;
        transition: width 0.3s ease;
    }
    .course-card:hover .progress {
        bottom: 0px; 
    }
    .course-card:hover .title-overlay {
        min-height: 12vw;
        background-color: rgba(0, 0, 0, 0.4);
    }
    .course-card:hover .course-title {
        font-size: 1.8vw;
    }
    .progress-int {
        font-weight: bold; 
    }

    .stats-overview .progress {
        width: 100% !important;
    }
</style>

<div class="courses-container">
    <h2>Courses</h2>
    <div class="stats-overview">
    </div>
</div>

<script>
    document.querySelectorAll('.course-card').forEach(card => {
        const title = card.getAttribute('data-title');
        const image = card.getAttribute('data-image');
        const progress = card.getAttribute('data-progress');
        const progressIndicator = card.querySelector('.progress-indicator');

        card.querySelector('.course-title').innerText = title;
        card.style.backgroundImage = `url(${image})`;
        progressIndicator.style.width = progress + '%';
        card.querySelector('.progress-int').innerText = progress + '% COMPLETE';
    });

    function createCourseCard(title, image, progress, link) {
        const anchor = document.createElement('a');
        anchor.href = link;
        anchor.target = '_blank';
        anchor.classList.add('course-card');

        anchor.setAttribute('data-title', title);
        anchor.setAttribute('data-image', image);
        anchor.setAttribute('data-progress', progress);

        anchor.innerHTML = `
            <div class="title-overlay">
                <div class="course-title"></div>
            </div>
            <div class="progress">
                <div class="progress-indicator"></div>
                <p class="progress-int"></p>
            </div>
        `;

        anchor.querySelector('.course-title').innerText = title;
        anchor.style.backgroundImage = `url(${image})`;
        anchor.querySelector('.progress-indicator').style.width = progress + '%';
        anchor.querySelector('.progress-int').innerText = progress + '% COMPLETE';

        document.querySelector('.stats-overview').appendChild(anchor);
    }
</script>
