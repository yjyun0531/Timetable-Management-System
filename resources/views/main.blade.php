<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <style>
            .dashboard-container {
                max-width: 1000px;
                margin: 40px auto;
                padding: 0 20px;
            }
            .dashboard-container h1 {
                color: #1F4E79;
                font-size: 26px;
                margin-bottom: 6px;
            }
            .dashboard-subtitle {
                color: #666;
                font-size: 14px;
                margin-bottom: 30px;
            }
            .button-group {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
                gap: 18px;
            }
            .button-group a {
                display: flex;
                flex-direction: column;
                gap: 8px;
                text-decoration: none;
                background-color: #ffffff;
                color: #1F4E79;
                border: 1px solid #e0e4e8;
                border-left: 5px solid #1F4E79;
                border-radius: 8px;
                padding: 20px;
                font-weight: 600;
                font-size: 16px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.06);
                transition: transform 0.15s ease, box-shadow 0.15s ease;
            }
            .button-group a:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 14px rgba(0,0,0,0.12);
            }
            .button-group a .icon {
                font-size: 26px;
            }
            .button-group a .desc {
                font-weight: 400;
                font-size: 13px;
                color: #777;
            }
        </style>
    </head>
    <body>
        <x-header/>

        <div class="dashboard-container">
            <h1>Dashboard</h1>
            <p class="dashboard-subtitle">Manage academic records and the departmental timetable.</p>

            <div class="button-group">
                <a href="/departments">
                    <span class="icon">🏢</span>
                    Departments
                    <span class="desc">Manage department records</span>
                </a>
                <a href="/courses">
                    <span class="icon">📚</span>
                    Courses
                    <span class="desc">Manage course catalogue</span>
                </a>
                <a href="/course-offerings">
                    <span class="icon">🗂️</span>
                    Course Offerings
                    <span class="desc">Per-batch course offerings</span>
                </a>
                <a href="/lecturers">
                    <span class="icon">👩‍🏫</span>
                    Lecturers
                    <span class="desc">Manage lecturer records</span>
                </a>
                <a href="/lecturer-courses">
                    <span class="icon">🔗</span>
                    Lecturer Assignments
                    <span class="desc">Assign lecturers to offerings</span>
                </a>
                <a href="/venues">
                    <span class="icon">🏫</span>
                    Venues
                    <span class="desc">Manage venue records</span>
                </a>
                <a href="/timetable">
                    <span class="icon">🗓️</span>
                    Timetable
                    <span class="desc">View and manage the timetable</span>
                </a>
            </div>
        </div>
    </body>
</html>