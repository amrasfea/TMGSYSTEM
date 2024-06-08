<main>
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
                    margin-right: 10px;
                }
            </style>

            <tbody>
                @foreach ($weeklyFocuses as $focus)
                    <tr>
                        <td>{{ $focus->id }}</td>
                        <td>{{ $focus->FB_BlockType }}</td>
                        <td>{{ $focus->FB_BlockDesc }}</td>
                        <td>{{ $focus->FB_StartDate }} to {{ $focus->FB_EndDate }}</td>
                        <td style="text-align: center;">
                            <div class="btn-group">
                                <a href="{{ route('weeklyFocus.edit', $focus->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('weeklyFocus.delete', $focus->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('weeklyFocus.add') }}" class="btn btn-primary">Add</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
