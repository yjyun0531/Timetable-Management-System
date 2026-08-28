<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
</head>
<body>

    <h2>Edit Course</h2>

    <form action="/courses/{{ $course->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="department">Department:</label>
            <select id="department" name="department_id" required>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ $course->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }} ({{ $department->code }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="course_code">Course Code:</label>
            <input type="text" id="course_code" name="course_code" value="{{ old('course_code', $course->course_code) }}" required>
        </div>

        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" value="{{ old('course_name', $course->course_name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="lecture_hours">Lecture Hours:</label>
            <input type="number" id="lecture_hours" name="lecture_hours" min="0" step="0.5" value="{{ old('lecture_hours', $course->lecture_hours) }}">
        </div>

        <div class="form-group">
            <label for="tutorial_hours">Tutorial Hours:</label>
            <input type="number" id="tutorial_hours" name="tutorial_hours" min="0" step="0.5" value="{{ old('tutorial_hours', $course->tutorial_hours) }}">
        </div>

        <div class="form-group">
            <label for="practical_hours">Practical Hours:</label>
            <input type="number" id="practical_hours" name="practical_hours" min="0" step="0.5" value="{{ old('practical_hours', $course->practical_hours) }}">
        </div>

        <div class="form-group">
            <label for="course_category">Category:</label>
            <select id="course_category" name="course_category" required>
                <option value="normal" {{ $course->course_category == 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="MPU" {{ $course->course_category == 'MPU' ? 'selected' : '' }}>MPU</option>
            </select>
        </div>

        <div class="form-group">
            <label><input type="checkbox" name="is_elective" value="1" {{ $course->is_elective ? 'checked' : '' }}> Elective</label>
        </div>

        <div class="form-group">
            <label for="required_choices">Required Choices (X):</label>
            <input type="number" id="required_choices" name="required_choices" min="1" value="{{ old('required_choices', $course->required_choices) }}">
        </div>

        <div class="form-group">
            <label for="elective_pool_size">Elective Pool Size (Y):</label>
            <input type="number" id="elective_pool_size" name="elective_pool_size" min="1" value="{{ old('elective_pool_size', $course->elective_pool_size) }}">
        </div>

        <button type="submit">Update Course</button>
    </form>

    <a href="/courses" class="back-link">← Back to List</a>

</body>
</html>