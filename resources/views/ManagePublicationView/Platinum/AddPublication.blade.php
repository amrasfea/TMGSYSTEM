<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Publication') }}
        </h2>
    </x-slot>

    <style>
        /* Add your styles here */
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-container">
                            <div class="form-section">
                                <h2>Publication Information</h2>

                                <label for="type-of-publication">Type of Publication</label>
                                <select id="type-of-publication" name="type-of-publication" required>
                                    <option value="">Select Type</option>
                                    <option value="Journal">Journal</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Book">Book</option>
                                    <option value="Thesis">Thesis</option>
                                    <option value="Report">Report</option>
                                </select>

                                <label for="title">Publication Title</label>
                                <input type="text" id="title" name="title" required>

                                <label for="author">Author</label>
                                <input type="text" id="author" name="author" required>

                                <label for="university">University</label>
                                <input type="text" id="university" name="university" required>

                                <label for="field">Field/Course</label>
                                <input type="text" id="field" name="field" required>

                                <label for="detail">Description</label>
                                <input type="text" id="detail" name="detail" required>

                                <label for="page-number">Page Number</label>
                                <input type="text" id="page-number" name="page-number" required>

                                <label for="date-of-published">Date of Publish</label>
                                <input type="date" id="date-of-published" name="date-of-published" required>

                                <div>
                                    <input type="submit" value="Add Publication">
                                </div>
                            </div>

                            <div class="form-section">
                                <h2>Upload Document</h2>
                                <label for="file">Upload File</label>
                                <input type="file" id="file" name="file" accept=".pdf,.doc,.docx" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>

