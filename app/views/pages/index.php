<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Airline Ticket System</title>
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
    <div class="container mx-auto p-4 md:p-8">
        <!-- Main content area -->
        <main class="bg-white rounded-xl shadow-lg p-6 md:p-10 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-blue-600 mb-4">Welcome Aboard!</h2>
            <p class="text-xl text-gray-700 mb-8">
                Your journey starts here. Explore our destinations and book your next adventure with ease.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="<?php echo URLROOT; ?>/pages/login" class="px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold text-lg">
                    Login
                </a>
                <a href="<?php echo URLROOT; ?>/pages/register" class="px-8 py-4 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md font-semibold text-lg">
                    Register
                </a>
            </div>
        </main>
    </div>
</body>

</html>