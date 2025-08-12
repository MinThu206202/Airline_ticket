<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }
    </style>
</head>

<body class="flex min-h-screen">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-slate-800 text-white p-6 shadow-lg hidden md:block">
        <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>
        <nav class="space-y-2">
            <a href="admin-dashboard.html" class="block px-4 py-2 bg-slate-700 rounded-lg font-medium hover:bg-slate-600 transition-colors">Dashboard</a>
            <a href="admin-flight-management.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Flight Management</a>
            <a href="admin-booking-management.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Booking Management</a>
            <a href="admin-passenger-management.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Passenger Management</a>
            <a href="admin-payment-records.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Payment Records</a>
            <a href="admin-reports.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Reports & Analytics</a>
            <a href="admin-user-management.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">User Management</a>
            <a href="admin-settings.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Settings</a>
            <div class="pt-4">
                <a href="#" class="block px-4 py-2 text-red-400 hover:bg-slate-700 transition-colors rounded-lg">Logout</a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                <p class="text-gray-500">Total Bookings</p>
                <p class="text-3xl font-bold text-gray-800">1,250</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                <p class="text-gray-500">Total Revenue</p>
                <p class="text-3xl font-bold text-gray-800">$1,500,000</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                <p class="text-gray-500">Active Flights</p>
                <p class="text-3xl font-bold text-gray-800">55</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500">
                <p class="text-gray-500">Pending Issues</p>
                <p class="text-3xl font-bold text-gray-800">8</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Recent Activity</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-4">New booking from John Doe for flight BA245.</li>
                <li class="py-4">Flight TG660 delayed by 30 minutes.</li>
                <li class="py-4">Payment record #98765 marked as refunded.</li>
            </ul>
        </div>
    </main>

</body>

</html>