<x-header/>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Course Offering</title></head>
<body>
    <form action="/course-offerings/{{ $offering->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course">Course:</label>
            <select id="course" name="course_id" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $offering->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->course_code }} — {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="batch_code">Batch Code:</label>
            <input type="text" id="batch_code" name="batch_code" value="{{ $offering->batch_code }}" required>
        </div>
        <div class="form-group">
            <label for="trimester">Trimester:</label>
            <input type="text" id="trimester" name="trimester" value="{{ $offering->trimester }}" required>
        </div>
        <div class="form-group">
            <label for="num_students">Number of Students:</label>
            <input type="number" id="num_students" name="num_students" min="0" value="{{ $offering->num_students }}" required>
        </div>
        <div class="form-group">
            <label><input type="checkbox" name="is_shared_programme" value="1" {{ $offering->is_shared_programme ? 'checked' : '' }}> Shared Across Programmes</label>
        </div>
        <button type="submit">Update Course Offering</button>
    </form>
    <a href="/course-offerings">← Back to List</a>
</body>
</html>