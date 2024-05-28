<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Publication</title>
    <style>
        .container {
            padding: 20px;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="file"] {
            border: 1px solid #ccc;
            padding: 5px;
        }
        .actions {
            display: flex;
            justify-content: space-between;
        }
        .actions button {
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

@include('components.topBar')

<div class="container">
    <h1>Add Publication</h1>

    <form action="{{ route('platinum.storePublication') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        <div class="form-group">
            <label for="type-of-publication">Type of Publication *</label>
            <select id="type-of-publication" name="type-of-publication" required>
                <option value="thesis">Thesis</option>
                <option value="dissertation">Dissertation</option>
                <option value="journal">Journal</option>
                <option value="conference">Conference Paper</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author *</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="university">University *</label>
            <input type="text" id="university" name="university" required>
        </div>
        <div class="form-group">
            <label for="field">Field *</label>
            <input type="text" id="field" name="field" required>
        </div>
        <div class="form-group">
            <label for="keyword">Keyword *</label>
            <input type="text" id="keyword" name="keyword" required>
        </div>
        <div class="form-group">
            <label for="date-of-published">Date of Published *</label>
            <input type="date" id="date-of-published" name="date-of-published" required>
        </div>
        <div class="form-group">
            <label for="file">Upload Document *</label>
            <input type="file" id="file" name="file" required>
        </div>
        <div class="actions">
            <button type="button" onclick="window.location='{{ route('platinum.ownPublications') }}'">Back</button>
            <button type="submit">Post</button>
        </div>
    </form>
</div>

</body>
</html>



    

