<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Payment</title>
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
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Payment for Flight BA245</h2>
            <div class="bg-gray-50 p-6 rounded-lg mb-8 border border-gray-200">
                <div class="text-xl font-medium text-gray-800 mb-4">Total Amount: <span class="font-bold text-blue-600">$450</span></div>
                <form action="booking-confirmation.html" method="get" class="space-y-4">
                    <div>
                        <label for="card-number" class="block text-sm font-medium text-gray-700">Card Number</label>
                        <input type="text" id="card-number" placeholder="XXXX-XXXX-XXXX-XXXX" class="w-full rounded-md border-gray-300 shadow-sm p-2">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="expiry" class="block text-sm font-medium text-gray-700">Expiry Date</label>
                            <input type="text" id="expiry" placeholder="MM/YY" class="w-full rounded-md border-gray-300 shadow-sm p-2">
                        </div>
                        <div>
                            <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                            <input type="text" id="cvv" placeholder="XXX" class="w-full rounded-md border-gray-300 shadow-sm p-2">
                        </div>
                    </div>
                    <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold mt-4">Confirm Payment</button>
                </form>
            </div>
        </main>
    </div>
</body>

</html>