<x-header/>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Delete Timetable Entry</title></head>
<body>
    <div class="confirm-box">
        <p>Are you sure you want to delete this entry:
        <strong>{{ optional(optional($entry->offering)->course)->course_code }} — {{ $entry->day_of_week }} {{ $entry->start_time }}-{{ $entry->end_time }} ({{ optional($entry->venue)->name }})</strong>?</p>
        <form action="/timetable/{{ $entry->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Yes, Delete</button>
        </form>
    </div>
    <a href="/timetable">Cancel</a>
</body>
</html>