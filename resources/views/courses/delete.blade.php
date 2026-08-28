<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Course</title>
</head>
<body>
    <div class="confirm-box">
        <p>Are you sure you want to delete <strong>{{ $course->course_code }} — {{ $course->course_name }}</strong>?</p>

        <form action="/courses/{{ $course->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Yes, Delete</button>
        </form>
    </div>
    <a href="/courses" class="back-link">Cancel</a>

</body>
</html>