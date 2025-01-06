<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Branch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Branch</h1>
        <form action="{{ route('branches.update', $branch->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Branch Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $branch->name }}" required>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $branch->location }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
