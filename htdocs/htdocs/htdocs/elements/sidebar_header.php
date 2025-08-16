<?php
if (!defined('_SBH_') || (basename(__FILE__) == basename($_SERVER['PHP_SELF']))) {
    header("HTTP/1.1 403 Forbidden");
    exit();
}
?>

<!DOCTYPE html>
<head>
    <link rel="icon" type="image/x-icon" href="/resources/logo_v4.ico" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sidebar {
            width: 5.8vw;
            background-color: white;
            color: black;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 2;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease; 
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            align-items: center;
            margin-top: 4vw;
            transition: all 0.3s ease; 
        }

        .sidebar-menu .menu-item {
            text-align: center;
            margin: 5% 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 0.5vw;
            transition: transform 0.3s ease;
            width: 7w;
            height: 7w;
        }

        .sidebar-menu .menu-item a {
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 5%;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 7w;
            height: 7w;
            border-radius: 8px;
        }

        .sidebar-menu .menu-item a:hover {
            background-color: #dadada;
            border-radius: 8px;
            transform: scale(1.1);
        }

        .menu-icon {
            width: 3.3vw;
            height: 3.3vw;
            transition: all 0.3s ease; 
        }

        .menu-text {
            font-size: 0.8vw;
            color: black;
            font-family: Arial, sans-serif;
            font-weight: bold;
            transition: all 0.3s ease; 
        }

        header {
            background-color: white;
            color: white;
            padding: 0.3vw;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 3;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease; 
        }

        .logo {
            width: 3vw;
            height: auto;
            margin-left: 1.1vw;
            transition: opacity 1s ease;
        }

        .search-bar {
            margin-left: -60.5vw;
            padding: 0.5vw;
            border-width: 0.1vw;
            border-radius: 1vw;
            width: 17vw;
            font-size: 1vw;
            transition: all 0.3s ease; 
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-right: 1vw;
            transition: all 0.3s ease; 
        }

        .username {
            font-size: 1.2vw;
            color: black;
            font-family: Arial, sans-serif;
            margin-right: 0.5vw;
            font-weight: bold;
            transition: all 0.3s ease; 
        }

        .profile-img {
            width: 2vw;
            height: auto;
            border-radius: 50%;
            border: 1px solid #ccc;
            margin-right: 0.7vw;
            transition: all 0.3s ease; 
        }

        .quick-buttons {
            width: 1.3vw;
            height: 1.3vw;
            margin-right: 0.7vw;
            transition: transform 0.3s ease;
        }

        .quick-buttons:hover {
            transform: scale(1.2);
        }

        @media screen and (max-width: 1450px) {
            .sidebar {
                width: 85px; 
                transition: all 0.3s ease; 
            }

            .sidebar-menu {
                margin-top: 60px;
                transition: all 0.3s ease; 
            }

            .sidebar-menu .menu-item a {
                width: 70px; 
                height: 70px;
                transition: all 0.3s ease; 
            }

            .menu-icon {
                width: 40px;
                height: 40px;
                transition: all 0.3s ease; 
            }

            .menu-text {
                font-size: 13px;
                transition: all 0.3s ease; 
            }

            header {
                padding: 5px;
                transition: all 0.3s ease; 
            }

            .logo {
                width: 50px;
                margin-left: 13px;
                transition: all 0.3s ease; 
            }

            .search-bar {
                margin-left: -80vw;
                width: 200px;
                font-size: 14px;
                padding: 5px;
                transition: all 0.3s ease; 
            }

            .username {
                font-size: 14px;
                margin-right: 5px;
                transition: all 0.3s ease; 
            }

            .profile-img {
                width: 30px;
                height: 30px;
                margin-right: 10px;
                transition: all 0.3s ease; 
            }

            .quick-buttons {
                width: 20px;
                height: 20px;
                margin-right: 10px;
                transition: all 0.3s ease; 
            }
        }

        h2 {
            color: #333;
            font-size: 2vw;
        }

        p {
            font-size: 1.2vw;
        }

        #user {
            flex-direction: column;
        }
    </style>
    <script>
        function toggleLogo() {
            const logoElement = document.getElementById('logoImg');
            let currentImage = '/resources/logo_v5.png';
            setInterval(() => {
                logoElement.style.opacity = 0; 
                setTimeout(() => {
                    currentImage = currentImage === '/resources/logo_v5.png' ? '/resources/EdCoreTextCompact.png' : '/resources/logo_v5.png';
                    logoElement.src = currentImage;
                    logoElement.style.opacity = 1; 
                }, 1000); 
            }, 8000);
        }
        window.onload = toggleLogo;
    </script>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-menu">
            <div class="menu-item">
                <a href="/dashboard/">
                    <img src="/resources/Dashboard.png" alt="Dashboard" class="menu-icon">
                    <div class="menu-text">Dashboard</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="/dashboard/#modules-section">
                    <img src="/resources/Courses.png" alt="Courses" class="menu-icon">
                    <div class="menu-text">Courses</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="https://pathways.educause.edu/pathways/teaching-learning">
                    <img src="/resources/Paths_v2.png" alt="Paths" class="menu-icon">
                    <div class="menu-text">Paths</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="https://www.clickvieweducation.com/blog/teaching-strategies/educational-goals-examples">
                    <img src="/resources/Goals.png" alt="Goals" class="menu-icon">
                    <div class="menu-text">Goals</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="https://teams.microsoft.com/v2/">
                    <img src="/resources/Groups.png" alt="Groups" class="menu-icon">
                    <div class="menu-text">Groups</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="https://onedrive.live.com/">
                    <img src="/resources/Locker_v2.png" alt="Resources" class="menu-icon">
                    <div class="menu-text">Locker</div>
                </a>
            </div>
        </div>
    </div>

    <header>
        <div><img src="/resources/logo_v5.png" alt="Logo" id="logoImg" class="logo"></div>
        <div class="user-info">
            <a style="text-decoration:none;" href="https://www.facebook.com/theejohndoe">
                <span class="username">John Doe</span>
            </a>
            <a href="https://www.facebook.com/theejohndoe">
                <img src="/resources/default-pfp.jpg" alt="ProfilePicture" class="profile-img">
            </a>
            <a href="https://teams.microsoft.com/v2/">
                <img src="/resources/Messages.png" alt="Messages" class="quick-buttons">
            </a>
        </div>
    </header>

</body>
</html>
