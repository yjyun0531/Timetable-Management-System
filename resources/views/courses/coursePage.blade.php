<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Setting</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; margin-right: 10px; }
    </style>
</head>
<body>

    <h2>Course List</h2>
    <a href="/courses/create">+ Add New Course</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Department</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Course Description</th>
                <th>Trimester Offered</th>
                <th>Lecture Hours Per Week</th>
                <th>Tutorial Hours Per Week</th>
                <th>Practical Hours Per Week</th>
                <th>Number of Student</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $courses->firstItem() + $loop->index }}</td>
                    <td>{{ optional($course->department)->name}}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->trimester_offered }}</td>
                    <td>{{ $course->lecture_hours }}</td>
                    <td>{{ $course->tutorial_hours }}</td>
                    <td>{{ $course->practical_hours }}</td>
                    <td>{{ $course->num_students }}</td>
                    <td>{{ $course->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>
                       <a href="courses/edit">Edit</a>
                       <a href="courses/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        {{ $courses->links() }}
    </div>
</body>
</html>