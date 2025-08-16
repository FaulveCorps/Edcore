<?php
if (!defined('_OW_') || (basename(__FILE__) == basename($_SERVER['PHP_SELF']))) {
    header("HTTP/1.1 403 Forbidden"); 
    exit();
}
?>
<!DOCTYPE html>
<head>
    <style>
        .online-container h2 {
            color: #333;
            margin-block-start: 0vw;
            font-size: 1vw;
            text-align: left;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .online-container {
            font-family: Arial, sans-serif;
            height: auto;
            background-color: #fff;
            padding: 1vw;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 1vw;
            margin-bottom: 0.8vw; 
            transition: all 0.3s ease;
            text-align: center;
        }
        .profile-items {
            display: flex;
            justify-content: space-around;
            margin-bottom: 1vw;
            flex-wrap: wrap;
            gap: 0.5vw;
        }
        .profile-item {
            max-height: 3vw;
            max-width: 2vw;
            display: flex;
            flex-direction: column;
            align-items: center; 
            margin: 1vw; 
        }
        .profile-item img {
            margin-bottom: 0.5vw; 
        }
    </style>
</head>
<body>
    <div class="online-container">
        <h2>Online</h2>
        <div class="profile-items" id="profile-container">
        </div>
    </div>

    <script>
        function createProfileLink(imageUrl, profileUrl, displayName) {
            const profileItem = document.createElement('div');
            profileItem.className = 'profile-item'; 

            const a = document.createElement('a');
            a.href = profileUrl;
            a.target = '_blank';

            const img = document.createElement('img');
            img.src = imageUrl;
            img.style.width = '3vw';
            img.style.height = '3vw';
            img.style.borderRadius = '50%'; 
            img.style.objectFit = 'cover';
            img.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.3)';

            const nameElement = document.createElement('span');
            nameElement.textContent = displayName;
            nameElement.style.fontSize = '0.8vw';

            a.appendChild(img);
            profileItem.appendChild(a);
            profileItem.appendChild(nameElement);
            document.getElementById('profile-container').appendChild(profileItem); 
        }

        createProfileLink(
            'https://lh3.googleusercontent.com/a/ACg8ocIeuuTyrvS2EB2xzZzzmDr0j_PqV2mr4d55LqkVmqPSgagKbAbT%3Ds96-c',
            'https://www.facebook.com/zeke.arenas.7',
            'Arenas'
        );
        createProfileLink(
            'https://lh3.googleusercontent.com/a/ACg8ocKdamKZ-SXr2bLV5Wdq8g5rIMEyo5ZHb3tASoNEpK2cvXE-TuM=s96-c',
            'https://www.facebook.com/profile.php?id=100082230065357',
            'Tavernier'
        );
        createProfileLink(
            'https://lh3.googleusercontent.com/a/ACg8ocJwtamOdZQSKwW56nMnHBRnXlcILzKeOHKkgnvm7FgzDukRL2sa%3Ds96-c',
            'https://www.facebook.com/isaiah.mandapat',
            'Mandapat'
        );
        createProfileLink(
            'https://lh3.googleusercontent.com/a/ACg8ocKkPrM_ohqtcPLLhl1aazGQaDUoRmAIPOL5R1kvCyvFE5Ct7I1t%3Ds96-c',
            'https://www.facebook.com/jamiekylie.ng.1',
            'Ng'
        );
        createProfileLink(
            'https://lh3.googleusercontent.com/a/ACg8ocJLvhPTXugxy1xTZAjOjC6COn21fL8HyMiLfSe19GnTbJKEQmeW%3Ds96-c',
            'https://www.facebook.com/Tristan.Jonn9',
            'Perito'
        );

        createProfileLink(
            'https://scontent.fmnl30-1.fna.fbcdn.net/v/t39.30808-1/459297658_2383758195289359_8527161378802794321_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=103&ccb=1-7&_nc_sid=0ecb9b&_nc_eui2=AeGoMZVBtWl79VhXRCJmNE55VRC1qEY1MA9VELWoRjUwD3kR7sOfcMcAQquTVfNIRU5S8fbcmRMwDx4tEqLE34bO&_nc_ohc=-IzLycotWowQ7kNvgFWqYLj&_nc_zt=24&_nc_ht=scontent.fmnl30-1.fna&_nc_gid=AzlrnGs50yTaaOiDhP2b8II&oh=00_AYCUuN5oTEQb-0aob23i9C9q34SDut68G5TZJJMpW67SPA&oe=675F6083',
            'https://www.facebook.com/gian.colobong',
            'Colobong'
        );

        createProfileLink(
            'https://scontent.fmnl30-1.fna.fbcdn.net/v/t39.30808-1/468755660_461850060264043_37276459403594100_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=102&ccb=1-7&_nc_sid=50d2ac&_nc_eui2=AeG65TOE3pDZPbcDcyB6HZQveyme6tWEoZ17KZ7q1YShnY6HllBxC_WfpOHZRajvtxzME5-lHRBOLxjtAB1G8Nwb&_nc_ohc=ZSSgSvrQDiMQ7kNvgFMomkM&_nc_zt=24&_nc_ht=scontent.fmnl30-1.fna&_nc_gid=AvemGPeT6CjV-EM5env08sG&oh=00_AYAtPa6DLxskBwZ4jh0cq6G4kCXCfCiPBkelwbyMVXhCOg&oe=675F37A4',
            'https://www.facebook.com/jpfaulveofficial',
            'Faulve'
        );

        createProfileLink(
            'https://edcore.rf.gd/resources/default-pfp.jpg',
            'https://www.facebook.com/theejohndoe',
            'Doe'
        );
    </script>
</body>
</html>
