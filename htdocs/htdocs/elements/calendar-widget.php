

<!DOCTYPE html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calendar {
            width: auto;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .calendar-header {
            background-color: #f2f2f2;
            text-align: center;
            font-size: 1vw;
            border-radius: 1vw;
            box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.2);
            margin-bottom: 0.5vw;
            transition: all 0.3s ease;
        }
        .calendar-header button {
            cursor: pointer;
            border: none;
            background: none;
            padding: 0.5vw;
            font-size: 1vw;
            transition: all 0.3s ease;
        }

        .calendar-header button:hover {
            font-weight: Bold;
        }
        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            transition: all 0.3s ease;
        }
        .calendar-days div {
            cursor: pointer;
            border: none;
            font-size: 0.7vw;
            text-align: center;
            margin: 0.2vw;
            width: 1.4vw;
            height: 1.4vw;
            border-radius: 1vw;
            line-height: 1.5vw;
            position: relative;
            transition: all 0.3s ease;
        }
        .calendar-days div:hover {
            font-weight: bold;
            background-color: #e8e8e8;
        }
        .calendar-days div:nth-child(7n) {
            color: red;
        }
        .calendar-days div:nth-child(7n + 1) {
            color: orange;
        }
        .dark-red {
            color: #990000;
        }

        .dark-orange {
            color: #996300; 
        }

        .gray {
            color: #A9A9A9;
        }
        .current-day {
            transition: all 0.3s ease;
            background-color: #d9d9d9;
            border-radius: 50%;
            width: 1.5vw;
            height: 1.5vw;
            display: inline-block;
            line-height: 1.5vw;
            font-weight: bold;
            outline: 0.13vw solid red;
            text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;  
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            color: white;
        }

        .dot {
            width: 0.7vw;
            height: 0.7vw;
            border-radius: 50%;
            display: inline-block;
            margin-right: 0.3vw;
        }
        .calendar-container {
            height: auto;
            width: auto;
            background-color: #fff;
            padding: 0.8vw;
            margin-bottom: 1vw;
            box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.2);
            border-radius: 1vw;
        }

        .events-list {
            margin-top: 0.8vw;
        }

        .custom-event {
            margin-top: 1vw;
        }
        .assigned-event-day {
            background-color: transparent;
            color: white;
            text-shadow: 2px 2px 2px black;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border-radius: 50%;
            width: 1.5vw;
            height: 1.5vw;
            display: inline-block;
            line-height: 1.5vw;
            font-weight: bold;
        }

        .event-card {
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

        .event-card:hover {
            background-color: #e0e0e0;
        }

        .event-dot {
            transition: all 0.3s ease;
            width: 0.8vw;
            height: 0.8vw;
            border-radius: 50%;
            margin-top: 0.1vw;
            margin-right: 0.5vw;
            flex-shrink: 0;
        }

        .event-details {
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .event-name {
            font-weight: bold;
            font-size: 0.8vw;
            color: black;
            transition: all 0.3s ease;
        }

        .event-description {
            font-size: 0.7vw;
            margin-top: 0.2vw;
            color: gray;
            transition: all 0.3s ease;
        }

        .event-due {
            font-size: 0.6vw;
            color: #ff6347;
            margin-top: 0.3vw;
            font-weight: bold;
            display: block;
            transition: all 0.3s ease;
        }

        .event-date {
            font-size: 0.5vw;
            color: gray;
            margin-top: 0.2vw;
            font-weight: bold;
            display: block;
            transition: all 0.3s ease;
        }

        .options-container {
            margin-top: 0.5vw;
            margin-bottom: 0.5vw;
            padding: 0.5vw;
            background-color: white;
            border-radius: 1vw;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            font-size: 0.7vw;
            color: #333;
            display: flex;
            gap: 0.5vw;
            justify-content: space-around;
            transition: all 0.3s ease;
        }

        .edit-option {
            color: white;
            background-color: #1944ff;
            font-weight: bold;
            padding: 0.5vw;
            padding-left: 2vw;
            padding-right: 2vw;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .edit-option:hover {
            background-color: blue;
            color: white;
        }

        .delete-option {
            color: white;
            background-color: #ff3838;
            border-radius: 1vw;
            cursor: pointer;
            transition: color 0.3s ease;
            padding: 0.5vw;
            padding-left: 2vw;
            padding-right: 2vw;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .delete-option:hover {
            background-color: red;
            color: white;
        }

        .confirmation-container {
            margin-top: 0.1vw;
            margin-bottom: 0.1vw;
            padding: 0.8vw;
            background-color: white;
            border-radius: 1vw;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            font-size: 0.7vw;
            color: #333;
            display: flex;
            gap: 0.5vw;
            justify-content: space-around;
            transition: all 0.3s ease;
        }

        .confirmation-container p {
            font-size: 0.8vw;
            font-weight: Bold;
        }

        .confirmation-continue {
            color: white;
            background-color: red;
            font-weight: bold;
            padding: 0.5vw;
            padding-left: 0.8vw;
            padding-right: 0.8vw;
            height: 1.8vw;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .confirmation-cancelCreateEvent {
            text-align: center;
            color: white;
            background-color: red;
            font-weight: bold;
            padding: 0.5vw;
            padding-left: 0.8vw;
            padding-right: 0.8vw;
            margin-top: 0.8vw;
            height: 1.8vw;
            width: 5vw;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .confirmation-continue:hover {
            background-color:  #ff3333;
        }

        .confirmation-cancel {
            color: white;
            background-color: blue;
            font-weight: bold;
            padding: 0.5vw;
            padding-left: 0.8vw;
            padding-right: 0.8vw;
            margin-bottom: 0.3vw;
            height: 1.8vw;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .confirmation-createEvent {
            text-align: center;
            color: white;
            background-color: blue;
            font-weight: bold;
            padding: 0.5vw;
            padding-left: 0.8vw;
            padding-right: 0.8vw;
            margin-top: 0.8vw;
            height: 1.8vw;
            width: 4.5vw;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .confirmation-cancel:hover {
            background-color: #3333ff;
        }

        .edit-event-container {
            font-weight: bold;
            margin-top: 0.5vw;
            margin-bottom: 0.5vw;
            padding: 0.8vw;
            background-color: white;
            border-radius: 1vw;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            font-size: 0.7vw;
            color: #333;
            display: block;
            gap: 0.5vw;
            justify-content: space-around;
            transition: all 0.3s ease;
        }

        .event-edit-save {
            color: white;
            background-color: blue;
            font-weight: bold;
            padding: 0.5vw;
            padding-left: 0.8vw;
            padding-right: 0.8vw;
            margin-top: 0.8vw;
            height: 1.8vw;
            width: 3.5vw;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .event-edit-save:hover {
            background-color: #3333ff;
        }

        .event-edit-cancel {
            color: white;
            background-color: red;
            font-weight: bold;
            padding: 0.5vw;
            padding-left: 0.8vw;
            padding-right: 0.8vw;
            margin-top: 0.8vw;
            height: 1.8vw;
            width: 4vw;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .event-edit-cancel:hover {
            background-color: #ff3333;
        }

        .event-editor-container label {
            font-weight: bold;
            margin-bottom: 1vw;
        }

        .event-editor-container p {
            margin-bottom: 0.5vw;
            font-weight: bold;
            text-align: center;
        }
        

        .event-editor-container input {
            margin-top: 0.2vw;
            margin-bottom: 0.5vw;
            width: auto;
            padding: 0.3vw;
            padding-left: 0.5vw;
            padding-left: 0.5vw;
            border: 0.1vw solid;
            font-size: 0.8vw;
            border-radius: 1vw;
        }

        #cl {
            padding: none;
            width: 3.3vw;
            height: 3vw;
        }

        .create-event-container {
            font-weight: bold;
            margin-top: 0.5vw;
            margin-bottom: 0.5vw;
            padding: 0.8vw;
            background-color: white;
            border-radius: 1vw;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            font-size: 0.7vw;
            color: #333;
            display: block;
            gap: 0.5vw;
            justify-content: space-around;
            transition: all 0.3s ease;
        }

        .event-creator-container label {
            font-weight: bold;
            margin-bottom: 1vw;
        }

        .event-creator-container p {
            margin-bottom: 0.5vw;
            font-weight: bold;
            text-align: center;
        }

        .event-creator-container input {
            width: auto;
            margin-top: 0.2vw;
            margin-bottom: 0.5vw;
            padding: 0.3vw;
            padding-right: 0.5vw;
            padding-left: 0.5vw;
            border: 0.1vw solid;
            font-size: 0.8vw;
            border-radius: 1vw;
        }

        .creator-button {
            color: white;
            background-color: blue;
            font-weight: bold;
            font-size: 1vw;
            padding: 0.5vw;
            padding-left: 0.8vw;
            padding-right: 0.8vw;
            margin-top: 0.8vw;
            text-align: center;
            height: 2vw;
            width: auto;
            cursor: pointer;
            border-radius: 1vw;
            transition: color 0.3s ease;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .creator-button:hover {
            background-color: #4d4dff;
        }

        
    </style>
</head>
<body>

<div class="calendar-container">
    <div id="calendar"></div>
    <div id="events" class="events-list" style="display:none;">
        <div id="event-list"></div>
    </div>
</div>

<script>
    // <!> Variables //
    let month = new Date().getMonth();
    let year = new Date().getFullYear();
    const currentDay = new Date().getDate();
    let eventsTimeout;
    let selectedDay = null;
    let insideCalendar = false;
    const hoverDelay = 1500;
    // </!> //

    const events = [
        { day: 15, month: 11, year: 2024, assg: true, name: "Math Homework", desc: "General Mathematics", time: "2:00 PM", url: "../course/11291986/", color: "#FF5733" },
        { day: 15, month: 11, year: 2024, assg: true, name: "CSS Assignment", desc: "Web Programming", time: "4:00 PM", url: "../course/11455654/", color: "#33FF57" }, 
        { day: 20, month: 12, year: 2024, assg: true, name: "Scratchathon", desc: "Media Information Literacy", time: "10:00 AM", url: "../course/11044973/", color: "#3357FF" }, 
        { day: 20, month: 12, year: 2024, assg: true, name: "Mobile App iLS", desc: "Com Programming", time: "1:00 PM", url: "../course/11394238/", color: "#FF33A1" } 
    ];

     // <!> ColorBlending //
    function blendColors(colors) {
        let r = 0, g = 0, b = 0;
        colors.forEach(color => {
            const hex = parseInt(color.slice(1), 16);
            r += (hex >> 16) & 255;
            g += (hex >> 8) & 255;
            b += hex & 255;
        });
        r = Math.floor(r / colors.length);
        g = Math.floor(g / colors.length);
        b = Math.floor(b / colors.length);
        return `rgb(${r},${g},${b})`;
    }
    // </!> //

    // <!> RenderCalendar //
 function renderCalendar() {
        const firstDay = new Date(year, month, 1);
        const totalDays = new Date(year, month + 1, 0).getDate();
        const dayOfWeek = firstDay.getDay();

        let calendarHtml = '<div class="calendar">';
        calendarHtml += '<div class="calendar-header">';
        calendarHtml += '<button onclick="navigate(-1)">&lt;</button>';
        calendarHtml += `<strong>${firstDay.toLocaleString('default', { month: 'long' })} ${year}</strong>`;
        calendarHtml += '<button onclick="navigate(1)">&gt;</button>';
        calendarHtml += '</div>';
        calendarHtml += '<div class="calendar-days">';

        ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"].forEach(day => {
            calendarHtml += `<div>${day}</div>`;
        });

        for (let i = 0; i < dayOfWeek; i++) {
            const prevMonthDay = new Date(year, month, 0).getDate() - (dayOfWeek - i - 1);

            const dayColor = i === 6 ? "#ffb3b3" : i === 0 ? "#ffe4b3" : "#d9d9d9";
            calendarHtml += `<div style="color:${dayColor}">${prevMonthDay}</div>`;
        }

        for (let day = 1; day <= totalDays; day++) {
            const dayEvent = events.filter(a => a.day === day && a.month === month + 1 && a.year === year);
            const isCurrentDay = day === currentDay && month === new Date().getMonth() && year === new Date().getFullYear();
            let dayClass = '';
            let dayStyle = '';

            if (isCurrentDay) {
                dayClass += 'current-day';
            } else if (dayEvent.length > 0) {
                const blendedColor = blendColors(dayEvent.map(a => a.color));
                dayStyle += `background-color: ${blendedColor}`;
                dayClass = 'assigned-event-day';
            } else {
                dayClass += 'no-event-day';
            }

            calendarHtml += `<div class="${dayClass}" style="${dayStyle}" data-day="${day}">${day}</div>`;
        }  

        const remainingCells = 7 - ((dayOfWeek + totalDays) % 7 || 7);
        for (let j = 0; j < remainingCells; j++) {
            const isSaturday = (dayOfWeek + totalDays + j) % 7 === 6;
            const isSunday = (dayOfWeek + totalDays + j) % 7 === 0;

            const dayColor = isSaturday ? "#ffb3b3" : isSunday ? "#ffe4b3" : "#d9d9d9";
            calendarHtml += `<div style="color:${dayColor}">${j + 1}</div>`;
        }

        calendarHtml += '</div></div>';
        document.getElementById('calendar').innerHTML = calendarHtml;
    }   
    // <!>

    // <!> Calendar Nav //
    function navigate(direction) {
        month += direction;
        if (month < 0) {
            month = 11;
            year--;
        } else if (month > 11) {
            month = 0;
            year++;
        }
        renderCalendar();
    }
    // </!> //

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


    // <!> DateTime Parser //
    function parseDateTime(dateString) {
        let year, month, day; 
        const [datePart, timePart] = dateString.split("T");
        [year, month, day] = datePart.split("-");
        let [hours, minutes] = timePart.split(":");

        minutes = minutes.split(":")[0];

        let period = "AM";
            hours = parseInt(hours, 10);
        if (hours >= 12) {
            period = "PM";
            if (hours > 12) hours -= 12;
        } else if (hours === 0) {
            hours = 12;
        }
        const formatTime = `${hours}:${minutes} ${period}`;
        const formattedDate = `${month}/${day}/${year}`; 
        return { day: day, month: month, year: year, formattedDate, time: formatTime };
    }
    // </!> //



    // <!> DisplayEvents //
    function displayEvents(day) {
    const dayEvents = events.filter(e => e.day === day && e.month === month + 1 && e.year === year);
    const eventListDiv = document.getElementById('event-list');
    if (!eventListDiv) {
        console.error('Element with ID "event-list" not found.');
        return;
    }

    eventListDiv.innerHTML = '';
    eventListDiv.style.display = 'block';

    if (dayEvents.length > 0) {
        dayEvents.forEach(event => {
            const eventcolor = `background-color: ${event.color};`;
            const dueMessage = timeCheck(event);
            const eventHtml = `
            <a href="${event.url}" class="event-card" style="text-decoration: none; color: inherit;">
                <div class="event-dot" style="${eventcolor}"></div>
                <div class="event-details">
                    <div class="event-name">${event.name}</div>
                    <div class="event-description">${event.desc}</div>
                    <div class="event-date">${event.month}/${event.day}/${event.year} - ${event.time}</div>
                    <div class="event-due">${dueMessage}</div>
                </div>
            </a>`;
            eventListDiv.innerHTML += eventHtml;
        });
    } else {
        eventListDiv.innerHTML = '<p>No Events</p>';
    }
}

    // <!> //


    // <!> Event Visibility //
    document.querySelector('.calendar-container').addEventListener('mouseenter', () => {
        insideCalendar = true;
        clearTimeout(eventsTimeout);
    });
    document.querySelector('.calendar-container').addEventListener('mouseleave', () => {
        insideCalendar = false;

        startEventsTimer();

    });
    // </!> //

    // <!> Start Timer Function //

    function startEventsTimer() {
        eventsTimeout = setTimeout(() => {
            if (!insideCalendar) {
                document.getElementById('events').style.display = 'none';
                if (document.querySelector('.event-creator-container')){
                    document.querySelector('.event-creator-container').remove();
                }
                if (document.querySelector('.edit-event-container')) {
                    document.querySelector('.edit-event-container').remove();
                }
                
            }
        }, hoverDelay);
    }
    
    // </!> //

    // <!> Event Click ShowEvent //
    document.getElementById('calendar').addEventListener('click', (e) => {
        document.getElementById('events').style.display = 'block';
        const dayElement = e.target.closest('.assigned-event-day, .current-day, .no-event-day');
        if (dayElement) {
            const day = parseInt(dayElement.textContent, 10);
            if (!isNaN(day)) {
                displayEvents(day);
                document.getElementById('events').style.display = 'block';
            }
        }
    });
    // </!> //

    // <!> DateTime Formatter //
    function formatEventTime(event) {
    const [hours, minutesPart] = event.time.split(":");
    const minutes = minutesPart.split(" ")[0];
    const period = minutesPart.split(" ")[1];

    let formattedHours = parseInt(hours, 10);
    if (period === "PM" && formattedHours < 12) formattedHours += 12;
    if (period === "AM" && formattedHours === 12) formattedHours = 0;

    return `${event.year}-${String(event.month).padStart(2, '0')}-${String(event.day).padStart(2, '0')}T${String(formattedHours).padStart(2, '0')}:${minutes}`;
    }
    // </!> //

    // <!> RGB Hex Convert //
    function rgbToHex(rgb) {
        const [r, g, b] = rgb.match(/\d+/g).map(Number);
        return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1).toUpperCase();
    }
    // </!> //



    // <!> Event Context Menu // 
    document.getElementById('event-list').addEventListener('contextmenu', (e) => {
        getEventC(e);
    });
    // </!> //

    // Example implementation of formatDateTime
    function formatDateTime(event) {
        if (!event || !event.dueDate) return '';
        const date = new Date(event.dueDate);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }


    // <!> EventGenerator //
    function getEventC(e) {
        e.preventDefault();
        const eventCard = e.target.closest('.event-card');
        document.querySelectorAll('.options-container, .edit-event-container, .confirmation-container .event-creator-container').forEach(el => el.remove());

        if (eventCard) {
            document.getElementById('create-button').style.display = 'none';

            const optionsContainer = document.createElement('div');
            optionsContainer.classList.add('options-container');
            eventCard.insertAdjacentElement('afterend', optionsContainer);

            const editButton = document.createElement('div');
            editButton.textContent = 'Edit';
            editButton.classList.add('edit-option');
            editButton.onclick = () => {
                optionsContainer.style.display = 'none';

                document.querySelectorAll('.edit-event-container, .confirmation-container').forEach(el => el.remove());

                const eventName = eventCard.querySelector('.event-name').textContent;
                const eventDesc = eventCard.querySelector('.event-description').textContent;
                const eventDot = rgbToHex(window.getComputedStyle(eventCard.querySelector('.event-dot')).backgroundColor);
                const eventHref = eventCard.getAttribute("href");
                const event = events.find(e => e.name === eventName);
                const defaultDateTime = formatDateTime(event);

                const editContainer = document.createElement('div');
                editContainer.classList.add('edit-event-container');
                editContainer.innerHTML = `
                    <div class="event-editor-container">
                        <p>Edit:</p>
                        <label for="dt">Due:</label><br><input type="datetime-local" id="dt" name="dt" value="${defaultDateTime}"><br>
                        <label for="nm">Name:</label><br><input type="text" id="nm" name="nm" value="${eventName}"><br>
                        <label for="dc">Description:</label><br><input type="text" id="dc" name="dc" value="${eventDesc}"><br>
                        <label for="lk">Link:</label><br><input type="url" id="lk" name="lk" value="${eventHref}"><br>
                        <label style="width: 30vw" for="cl">Color:</label><br><input type="color" id="cl" name="cl" value="${eventDot}">
                        <center><div class="event-edit-save">Save</div><div class="event-edit-cancel">Cancel</div></center>
                    </div>
                `;
                optionsContainer.insertAdjacentElement('afterend', editContainer);

                editContainer.querySelector('.event-edit-save').onclick = () => { 
                    const newDateTime = editContainer.querySelector('#dt').value;
                    const newName = editContainer.querySelector('#nm').value;
                    const newDesc = editContainer.querySelector('#dc').value;
                    const newLink = editContainer.querySelector('#lk').value;
                    const newColor = editContainer.querySelector('#cl').value;

                    eventCard.querySelector('.event-name').textContent = newName;
                    eventCard.querySelector('.event-description').textContent = newDesc;
                    eventCard.querySelector('.event-dot').style.backgroundColor = newColor;
                    eventCard.setAttribute("href", newLink);

                    editContainer.remove(); 
                    optionsContainer.style.display = 'flex'; 
                };
                editContainer.querySelector('.event-edit-cancel').onclick = () => { editContainer.remove(); optionsContainer.style.display = 'flex'; };
            };
            optionsContainer.appendChild(editButton);

            const deleteButton = document.createElement('div');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('delete-option');
            deleteButton.onclick = () => {
                optionsContainer.style.display = 'none';
                document.querySelectorAll('.edit-event-container, .confirmation-container').forEach(el => el.remove());

                const confirmContainer = document.createElement('div');
                confirmContainer.classList.add('confirmation-container');
                confirmContainer.innerHTML = `
                    <p>Are you sure you want to delete?</p>
                    <center><div class="confirmation-cancel">No</div><div class="confirmation-continue">Yes</div></center>
                `;
                optionsContainer.insertAdjacentElement('afterend', confirmContainer);

                confirmContainer.querySelector('.confirmation-continue').onclick = () => confirmContainer.remove();
                confirmContainer.querySelector('.confirmation-cancel').onclick = () => confirmContainer.remove();
                document.getElementById('create-button').style.display = 'block';    
            };
            optionsContainer.appendChild(deleteButton);
        } else {
            document.getElementById('create-button').style.display = 'block';
        }
    }
    // </!>

    // <!> LoadCalendar //
    document.addEventListener('DOMContentLoaded', (event) => {
        renderCalendar();
    });
    // </!> //

    function customizeEvent() {
        alert('Customization feature coming soon!');
    }
</script>

</body>
</html>