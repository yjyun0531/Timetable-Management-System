<x-header/>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Timetable Entry</title></head>
<body>
    <form action="/timetable/{{ $entry->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="offering">Course Offering:</label>
            <select id="offering" name="offering_id" required>
                @foreach($offerings as $offering)
                    <option value="{{ $offering->id }}" {{ $entry->offering_id == $offering->id ? 'selected' : '' }}>
                        {{ optional($offering->course)->course_code }} — {{ $offering->batch_code }} ({{ $offering->trimester }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="lecturer">Lecturer:</label>
            <select id="lecturer" name="lecturer_id" required>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}" {{ $entry->lecturer_id == $lecturer->id ? 'selected' : '' }}>
                        {{ $lecturer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="venue">Venue:</label>
            <select id="venue" name="venue_id" required>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{ $entry->venue_id == $venue->id ? 'selected' : '' }}>
                        {{ $venue->name }} (Cap: {{ $venue->capacity }}, {{ $venue->type }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="trimester">Trimester:</label>
            <input type="text" id="trimester" name="trimester" value="{{ $entry->trimester }}" required>
        </div>
        <div class="form-group">
            <label for="day_of_week">Day:</label>
            <select id="day_of_week" name="day_of_week" required>
                @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday'] as $day)
                    <option value="{{ $day }}" {{ $entry->day_of_week == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time" value="{{ $entry->start_time }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="time" id="end_time" name="end_time" value="{{ $entry->end_time }}" required>
        </div>
        <div class="form-group">
            <label for="class_type">Class Type:</label>
            <select id="class_type" name="class_type" required>
                <option value="L" {{ $entry->class_type == 'L' ? 'selected' : '' }}>Lecture (L)</option>
                <option value="T" {{ $entry->class_type == 'T' ? 'selected' : '' }}>Tutorial (T)</option>
                <option value="P" {{ $entry->class_type == 'P' ? 'selected' : '' }}>Practical (P)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="class_group">Class Group:</label>
            <input type="text" id="class_group" name="class_group" value="{{ $entry->class_group }}">
        </div>
        <div class="form-group">
            <label for="week_type">Week Type:</label>
            <select id="week_type" name="week_type" required>
                <option value="every" {{ $entry->week_type == 'every' ? 'selected' : '' }}>Every Week</option>
                <option value="odd" {{ $entry->week_type == 'odd' ? 'selected' : '' }}>Odd Week</option>
                <option value="even" {{ $entry->week_type == 'even' ? 'selected' : '' }}>Even Week</option>
            </select>
        </div>
        <div class="form-group">
            <label><input type="checkbox" name="is_locked" value="1" {{ $entry->is_locked ? 'checked' : '' }}> Locked</label>
        </div>
        <button type="submit">Update Entry</button>
    </form>
    <a href="/timetable">← Back to List</a>
</body>
</html>