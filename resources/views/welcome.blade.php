<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thesis Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            font-family: 'Figtree', sans-serif;
            background: whitesmoke; /* Soft blue-gray background */
            color: #333;
        }

        header {
            background: #FFE280; /* Blue color */
            color: black;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header .container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        header .text-lg {
            font-size: 1.5rem;
            font-weight: 600;
            text-align: center;
        }

        nav {
            margin-left: auto;
        }

        nav a {
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        nav a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        main {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 4rem 0;
        }

        main .welcome-text {
            background: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
            margin-bottom: 2rem;
        }

        main .welcome-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #0e2238; /* Blue color */
        }

        main .welcome-text p {
            font-size: 1.125rem;
            color: #555;
        }

        main .picture {
            margin-bottom: 2rem;
        }

        footer {
            background-color: #FFE280; /* Blue color */
            color: black;
            padding: 1rem 0;
            text-align: center;
            margin-top: auto;
        }

        footer div {
            font-size: 0.875rem;
        }

        /* Add dark mode styles */
        body.dark-mode {
            background: #1e293b;
            color: #cbd5e1;
        }

        body.dark-mode header {
            background: #334155;
        }

        body.dark-mode main .welcome-text {
            background: #334155;
            color: #cbd5e1;
        }

        body.dark-mode footer {
            background-color: #334155;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="shadow-md">
            <div class="container mx-auto flex justify-center items-center px-4">
                <div class="text-lg font-semibold">
                    Thesis Management System
                </div>
                <nav class="flex space-x-4">
                    @if (Route::has('login'))
                        @auth
                            @if (auth()->user()->roleType === 'Platinum')
                                <a href="{{ route('platinum.dashboard') }}" class="hover:text-gray-300">
                                    Dashboard
                                </a>
                            @elseif (auth()->user()->roleType === 'Staff')
                                <a href="{{ route('staff.dashboard') }}" class="hover:text-gray-300">
                                    Dashboard
                                </a>
                            @elseif (auth()->user()->roleType === 'Mentor')
                                <a href="{{ route('mentor.dashboard') }}" class="hover:text-gray-300">
                                    Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="hover:text-gray-300" style="color: #0e2238;">
                                Log in
                            </a>
                           
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-4 py-6">
            
            <div class="welcome-text">
                <h1 class="text-3xl font-bold mb-4">Welcome to the Thesis Management System</h1>
                <p class="text-lg mb-6">
                    Manage your thesis projects efficiently and effectively.
                </p>
            </div>
        </main>

        <!-- Footer -->
        <footer>
            <div class="container mx-auto">
                &copy; 2024 Thesis Management System. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>

