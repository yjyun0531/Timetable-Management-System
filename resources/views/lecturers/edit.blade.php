<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lecturer</title>
</head>
<body>

    <h2>Edit Lecturer</h2>

    <form action="/lecturers/{{ $lecturer->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Lecturer Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $lecturer->name) }}" required>
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <select id="department" name="department_id" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $lecturer->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }} ({{ $department->code }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update Lecturer</button>
    </form>

    <a href="/lecturers" class="back-link">← Back to List</a>

</body>
</html>