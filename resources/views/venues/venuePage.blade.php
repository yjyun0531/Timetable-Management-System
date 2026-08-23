<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Setting</title>
    <style>
        
    </style>
</head>
<body>

    <h2>Venue List</h2>

    <a href="/venues/create">+ Add New Venue</a>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venues as $venue)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $venue->name }}</td>
                    <td>{{ $venue->capacity }}</td>
                    <td>{{ $venue->type }}</td>
                    <td>
                        <a href="/venues/{{ $venue->id }}/edit">Edit</a>
                        <a href="/venues/{{ $venue->id }}/delete">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>