<x-header/>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Assign Lecturer to Course</title></head>
<body>
    <form action="/lecturer-courses" method="POST">
    @csrf
    <div class="form-group">
        <label for="lecturer">Lecturer:</label>
        <select id="lecturer" name="lecturer_id" required>
            <option value="">-- Select Lecturer --</option>
            @foreach($lecturers as $lecturer)
                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="offering">Course Offering:</label>
        <select id="offering" name="offering_id" required>
            <option value="">-- Select Offering --</option>
            @foreach($offerings as $offering)
                <option value="{{ $offering->id }}">
                    {{ optional($offering->course)->course_code }} — {{ $offering->batch_code }} ({{ $offering->trimester }})
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="class_group">Class Group:</label>
        <input type="text" id="class_group" name="class_group" placeholder="e.g. L1, T1">
    </div>
    <button type="submit">Assign Lecturer</button>
    </form>
</body>
</html>