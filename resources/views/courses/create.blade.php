<x-header/>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Department</title>
    <style>
      
    </style>
</head>
<body>

    <form action="/courses" method="POST">
    @csrf
    
    <div class="form-group">
        <label for="department">Department:</label>
        <select id="department" name="department_id" required>
            <option value="">-- Select a Department --</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">
                    {{ $department->name }} ({{ $department->code }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="course_code">Course Code:</label>
        <input type="text" id="course_code" name="course_code" placeholder="e.g. SOFT101" required>
    </div>

    <div class="form-group">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" placeholder="e.g. Introduction to Programming" required>
    </div>

    <div class="form-group">
        <label for="description">Course Description:</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter course details..."></textarea>
    </div>

    <div class="form-group">
        <label for="lecture_hours">Lecture Hours Per Week:</label>
        <input type="number" id="lecture_hours" name="lecture_hours" min="0" step="0.5" value="0">
    </div>

    <div class="form-group">
        <label for="tutorial_hours">Tutorial Hours Per Week:</label>
        <input type="number" id="tutorial_hours" name="tutorial_hours" min="0" step="0.5" value="0">
    </div>

    <div class="form-group">
        <label for="practical_hours">Practical Hours Per Week:</label>
        <input type="number" id="practical_hours" name="practical_hours" min="0" step="0.5" value="0">
    </div>

    <div class="form-group">
        <label for="course_category">Category:</label>
        <select id="course_category" name="course_category" required>
            <option value="normal">Normal</option>
            <option value="MPU">MPU</option>
        </select>
    </div>

    <div class="form-group">
        <label><input type="checkbox" id="is_elective" name="is_elective" value="1"> Elective</label>
    </div>

    <div class="form-group">
        <label for="required_choices">Required Choices (X):</label>
        <input type="number" id="required_choices" name="required_choices" min="1" placeholder="e.g. 2">
    </div>

    <div class="form-group">
        <label for="elective_pool_size">Elective Pool Size (Y):</label>
        <input type="number" id="elective_pool_size" name="elective_pool_size" min="1" placeholder="e.g. 20">
    </div>

    <div class="form-group">
        <button type="submit">Submit Course</button>
    </div>

</form>
</body>
</html>