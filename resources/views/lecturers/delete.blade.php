<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Lecturer</title>
</head>
<body>

    <div class="confirm-box">
        <p>Are you sure you want to delete <strong>{{ $lecturer->name }}</strong>?</p>
        <form action="/lecturers/{{ $lecturer->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Yes, Delete</button>
        </form>
    </div>

    <a href="/lecturers" class="back-link">Cancel</a>

</body>
</html>