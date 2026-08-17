<x-header/>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lecturer</title>
</head>
<body>

    <form action="/lecturers" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Lecturer Name:</label>
        <input type="text" id="name" name="name" placeholder="e.g. Dr. John Tan" required>
    </div>

    <div class="form-group">
        <label for="department">Department:</label>
        <select id="department" name="department_id" required>
            <option value="">-- Select a Department --</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">
                    {{ $department->name }} ({{ $department->code }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit">Submit Lecturer</button>
    </div>

    </form>
</body>
</html>