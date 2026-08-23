<x-header/>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Delete Course Offering</title></head>
<body>
    <p>Are you sure you want to delete the offering of
       <strong>{{ optional($offering->course)->course_code }} ({{ $offering->batch_code }}, {{ $offering->trimester }})</strong>?</p>
    <form action="/course-offerings/{{ $offering->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Delete</button>
    </form>
    <a href="/course-offerings">Cancel</a>
</body>
</html>