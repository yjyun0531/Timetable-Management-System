<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Timetable</title>
    <style>
        .grid-scroll {
            overflow-x: auto;
            max-width: 100%;
            border: 1px solid #ccc;
        }
        table { border-collapse: collapse; width: max-content; min-width: 100%; font-size: 10px; }
        th, td { border: 1px solid #999; padding: 3px 4px; text-align: center; vertical-align: middle; line-height: 1.3; min-width: 28px; }
        th { background-color: #dbe5f1; font-size: 10px; white-space: nowrap; }
        td { max-width: 90px; }
        .venue-cell { background-color: #ffff99; font-weight: bold; white-space: nowrap; position: sticky; left: 0; z-index: 1; }
        .entry-L { background-color: #ffffff; }
        .entry-T { background-color: #eaf4ea; }
        .entry-P { background-color: #ff99ff; }
        .day-tabs a {
            margin-right: 8px; padding: 5px 12px; text-decoration: none; font-size: 13px;
            border: 1px solid #ccc; border-radius: 4px; color: #1F4E79;
        }
        .day-tabs a.active { background-color: #1F4E79; color: #fff; }
        .add-entry-section {
            margin-top: 30px; padding-top: 15px; border-top: 2px solid #1F4E79;
        }
        .add-entry-section h3 { color: #1F4E79; font-size: 16px; }
        .form-row { display: flex; gap: 12px; flex-wrap: wrap; margin-bottom: 10px; }
        .form-row .form-group { flex: 1; min-width: 150px; font-size: 13px; }
    </style>
</head>
<body>
    <h2>Timetable</h2>
    <a href="/timetable">View as List (Edit/Delete)</a>

    
    
    <div class="day-tabs" style="margin: 15px 0;">
        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday'] as $d)
            <a href="/timetable/grid?day={{ $d }}" class="{{ $day == $d ? 'active' : '' }}">{{ $d }}</a>
        @endforeach
    </div>

    <div class="grid-scroll">
        <table>
          <thead>
                <tr>
                    <th rowspan="2">Venue</th>
                    @php
                        $hourGroups = collect($slots)->chunk(2);
                    @endphp
                    @foreach($hourGroups as $group)
                        <th colspan="{{ $group->count() }}">{{ $group->first()[0] }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach($hourGroups as $group)
                        <th colspan="{{ $group->count() }}">{{ $group->last()[1] }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td class="venue-cell">
                            {{ $row['venue']->name }}<br>
                            <span style="font-weight:normal;font-size:9px;">{{ $row['venue']->capacity }} ({{ $row['venue']->type }})</span>
                        </td>
                        @foreach($row['cells'] as $cell)
                            @if($cell['type'] === 'entry')
                                @php $e = $cell['entry']; @endphp
                                <td colspan="{{ $cell['colspan'] }}" class="entry-{{ $e->class_type }}">
                                    {{ optional(optional($e->offering)->course)->course_code }}
                                    ({{ $e->class_type }}@if($e->class_group) {{ $e->class_group }}@endif)<br>
                                    <span style="font-size:9px;">{{ optional($e->lecturer)->name }}</span>
                                </td>
                            @else
                                <td></td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="add-entry-section">
        <h3>+ Add New Timetable Entry</h3>
        <form action="/timetable" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label for="offering">Course Offering:</label>
                <select id="offering" name="offering_id" required onchange="showStudentCount()">
                    <option value="">-- Select --</option>
                    @foreach($offerings as $offering)
                        <option value="{{ $offering->id }}" data-students="{{ $offering->num_students }}">
                            {{ optional($offering->course)->course_code }} — {{ $offering->batch_code }}
                        </option>
                    @endforeach
                </select>
                <span id="studentCountDisplay" style="font-size:12px; color:#1F4E79; font-weight:bold;"></span>
            </div>
            <div class="form-group">
                <label for="lecturer">Lecturer:</label>
                <select id="lecturer" name="lecturer_id" required>
                    <option value="">-- Select --</option>
                    @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <select id="venue" name="venue_id" required>
                    <option value="">-- Select a class type first --</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}" data-type="{{ $venue->type }}" style="display:none;">
                            {{ $venue->name }} (Cap: {{ $venue->capacity }}, {{ $venue->type }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="trimester">Trimester:</label>
                <input type="text" id="trimester" name="trimester" placeholder="e.g. Y2026T1" required>
            </div>
            <div class="form-group">
                <label for="day_of_week">Day:</label>
                <select id="day_of_week" name="day_of_week" required>
                    @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday'] as $d)
                        <option value="{{ $d }}" {{ $day == $d ? 'selected' : '' }}>{{ $d }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="time" id="start_time" name="start_time" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="time" id="end_time" name="end_time" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="class_type">Class Type:</label>
                <select id="class_type" name="class_type" required onchange="filterVenues()">
                    <option value="">-- Select --</option>
                    <option value="L">Lecture (L)</option>
                    <option value="T">Tutorial (T)</option>
                    <option value="P">Practical (P)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="class_group">Class Group:</label>
                <input type="text" id="class_group" name="class_group" placeholder="e.g. T1, P1">
            </div>
            <div class="form-group">
                <label for="week_type">Week Type:</label>
                <select id="week_type" name="week_type" required>
                    <option value="every">Every Week</option>
                    <option value="odd">Odd Week</option>
                    <option value="even">Even Week</option>
                </select>
            </div>
            <div class="form-group">
                <label><input type="checkbox" name="is_locked" value="1"> Locked</label>
            </div>
        </div>

        <button type="submit">Add to Timetable</button>
        </form>
    </div>

    <script>
        function showStudentCount() {
            const select = document.getElementById('offering');
            const display = document.getElementById('studentCountDisplay');
            const selected = select.options[select.selectedIndex];
            const count = selected.getAttribute('data-students');
            display.textContent = count ? '(' + count + ' students)' : '';
        }

        function filterVenues() {
            const classType = document.getElementById('class_type').value;
            const venueSelect = document.getElementById('venue');
            const options = venueSelect.querySelectorAll('option[data-type]');

            venueSelect.value = '';
            options.forEach(opt => {
                const venueType = opt.getAttribute('data-type');
                const allowed = (classType === 'P') ? (venueType === 'P') : (venueType !== 'P');
                opt.style.display = allowed ? '' : 'none';
            });
        }
    </script>
    @if(session('error'))
    <script>
        alert(@json(session('error')));
    </script>
    @endif
</body>
</html>