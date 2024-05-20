<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        ::after,
        ::before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        h1 {
            font-weight: 600;
            font-size: 1.5rem;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            /* Remove default margin */
            height: 100vh;
            /* Ensure body takes full height */
            overflow: hidden;
            /* Prevent body overflow to manage scrolling in main content */
        }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
            /* Prevent overflow on the wrapper */
        }

        .main {
            width: 100%;
            overflow-y: auto;
            /* Allow vertical scrolling */
            transition: all 0.35s ease-in-out;
            background-color: #fafbfe;
            padding: 20px;
            /* Add padding for content spacing */
            z-index: 1;
            /* Ensure main content is below the sidebar */
        }

        #sidebar {
            width: 70px;
            min-width: 70px;
            height: 100vh;
            /* Ensure sidebar takes full height */
            z-index: 1000;
            /* Ensure sidebar is on top */
            transition: all 0.25s ease-in-out;
            background-color: #FFDB58;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            /* Allow scrolling within the sidebar */
            position: relative;
        }

        #sidebar.expand {
            width: 260px;
            min-width: 260px;
        }

        .toggle-btn {
            background-color: transparent;
            cursor: pointer;
            border: 0;
            padding: 1rem 1.5rem;
        }

        .toggle-btn i {
            font-size: 1.5rem;
            color: #0e2238;
        }

        .sidebar-logo {
            margin: auto 0;
            color: #0e2238;
        }

        .sidebar-logo a {
            color: #0e2238;
            font-size: 1.15rem;
            font-weight: 600;
        }

        #sidebar:not(.expand) .sidebar-logo,
        #sidebar:not(.expand) a.sidebar-link span {
            display: none;
        }

        .sidebar-nav {
            padding: 2rem 0;
            flex: 1 1 auto;
        }

        a.sidebar-link {
            padding: 0.625rem 1.625rem;
            color: #0e2238;
            display: block;
            font-size: 0.9rem;
            white-space: nowrap;
            border-left: 3px solid transparent;
            position: relative;
            z-index: 1;
            /* Ensure sidebar links are clickable */
        }

        .sidebar-link i {
            font-size: 1.1rem;
            margin-right: 0.75rem;
            color: #0e2238;
        }

        a.sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.075);
            border-left: 3px solid #3b7ddd;
        }

        .sidebar-item {
            position: relative;
        }

        #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
            position: absolute;
            top: 0;
            left: 70px;
            background-color: #FFDB58;
            padding: 0;
            min-width: 15rem;
            display: none;
            z-index: 1;
            /* Ensure dropdowns are clickable */
        }

        #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
            display: block;
            max-height: 15em;
            width: 100%;
            opacity: 1;
            overflow-y: auto;
            /* Allow scrolling within the dropdown */
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 0.075rem 0.075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all 0.2s ease-out;
        }

        #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all 0.2s ease-out;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Thesis Master Gate</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Profile</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                        My Profile
                                    </a>
                                    <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a href="#" class="sidebar-link">Other Staff Profile</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>

                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Personal</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Other Platinum Profile</a>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#expertDomainDropdown" aria-expanded="false" aria-controls="expertDomainDropdown">
                        <i class="lni lni-agenda"></i>
                        <span>Expert Domain</span>
                    </a>
                    <ul id="expertDomainDropdown" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">New Expert</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">List Own Expert</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">List All Expert</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Report</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#publicationDropdown" aria-expanded="false" aria-controls="publicationDropdown">
                        <i class="lni lni-layout"></i>
                        <span>Publication Data</span>
                    </a>
                    <ul id="publicationDropdown" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">New Publication</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">List Own Publications</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">List All Publications</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#progressDropdown" aria-expanded="false" aria-controls="progressDropdown">
                        <i class="lni lni-popup"></i>
                        <span>Progress Monitoring</span>
                    </a>
                    <ul id="progressDropdown" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Draft Thesis Performance</a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#weeklyFocusDropdown" aria-expanded="false" aria-controls="weeklyFocusDropdown">
                                Weekly Focus
                            </a>
                            <ul id="weeklyFocusDropdown" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Focus Block </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Social Block</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Admin Block</a>
                                </li>

                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Recovery Block</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main p-3">


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <script>
                document.querySelector(".toggle-btn").addEventListener("click", function() {
                    document.querySelector("#sidebar").classList.toggle("expand");
                });
            </script>
</body>

</html>