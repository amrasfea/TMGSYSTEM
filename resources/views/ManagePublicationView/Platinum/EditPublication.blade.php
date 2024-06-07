<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Publication</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ced4da;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Publication</h2>
        <form action="{{ route('publications.update', $publication->PB_ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="PB_Type" class="form-label">Type of Publication</label>
                <select class="form-control" id="PB_Type" name="PB_Type" required>
                    <option value="">Select Type</option>
                    <option value="Journal" {{ $publication->PB_Type == 'Journal' ? 'selected' : '' }}>Journal</option>
                    <option value="Conference" {{ $publication->PB_Type == 'Conference' ? 'selected' : '' }}>Conference</option>
                    <option value="Book" {{ $publication->PB_Type == 'Book' ? 'selected' : '' }}>Book</option>
                    <option value="Thesis" {{ $publication->PB_Type == 'Thesis' ? 'selected' : '' }}>Thesis</option>
                    <option value="Report" {{ $publication->PB_Type == 'Report' ? 'selected' : '' }}>Report</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="PB_Title" class="form-label">Publication Title</label>
                <input type="text" class="form-control" id="PB_Title" name="PB_Title" value="{{ $publication->PB_Title }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="PB_Author" class="form-label">Author</label>
                <input type="text" class="form-control" id="PB_Author" name="PB_Author" value="{{ $publication->PB_Author }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="PB_Uni" class="form-label">University</label>
                <input type="text" class="form-control" id="PB_Uni" name="PB_Uni" value="{{ $publication->PB_Uni }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="PB_Course" class="form-label">Field/Course</label>
                <input type="text" class="form-control" id="PB_Course" name="PB_Course" value="{{ $publication->PB_Course }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="PB_Keyword" class="form-label">Description</label>
                <input type="text" class="form-control" id="PB_Keyword" name="PB_Keyword" value="{{ $publication->PB_Keyword }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="PB_Date" class="form-label">Date of Publish</label>
                <input type="date" class="form-control" id="PB_Date" name="PB_Date" value="{{ $publication->PB_Date }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="PB_File" class="form-label">Upload File</label>
                <input type="file" class="form-control" id="PB_File" name="PB_File" accept=".pdf,.doc,.docx">
            </div>
            <button type="submit" class="btn btn-primary">Update Publication</button>
        </form>
    </div>
</body>
</html>
