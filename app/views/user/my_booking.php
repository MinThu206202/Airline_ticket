<?php require_once APPROOT . '/views/inc/navbar.php'; ?>


<!-- Main content area -->
<main class="bg-white rounded-xl shadow-lg p-6 md:p-10">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">My Bookings</h2>
    <div class="space-y-4">
        <!-- Example Booking 1 -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col sm:flex-row justify-between items-center">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">PNR: PNR12345</h3>
                <p class="text-sm text-gray-600">Flight: BA245 - Bangkok (BKK) → Tokyo (HND)</p>
                <p class="text-xs text-gray-500">Date: 2025-08-20 | Status: <span class="font-medium text-green-600">Confirmed</span></p>
            </div>
            <div class="text-right mt-4 sm:mt-0">
                <button class="px-4 py-1 mt-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">View Details</button>
            </div>
        </div>
        <!-- Example Booking 2 -->
        <div class="bg-gray-100 p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col sm:flex-row justify-between items-center">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">PNR: PNR67890</h3>
                <p class="text-sm text-gray-600">Flight: TG660 - Bangkok (BKK) → London (LHR)</p>
                <p class="text-xs text-gray-500">Date: 2025-09-05 | Status: <span class="font-medium text-yellow-600">Pending</span></p>
            </div>
            <div class="text-right mt-4 sm:mt-0">
                <button class="px-4 py-1 mt-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">View Details</button>
            </div>
        </div>
    </div>
</main>
</div>
</body>

</html>