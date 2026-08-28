<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Venue</title>
</head>
<body>

    <h2>Edit Venue</h2>

    <form action="/venues/{{ $venue->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Venue Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $venue->name) }}" required>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="text" id="capacity" name="capacity" value="{{ old('capacity', $venue->capacity) }}" required>
        </div>

        <div class="form-group">
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="L" {{ $venue->type == 'L' ? 'selected' : '' }}>L</option>
                <option value="T" {{ $venue->type == 'T' ? 'selected' : '' }}>T</option>
                <option value="B" {{ $venue->type == 'B' ? 'selected' : '' }}>B</option>
                <option value="P" {{ $venue->type == 'P' ? 'selected' : '' }}>P</option>
            </select>
        </div>

        <button type="submit">Update Venue</button>
    </form>

    <a href="/venues" class="back-link">← Back to List</a>

</body>
</html>