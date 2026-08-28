<x-header/>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Department</title>
</head>
<body>
<div class="confirm-box">
    <p>Are you sure you want to delete <strong>{{ $department->name }} ({{ $department->code }})</strong>?</p>

    <form action="/departments/{{ $department->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Delete</button>
    </form>
</div>
    <a href="/departments" class="back-link">Cancel</a>

</body>
</html>