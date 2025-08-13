<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Ticket System - Login</title>
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
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Login</h2>
        <?php if (!empty($data['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($data['error']) ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo URLROOT; ?>/auth/login" method="POST" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email"
                    class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <div class="flex justify-between items-center">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="<?php echo URLROOT; ?>/pages/forgetpassword"
                        class="text-sm text-blue-600 hover:text-blue-700 transition-colors">Forgot Password?</a>
                </div>
                <input type="password" name="password" id="password"
                    class="w-full rounded-md border-gray-300 shadow-sm p-2 mt-1 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="w-full px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold mt-4">
                Sign In
            </button>
        </form>
        <div class="mt-6 text-center text-gray-600">
            Don't have an account? <a href="register.html"
                class="text-blue-600 hover:text-blue-700 font-medium transition-colors">Register here</a>
        </div>
    </div>
</body>

</html>