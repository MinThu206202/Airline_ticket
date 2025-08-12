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
                <a href=" <?php echo URLROOT; ?>/user/home" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md">Home</a>
                <a href="<?php echo URLROOT; ?>/user/mybooking" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md">My Bookings</a>
                <a href="<?php echo URLROOT; ?>/user/profile" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md">Profile</a>
                <a href="<?php echo URLROOT; ?>/user/support" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors shadow-md">Support</a>
                <a href="<?php echo URLROOT; ?>/user/login" class="px-6 py-2 bg-gray-200 text-red-600 rounded-lg hover:bg-red-100 transition-colors shadow-md">Logout</a>
            </nav>
        </header>