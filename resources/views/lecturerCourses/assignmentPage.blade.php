<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Lecturer-Course Assignments</title>
</head>
<body>
    <h2>Lecturer-Course Assignments</h2>
    <a href="/lecturer-courses/create">+ Add New Assignment</a>
    <table>
        <thead>
            <tr><th>Lecturer</th><th>Course</th><th>Batch</th><th>Trimester</th><th>Class Group</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($assignments as $a)
                <tr>
                    <td>{{ optional($a->lecturer)->name }}</td>
                    <td>{{ optional(optional($a->offering)->course)->course_code }}</td>
                    <td>{{ optional($a->offering)->batch_code }}</td>
                    <td>{{ optional($a->offering)->trimester }}</td>
                    <td>{{ $a->class_group }}</td>
                    <td>
                        <a href="/lecturer-courses/{{ $a->lecturer_id }}/{{ $a->offering_id }}/edit">Edit</a>
                        <a href="/lecturer-courses/{{ $a->lecturer_id }}/{{ $a->offering_id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>