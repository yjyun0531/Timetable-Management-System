<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturers</title>
</head>
<body>

    <h2>Lecturer List</h2>
    <a href="/lecturers/create">+ Add New Lecturer</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lecturers as $lecturer)
                <tr>
                    <td>{{ $lecturers->firstItem() + $loop->index }}</td>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ optional($lecturer->department)->name }}</td>
                    <td>
                       <a href="/lecturers/{{ $lecturer->id }}/edit">Edit</a>
                       <a href="/lecturers/{{ $lecturer->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        {{ $lecturers->links() }}
    </div>
</body>
</html>