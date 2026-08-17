<x-header/>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course Offering</title>
</head>
<body>

    <form action="/course-offerings" method="POST">
    @csrf

    <div class="form-group">
        <label for="course">Course:</label>
        <select id="course" name="course_id" required>
            <option value="">-- Select a Course --</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">
                    {{ $course->course_code }} — {{ $course->course_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="batch_code">Batch Code:</label>
        <input type="text" id="batch_code" name="batch_code" placeholder="e.g. SEY3Y3" required>
    </div>

    <div class="form-group">
        <label for="trimester">Trimester:</label>
        <input type="text" id="trimester" name="trimester" placeholder="e.g. Y2026T1" required>
    </div>

    <div class="form-group">
        <label for="num_students">Number of Students:</label>
        <input type="number" id="num_students" name="num_students" min="0" required>
    </div>

    <div class="form-group">
        <label><input type="checkbox" id="is_shared_programme" name="is_shared_programme" value="1"> Shared Across Programmes</label>
    </div>

    <div class="form-group">
        <button type="submit">Submit Course Offering</button>
    </div>

    </form>
</body>
</html>