<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeeklyFocus</title>
</head>
<body>
<h1 id="main_title" style="text-align: center;">Weekly Focus</h1>
    <div class="view-container">
        <h2>Focus Blocks</h2>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr class="view-table-header">
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Title</th>
                    <th style="text-align: center;">Description</th>
                    <th style="text-align: center;">Date</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>

            <style>
                .btn-group {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .btn-group .btn {
                        margin-right: 10px; /* Adjust the margin as needed */
                    }
                    
            </style>

            <tbody>
                @foreach ($weeklyFocuses as $focus)
                    <tr>
                        <td>{{ $focus->id }}</td>
                        <td>{{ $focus->WF_topic }}</td>
                        <td>{{ $focus->WF_description }}</td>
                        <td>{{ $focus->WF_date }}</td>
                        <td style="text-align: center;">
                            <!-- Edit button -->
                            <button type="button" class="btn btn-warning" onclick="openEditModal({{ $focus->id }})">Edit</button>

                            <!-- Delete button -->
                            <form action="{{ route('weeklyFocus.delete', $focus->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <!-- Add button -->
                            <a href="{{ route('weeklyFocus.add', $focus->id) }}" class="btn btn-primary">Add</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>