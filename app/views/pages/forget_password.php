<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Forgot Password</title>
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
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Forgot Your Password?</h2>
        <p class="text-center text-gray-500 mb-6">Enter your email and we'll send you a link to reset your password.</p>
        <form action="<?php echo URLROOT; ?>/auth/forget_password" method="post" class="space-y-4">
            <?php if (!empty($data['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?= htmlspecialchars($data['error']) ?>
                </div>
            <?php endif; ?>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold mt-4">
                Send Code
            </button>
        </form>
        <div class="mt-6 text-center text-gray-600">
            Remember your password? <a href="login.html"
                class="text-blue-600 hover:text-blue-700 font-medium transition-colors">Login here</a>
        </div>
    </div>
</body>

</html>