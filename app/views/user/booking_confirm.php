<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Booking Confirmed</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="container mx-auto p-4 md:p-8">
        <!-- Header and Navigation -->
        <header class="bg-white rounded-xl shadow-lg p-4 md:p-6 mb-8 flex flex-col md:flex-row items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Airline Dashboard</h1>
            <nav class="flex flex-wrap gap-4">
                <a href="index.html" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md">Home</a>
                <a href="my-bookings.html" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md">My Bookings</a>
                <a href="profile.html" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md">Profile</a>
                <a href="support.html" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md">Support</a>
                <a href="#" class="px-6 py-2 bg-gray-200 text-red-600 rounded-lg hover:bg-red-100 transition-colors shadow-md">Logout</a>
            </nav>
        </header>

        <!-- Main content area -->
        <main class="bg-white rounded-xl shadow-lg p-6 md:p-10">
            <div class="text-center p-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="text-3xl font-bold text-green-600 mb-2">Booking Confirmed!</h2>
                <p class="text-xl text-gray-700 mb-4">Your e-ticket has been sent to your email.</p>
                <div class="bg-green-100 p-4 rounded-lg inline-block">
                    <p class="text-lg font-medium text-green-800">Confirmation Number (PNR): <span class="font-bold">PNR12345</span></p>
                </div>
                <a href="my-bookings.html" class="mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold inline-block">View My Bookings</a>
            </div>
        </main>
    </div>
</body>

</html>