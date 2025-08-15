<?php
if (!defined('_AW_') || (basename(__FILE__) == basename($_SERVER['PHP_SELF']))) {
    header("HTTP/1.1 403 Forbidden"); 
    exit();
}
?>
<!DOCTYPE html>
<head>
    <style>
        .assignments-container {
            font-family: Arial, sans-serif;
            height: auto;
            background-color: #fff;
            padding: 1vw;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 1vw;
            margin-bottom: 1vw; 
            transition: all 0.3s ease;
        }
        .assignments-container h2 {
            color: #333;
            margin-block-start: 0vw;
            margin-bottom: 0.8vw;
            font-size: 1vw;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .assignment-item {
            margin-bottom: 0.5vw;
            padding: 0.5vw;
            background-color: #f9f9f9;
            border-radius: 1vw;
            box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: right;
            text-decoration: none; 
            color: black; 
            transition: all 0.3s ease;
        }
        .assignment-item:hover {
            background-color: #e0e0e0; 
            cursor: pointer; 
        }

        .color-circle {
            width: 0.8vw;
            height: 0.8vw;
            border-radius: 50%;
            margin-top: 0.1vw;
            margin-right: 0.5vw;
            flex-shrink: 0; 
        }

        .assignment-info {
            display: flex;
            flex-direction: column;
        }
        .assignment-item strong {
            font-size: 0.8vw;
        }
        .assignment-item .assignment-name {
            font-size: 0.7vw;
            margin: 0.3vw 0 0.3vw 0;
        }
        .assignment-item .due-date {
            font-size: 0.5vw;
            color: gray;
            font-weight: bold;
            display: block;
            transition: all 0.3s ease;
        }

        .assignment-item .due-left {
            font-size: 0.6vw;
            color: #ff6347;
            margin-top: 0.3vw;
            font-weight: bold;
            display: block;
        }
    </style>
</head>
<body>

<div class="assignments-container">
    <h2>Assignments</h2>
</div>

<script>

    // <!> TimeChecker //
    function timeCheck(event) {
        const eventDateTime = new Date(event.year, event.month - 1, event.day, ...event.time.split(':').map((t, i) => i === 0 ? t : t.slice(0, -2)).concat(event.time.slice(-2) === "PM" ? 12 : 0));
        const now = new Date();

        const diffMs = eventDateTime - now;
        const diffSeconds = Math.floor(diffMs / 1000);
        const diffMinutes = Math.floor(diffSeconds / 60);
        const diffHours = Math.floor(diffMinutes / 60);
        const diffDays = Math.floor(diffHours / 24);

        if (diffMs > 0) {
            if (diffDays > 0) return `${diffDays} Days Left`;
            if (diffHours > 0) return `${diffHours} Hours Left`;
            return `${diffMinutes} Minutes Left`;
        } else {
            if (diffDays < 0) return `${Math.abs(diffDays)} Days Due`;
            if (diffHours < 0) return `${Math.abs(diffHours)} Hours Due`;
            return `${Math.abs(diffMinutes)} Minutes Due`;
        }
    }
    // </!> //

    // <!> Assignment Creator //
    function createAssignment(event, courseName, assignmentDescription, dueDate, color, link) {
        const assignmentsContainer = document.querySelector('.assignments-container');
        
        const assignmentItem = document.createElement('a');
        assignmentItem.className = 'assignment-item';
        assignmentItem.href = link; 
        
        const colorCircle = document.createElement('div');
        colorCircle.className = 'color-circle';
        colorCircle.style.backgroundColor = color;

        const assignmentInfo = document.createElement('div');
        assignmentInfo.className = 'assignment-info';

        const subjectElement = document.createElement('strong');
        subjectElement.textContent = courseName;

        const assignmentNameElement = document.createElement('span');
        assignmentNameElement.className = 'assignment-name';
        assignmentNameElement.textContent = assignmentDescription;

        const dueDateElement = document.createElement('span');
        dueDateElement.className = 'due-date';
        dueDateElement.textContent = `${dueDate}`;

        const dueLeftElement = document.createElement('span');
        dueLeftElement.className = 'due-left';
        dueLeftElement.textContent = timeCheck(event);
        assignmentInfo.appendChild(subjectElement);
        assignmentInfo.appendChild(assignmentNameElement);
        assignmentInfo.appendChild(dueDateElement);
        assignmentInfo.appendChild(dueLeftElement);
        assignmentItem.appendChild(colorCircle); 
        assignmentItem.appendChild(assignmentInfo);

        assignmentsContainer.appendChild(assignmentItem);
    }
    // </!> //

    // <!> Event Parser //
    events.forEach(event => {
        if (event.assg) {
            const dueDate = `${event.month}/${event.day}/${event.year} - ${event.time}`;
            createAssignment(event, event.name, event.desc, dueDate, event.color, event.url);
        }
    });
    // </!> //
</script>

</body>
</html>
