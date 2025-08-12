<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Flight Results</title>
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
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Available Flights</h2>
            <div class="space-y-4">
                <!-- Example Flight 1 -->
                <div class="bg-blue-50 p-4 rounded-lg shadow-sm border border-blue-200 flex flex-col sm:flex-row justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">British Airways - BA245</h3>
                        <p class="text-sm text-gray-600">Bangkok (BKK) → Tokyo (HND)</p>
                        <p class="text-xs text-gray-500">10:00 AM - 6:00 PM</p>
                    </div>
                    <div class="text-right mt-4 sm:mt-0">
                        <p class="text-xl font-bold text-blue-600">$450</p>
                        <a href="booking-form.html" class="book-btn px-4 py-1 mt-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors inline-block">Book</a>
                    </div>
                </div>
                <!-- Example Flight 2 -->
                <div class="bg-blue-50 p-4 rounded-lg shadow-sm border border-blue-200 flex flex-col sm:flex-row justify-between items-center">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Japan Airlines - JL708</h3>
                        <p class="text-sm text-gray-600">Bangkok (BKK) → Tokyo (NRT)</p>
                        <p class="text-xs text-gray-500">11:30 AM - 7:30 PM</p>
                    </div>
                    <div class="text-right mt-4 sm:mt-0">
                        <p class="text-xl font-bold text-blue-600">$510</p>
                        <a href="booking-form.html" class="book-btn px-4 py-1 mt-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors inline-block">Book</a>
                    </div>
                </div>
            </div>
            <a href="index.html" class="mt-8 px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md inline-block">← Back to Search</a>
        </main>
    </div>
</body>

</html>