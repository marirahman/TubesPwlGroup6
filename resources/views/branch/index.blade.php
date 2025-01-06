<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Branch List</h1>
        <a href="{{ route('branches.create') }}" class="btn btn-primary mb-3">Add New Branch</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Branch Name</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($branches as $index => $branch)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $branch->name }}</td>
                        <td>{{ $branch->location }}</td>
                        <td>
                            <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No branches available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
