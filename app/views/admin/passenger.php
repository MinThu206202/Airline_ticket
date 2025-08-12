<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Passenger Management</title>
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
            <a href="admin-dashboard.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Dashboard</a>
            <a href="admin-flight-management.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Flight Management</a>
            <a href="admin-booking-management.html" class="block px-4 py-2 rounded-lg hover:bg-slate-700 transition-colors">Booking Management</a>
            <a href="admin-passenger-management.html" class="block px-4 py-2 bg-slate-700 rounded-lg font-medium hover:bg-slate-600 transition-colors">Passenger Management</a>
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
            <h1 class="text-3xl font-bold text-gray-800">Passenger Management</h1>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-700">All Passengers</h2>
                <div class="relative">
                    <input type="text" placeholder="Search by name or email..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bookings</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Activity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap">johndoe@example.com</td>
                            <td class="px-6 py-4 whitespace-nowrap">2</td>
                            <td class="px-6 py-4 whitespace-nowrap">2025-08-11</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="text-blue-600 hover:text-blue-900">View Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>