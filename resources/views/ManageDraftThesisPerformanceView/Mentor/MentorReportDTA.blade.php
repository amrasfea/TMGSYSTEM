<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>Draft Thesis Performance List</h1>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">DTP_draftNum</th>
                        <th scope="col">Thesis Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <style>
        /* Custom CSS for the card */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 50px; /* Adjust as needed */
            max-width: 800px; /* Adjust as needed */
        }

        .card-header {
            background-color: #2596be;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 0;
        }

        .card-body {
            padding: 20px;
        }

        /* Custom CSS for the table */
        .table {
            border-radius: 15px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #2596be;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-primary {
            background-color: #333;
            border-color: #333;
        }

        .btn-primary:hover {
            background-color: #2f4f4f;
            border-color: #2f4f4f;
        }

        .d-grid {
            text-align: center;
        }
    </style>

                
                <tbody>
                    @forelse($data as $performance)
                        <tr>
                            <td>{{ $performance->DTP_DraftNum }}</td>
                            <td>{{ $performance->title }}</td> <!-- Assuming `title` is a property of the performance object -->
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('AllDTAView.index') }}, ['DTP_DraftNum' => $performance->DTP_DraftNum]) }}" class="btn btn-success">View</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No results found</td>
                        </tr>
                    @endforelse

                    <tr>
                        <td>1</td>
                        <td>Thesis Title 1</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('AllDTAView.index') }}" class="btn btn-success">View</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Thesis Title 2</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('AllDTAView.index') }}" class="btn btn-success">View</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="/crmpreport" class="btn btn-primary">Generate Report Draft Thesis Performance</a>
            </div>
        </div>
    </div>
</div>

