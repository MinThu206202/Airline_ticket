<?php require_once APPROOT . '/views/inc/navbar.php'; ?>


<!-- Main content area -->
<main class="bg-white rounded-xl shadow-lg p-6 md:p-10">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Support & Contact Us</h2>
    <div class="bg-gray-50 p-6 rounded-lg mb-8 border border-gray-200 space-y-4">
        <p class="text-gray-700">If you have any questions or need assistance, please use one of the methods below.</p>
        <div>
            <h3 class="text-xl font-medium text-gray-800">Email</h3>
            <p class="text-gray-600">support@airline.com</p>
        </div>
        <div>
            <h3 class="text-xl font-medium text-gray-800">Phone</h3>
            <p class="text-gray-600">+1 (800) 123-4567</p>
        </div>
        <form class="space-y-4">
            <div>
                <label for="query" class="block text-sm font-medium text-gray-700">Your Query</label>
                <textarea id="query" rows="4" class="w-full rounded-md border-gray-300 shadow-sm p-2"></textarea>
            </div>
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold">Send Message</button>
        </form>
    </div>
</main>
</div>
</body>

</html>