<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Venue</title>
</head>
<body>

    <div class="confirm-box">
        <p>Are you sure you want to delete <strong>{{ $venue->name }}</strong>?</p>
        <form action="/venues/{{ $venue->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Yes, Delete</button>
        </form>
    </div>

    <a href="/venues" class="back-link">Cancel</a>

</body>
</html>