<x-header/>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Remove Assignment</title></head>
<body>
    <p>Remove <strong>{{ optional($assignment->lecturer)->name }}</strong> from
       <strong>{{ optional(optional($assignment->offering)->course)->course_code }} ({{ optional($assignment->offering)->batch_code }})</strong>?</p>
    <form action="/lecturer-courses/{{ $assignment->lecturer_id }}/{{ $assignment->offering_id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Remove</button>
    </form>
    <a href="/lecturer-courses">Cancel</a>
</body>
</html>