<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Timetable</title>
</head>
<body>
    <h2>Timetable</h2>
   <a href="/timetable/grid">View as Grid (Add Entry Here)</a>
    <table>
        <thead>
            <tr>
                <th>Course</th><th>Lecturer</th><th>Venue</th><th>Day</th>
                <th>Time</th><th>Type</th><th>Group</th><th>Week</th><th>Locked</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entries as $entry)
                <tr>
                    <td>{{ optional(optional($entry->offering)->course)->course_code }}</td>
                    <td>{{ optional($entry->lecturer)->name }}</td>
                    <td>{{ optional($entry->venue)->name }}</td>
                    <td>{{ $entry->day_of_week }}</td>
                    <td>{{ $entry->start_time }} - {{ $entry->end_time }}</td>
                    <td>{{ $entry->class_type }}</td>
                    <td>{{ $entry->class_group }}</td>
                    <td>{{ $entry->week_type }}</td>
                    <td class="{{ $entry->is_locked ? 'locked' : '' }}">{{ $entry->is_locked ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="/timetable/{{ $entry->id }}/edit">Edit</a>
                        <a href="/timetable/{{ $entry->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $entries->links() }}</div>
</body>
</html>