<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Register</title>
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
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Register</h2>
        <form action="<?php echo URLROOT; ?>/auth/register" method="post" class="space-y-4">
            <?php if (!empty($data['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($data['error']) ?>
                </div>
            <?php endif; ?>
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold mt-4">
                Register
            </button>
        </form>
        <div class="mt-6 text-center text-gray-600">
            Already have an account? <a href="login.html" class="text-blue-600 hover:text-blue-700 font-medium transition-colors">Login here</a>
        </div>
    </div>
</body>

</html>