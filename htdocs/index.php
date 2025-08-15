<?php 
    define('_H_', true);
    define('_HS_', true);
    include($_SERVER['DOCUMENT_ROOT'].'/elements/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'].'/elements/home-slideshow.php');
?>
<!DOCTYPE html>
<head>
    <title>EdCore</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            opacity: 1; 
            transition: opacity 0.5s ease; 
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        body {
            opacity: 0;
            animation: fadeIn 0.5s ease-in-out forwards;
        }

        .lms-section, .faq-section {
            font-size: 1vw;
            background-color: white;
            margin: 1vw;
            padding: 2vw;
            border-radius: 1vw;
            box-shadow: 0 0.4vw 0.4vw rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .lms-section h2, .faq-section h2 {
            color: black;
            font-size: 1.5vw;
            margin-bottom: 2vw;
            font-weight: 600;
        }

        .lms-section p {
            color: black;
            font-size: 0.8vw;
            line-height: 1.6;
            margin-bottom: 1vw;
        }

        .lms-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 1vw;
        }

        .lms-item {
            text-align: center;
            margin: 1vw;
            flex-basis: 20%;
            max-width: 10.5vw;
        }

        .lms-item img {
            width: 10.5vw;
            height: 10.5vw;
            margin-bottom: 0.5vw;
        }

        .lms-item p {
            font-weight: bold;
            font-size: 1vw;
            color: black;
        }

        .faq-item {
            text-align: left;
            margin: 0.5vw 0;
            font-size: 1vw;
            color: black;
        }

        .faq-item h3 {
            font-size: 1vw;
            color: black;
            cursor: pointer;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, opacity 0.4s ease-out;
            opacity: 0;
        }

        .faq-answer.show {
            max-height: 10vw;
            opacity: 1;
        }

        .faq-active {
            color: #717171;
        }
    </style>
</head>
<body>
    <div class="lms-section">
        <h1>Features of EdCore:</h1>
        <div class="lms-container">
            <div class="lms-item">
                <img src="resources/PersonalizedLearning_v3.png" alt="Personalized Learning">
                <p>Personalized Learning Paths</p>
            </div>
            <div class="lms-item">
                <img src="resources/AccessabilityFlexibility_v3.png" alt="Accessibility">
                <p>Accessibility and Flexibility</p>
            </div>
            <div class="lms-item">
                <img src="resources/CentralizedResources_v3.png" alt="Centralized Resources">
                <p>Centralized Resources</p>
            </div>
            <div class="lms-item">
                <img src="resources/AnalyticsProgress_v3.png" alt="Analytics">
                <p>Analytics and Progress Tracking</p>
            </div>
            <div class="lms-item">
                <img src="resources/Engagement_v3.png" alt="Engagement">
                <p>Engagement through Interactive Content</p>
            </div>
        </div>
    </div>

    <div class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">1. How do I create a new course?</h3>
            <div class="faq-answer">
                <p>To create a new course, navigate to the 'Courses' section, click on 'Create Course', and fill out the required details. You'll be asked to provide a course title, description, upload materials, and set learning objectives.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">2. Can I track my progress?</h3>
            <div class="faq-answer">
                <p>Yes, the EdCore LMS offers built-in analytics and progress tracking features. You'll be able to see your completed lessons, quizzes, and assignments along with feedback from instructors. Detailed reports are available on your dashboard.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">3. How can I access course materials?</h3>
            <div class="faq-answer">
                <p>Once enrolled in a course, you can access all course materials via the course page. Materials include videos, readings, interactive lessons, and downloadable content, all accessible on both desktop and mobile devices.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">4. Is the platform accessible on mobile devices?</h3>
            <div class="faq-answer">
                <p>Absolutely! EdCore is fully responsive and optimized for mobile. You can access your courses, track progress, and complete assignments directly from your smartphone or tablet without any issues.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">5. Who do I contact for support?</h3>
            <div class="faq-answer">
                <p>If you encounter any issues, you can reach out to the EdCore support team via the 'Help' section. You'll find an option to submit a support ticket, access the knowledge base, or chat with a live support agent.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">6. Can instructors upload their own materials?</h3>
            <div class="faq-answer">
                <p>Yes, instructors can upload a variety of materials including videos, PDFs, PowerPoints, and interactive quizzes. Instructors also have the ability to organize the materials into learning paths for their students.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">7. How secure is my personal data on EdCore?</h3>
            <div class="faq-answer">
                <p>Your data is stored securely using industry-standard encryption protocols. EdCore takes privacy and data protection seriously, ensuring that personal information is safe and accessible only to authorized personnel.</p>
            </div>
        </div>
        <div class="faq-item">
            <h3 class="faq-active" onclick="toggleFaq(this)">8. Can I integrate EdCore with other tools?</h3>
            <div class="faq-answer">
                <p>EdCore supports integration with popular tools such as Google Drive, Microsoft Teams, and Zoom. These integrations allow for a seamless experience when sharing documents, attending live sessions, or collaborating with peers.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleFaq(faq) {
            const answer = faq.nextElementSibling;
            const isExpanded = answer.classList.contains("show");
            answer.classList.toggle("show");
            faq.classList.toggle("faq-active");
        }
    </script>
</body>
</html>
