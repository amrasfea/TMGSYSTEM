<x-platinum-layout>

@section('title', 'Add Publication')

@section('content')
<div class="container">
    <h2>Add Publication</h2>
    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="PB_Type" class="form-label">Type of Publication</label>
            <select class="form-control" id="PB_Type" name="PB_Type" required>
                <option value="">Select Type</option>
                <option value="Journal">Journal</option>
                <option value="Conference">Conference</option>
                <option value="Book">Book</option>
                <option value="Thesis">Thesis</option>
                <option value="Report">Report</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="PB_Title" class="form-label">Publication Title</label>
            <input type="text" class="form-control" id="PB_Title" name="PB_Title" required>
        </div>
        <div class="form-group mb-3">
            <label for="PB_Author" class="form-label">Author</label>
            <input type="text" class="form-control" id="PB_Author" name="PB_Author" required>
        </div>
        <div class="form-group mb-3">
            <label for="PB_Uni" class="form-label">University</label>
            <input type="text" class="form-control" id="PB_Uni" name="PB_Uni" required>
        </div>
        <div class="form-group mb-3">
            <label for="PB_Course" class="form-label">Field/Course</label>
            <input type="text" class="form-control" id="PB_Course" name="PB_Course" required>
        </div>
        <div class="form-group mb-3">
            <label for="PB_Keyword" class="form-label">Description</label>
            <input type="text" class="form-control" id="PB_Keyword" name="PB_Keyword" required>
        </div>
        <div class="form-group mb-3">
            <label for="PB_Date" class="form-label">Date of Publish</label>
            <input type="date" class="form-control" id="PB_Date" name="PB_Date" required>
        </div>
        <div class="form-group mb-3">
            <label for="PB_File" class="form-label">Upload File</label>
            <input type="file" class="form-control" id="PB_File" name="PB_File" accept=".pdf,.doc,.docx">
        </div>
        <button type="submit" class="btn btn-primary">Add Publication</button>
        <a href="{{ route('publications.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
</x-platinum-layout>
