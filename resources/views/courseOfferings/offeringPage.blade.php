<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Offerings</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; margin-right: 10px; }
    </style>
</head>
<body>

    <h2>Course Offering List</h2>
    <a href="/course-offerings/create">+ Add New Offering</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Course Code</th>
                <th>Course Name</th>
                <th>Batch</th>
                <th>Trimester</th>
                <th>Students</th>
                <th>Shared?</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offerings as $offering)
                <tr>
                    <td>{{ $offerings->firstItem() + $loop->index }}</td>
                    <td>{{ optional($offering->course)->course_code }}</td>
                    <td>{{ optional($offering->course)->course_name }}</td>
                    <td>{{ $offering->batch_code }}</td>
                    <td>{{ $offering->trimester }}</td>
                    <td>{{ $offering->num_students }}</td>
                    <td>{{ $offering->is_shared_programme ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        {{ $offerings->links() }}
    </div>
</body>
</html>