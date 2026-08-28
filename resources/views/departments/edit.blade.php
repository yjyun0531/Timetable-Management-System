<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
</head>
<body>

    <h2>Edit Department</h2>

    <form action="/departments/{{ $department->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Department Code:</label>
            <input type="text" id="code" name="code" value="{{ old('code', $department->code) }}" required>
        </div>

        <div class="form-group">
            <label for="name">Department Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $department->name) }}" required>
        </div>

        <button type="submit">Update Department</button>
    </form>

    <a href="/departments" class="back-link">← Back to List</a>

</body>
</html>