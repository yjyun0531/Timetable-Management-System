<x-header/>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Venue</title>
    <style>
      
    </style>
</head>
<body>

    <form action="/venues" method="POST">
    @csrf
    
    <div class="form-group">
        <label for="venue_name">Venue Name:</label>
        <input type="text" id="venue_name" name="name" placeholder="e.g. KB123" required>
    </div>


    <div class="form-group">
        <label for="venue_capacity">Venue Capacity:</label>
        <input type="text" id="venue_capacity" name="capacity" placeholder="e.g. 40" required>
    </div>

    <div class="form-group">
        <label for="venue_type">Venue Type:</label>
        <select id="venue_type" name="type" required>
            <option value="">-- Select a Type --</option>
            <option value="L" {{ old('type') == 'L' ? 'selected' : '' }}>L</option>
            <option value="T" {{ old('type') == 'T' ? 'selected' : '' }}>T</option>
            <option value="B" {{ old('type') == 'B' ? 'selected' : '' }}>B</option>
            <option value="P" {{ old('type') == 'P' ? 'selected' : '' }}>P</option>
        </select>
    </div>

    <button type="submit">Save Venue</button>
    </form> <a href="/venues" class="back-link">← Back to List</a>
</body>
</html>