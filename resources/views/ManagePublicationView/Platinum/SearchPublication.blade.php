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
    /* background-color: #333; */
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
        <h2 class="title">LIST OF PUBLICATION</h2><br>
        <div class="search-bar">
            <input type="text" placeholder="Title of Publication">
            <button>SEARCH</button>
        </div>
        <div class="results">
            <div class="result-item">
                <h2>Some <b>computer science</b> issues in ubiquitous <b>computing</b></h2>
                <p><b>M Weiser</b> - Communications of the ACM, 1993 - dl.acm.org</p>
                <p>... existing <b>computer science</b>. The fruitfulness of ubiquitous <b>computing</b> for new <b>computer science</b> ...</p>
                <p>... The following subsections "ascend" the levels of organization of a <b>computer</b> system, from ...</p>
                <div class="actions">
                    <span>Save</span> | <span>Cite</span> | <span>Cited by 4413</span> | <span>Related articles</span> | <span>All 10 versions</span> | <span>Web of Science: 841</span>
                </div>
            </div>
            <div class="result-item">
                <h2>[BOOK] Foundations of <b>computer science</b></h2>
                <p><b>AV Aho, JD Ullman</b> - 1992 - dl.acm.org</p>
                <p>... computing to students. Non-majors get an exceptionally lucid view of <b>computing</b> without experiencing the “<b>computer science</b>” ...</p>
                <p>... by all instructors of introductory <b>computer science</b> courses. ...</p>
                <div class="actions">
                    <span>Save</span> | <span>Cite</span> | <span>Cited by 395</span> | <span>Related articles</span> | <span>All 4 versions</span>
                </div>
            </div>
            <div class="result-item">
                <h2>Monographs in <b>Computer Science</b></h2>
                <p><b>D Gries, FB Schneider</b> - 2008 - Springer</p>
                <p>... Pascal was chosen because it is about the only programming language more or less widely available outside <b>computer science</b> environments. The book features an extensive ...</p>
                <div class="actions">
                    <span>Save</span> | <span>Cite</span> | <span>Cited by 784</span> | <span>Related articles</span> | <span>All 17 versions</span>
                </div>
            </div>
        </div>
        <div class="related-searches">
            <span>Related searches:</span> <a href="#">mathematics</a>, <a href="#">computer science</a>, <a href="#">procedia computer science</a>
        </div>
    </div>


</x-platinum-layout>    