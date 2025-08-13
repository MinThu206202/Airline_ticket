<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Change Password</title>
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

<body class="min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Change Your Password</h2>
        <p class="text-center text-gray-500 mb-6">Enter and confirm your new password below.</p>
        <form action="<?php echo URLROOT; ?>/page/changepassword" method="get" class="space-y-4">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" id="password"
                    class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirm-password"
                    class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold mt-4">
                Change Password
            </button>
        </form>
    </div>
</body>

</html>