<x-header/>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Assignment</title></head>
<body>
    <form action="/lecturer-courses/{{ $assignment->lecturer_id }}/{{ $assignment->offering_id }}/{{ $assignment->class_group }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="lecturer">Lecturer:</label>
            <select id="lecturer" name="lecturer_id" required>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}" {{ $assignment->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="offering">Course Offering:</label>
            <select id="offering" name="offering_id" required>
                @foreach($offerings as $offering)
                    <option value="{{ $offering->id }}" {{ $assignment->offering_id == $offering->id ? 'selected' : '' }}>
                        {{ optional($offering->course)->course_code }} — {{ $offering->batch_code }} ({{ $offering->trimester }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="class_group">Class Group:</label>
            <input type="text" id="class_group" name="class_group" value="{{ $assignment->class_group }}">
        </div>
        <button type="submit">Update Assignment</button>
    </form>
    <a href="/lecturer-courses">← Back to List</a>
</body>
</html>