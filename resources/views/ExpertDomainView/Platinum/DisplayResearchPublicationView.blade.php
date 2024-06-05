<x-platinum-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Research and Publication Details') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .details-container {
            margin: 20px;
        }
        .details-section {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .details-section h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #007bff;
        }
        .details-section p {
            margin: 5px 0;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="details-container">
                        <div class="details-section">
                            <h2>Research Information</h2>
                            <p><strong>Research Title:</strong> {{ $research->R_title }}</p>
                        </div>
                        <div class="details-section">
                            <h2>Publication Information</h2>
                            <p><strong>Publication Type:</strong> {{ $publication
