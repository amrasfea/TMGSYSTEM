<x-platinum-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Publication') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 8%;
        }
        .title {
            display: inline-block;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 5px;
            border-bottom: 3px solid var(--yellow-color); /* Yellow line outline */
        }
        .search-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .search-bar input {
            width: 80%;
            padding: 10px;
            font-size: 16px;
            border: #ccc;
            border-radius: 4px;
            outline: none;
        }
        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-bar button:hover {
            background-color: #0056b3;
        }
        .results .result-item {
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        .result-item h2 {
            font-size: 18px;
            color: #333;
            margin: 0;
        }
        .result-item p {
            font-size: 14px;
            color: #666;
            margin: 5px 0;
        }
        .actions span {
            font-size: 12px;
            color: #007BFF;
            cursor: pointer;
        }
        .actions span:hover {
            text-decoration: underline;
        }
        .actions span:not(:last-child)::after {
            content: "|";
            margin: 0 5px;
            color: #ccc;
        }
        .related-searches {
            margin-top: 20px;
        }
        .related-searches span {
            font-size: 14px;
            color: #333;
        }
        .related-searches a {
            font-size: 14px;
            color: #007BFF;
            text-decoration: none;
        }
        .related-searches a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <form action="{{ route('publications.search') }}" method="GET" class="search-bar">
            <input type="text" name="query" placeholder="Title of Publication" value="{{ request('query') }}">
            <button type="submit">SEARCH</button>
        </form>

        <div class="results">
            @forelse($publications as $publication)
                <div class="result-item">
                    <h2>{{ $publication->PB_Title }}</h2>
                    <p><b>{{ $publication->PB_Author }}</b> - {{ $publication->PB_Uni }}</p>
                    <p>{{ $publication->PB_Detail }}</p>
                    <div class="actions">
                        <a href="{{ route('publications.show', ['id' => $publication->PB_ID, 'backUrl' => route('publications.search', ['query' => request('query')])]) }}" class="text-green-600 hover:text-green-900">{{ __('View') }}</a>
                    </div>
                </div>
            @empty
                <p>No publications found for your search query.</p>
            @endforelse
        </div>

        <div class="related-searches">
            <span>Related searches:</span> <a href="#">mathematics</a>, <a href="#">computer science</a>, <a href="#">procedia computer science</a>
        </div>
    </div>
</x-platinum-layout>
