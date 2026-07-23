<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments List</title>
    <style>
        
    </style>
</head>
<body>

    <h2>Department List</h2>

    <a href="/departments/create">+ Add New Department</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Code</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->code }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                       <a href="departments/edit">Edit</a>
                       <a href="departments/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>