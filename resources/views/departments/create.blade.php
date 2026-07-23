<x-header/>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Department</title>
    <style>
      
    </style>
</head>
<body>

    <h2>Add New Department</h2>

    <form action="/departments" method="POST">
    @csrf

        <div class="form-group">
            <label for="code">Department Code:</label>
            <input type="text" id="code" name="code" placeholder="e.g., D3E" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
            <label for="name">Department Name:</label>
            <input type="text" id="name" name="name" placeholder="e.g., Department of Engineering" value="{{ old('name') }}" required>
        </div>

        <button type="submit">Save Department</button>
    </form> <a href="/departments" class="back-link">← Back to List</a>

</body>
</html>