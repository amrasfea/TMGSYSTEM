@extends('layouts.app')

@section('content')
<main>
    <h1 id="main_title" style="text-align: center;">Weekly Focus</h1>
    <div class="view-container">
        <h2>Focus Block</h2>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr class="view-table-header">
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Title</th>
                    <th style="text-align: center;">Description</th>
                    <th colspan="3" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($focusBlocks as $block)
                    <tr>
                        <td>{{ $block->FB_WeeklyFocusID }}</td>
                        <td>{{ $block->FB_BlockType }}</td>
                        <td>{{ $block->FB_BlockDesc }}</td>
                        <td style="text-align: center;"><button type="button" class="btn btn-warning edit-button" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $block->FB_WeeklyFocusID }}">Add</button></td>
                        <td style="text-align: center;"><button type="button" class="btn btn-warning edit-button" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $block->FB_WeeklyFocusID }}">Edit</button></td>
                        <td style="text-align: center;"><button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $block->FB_WeeklyFocusID }}">Delete</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
