<?php require_once APPROOT . '/views/inc/navbar.php'; ?>

        <!-- Main content area -->
        <main class="bg-white rounded-xl shadow-lg p-6 md:p-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Search and Book a Flight</h2>
            <div class="bg-gray-50 p-6 rounded-lg mb-8 border border-gray-200">
                <form action="flight-results.html" method="get" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div>
                        <label for="departure" class="block text-sm font-medium text-gray-700 mb-1">Departure</label>
                        <input type="text" id="departure" placeholder="e.g., Bangkok" class="w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                        <input type="text" id="destination" placeholder="e.g., Tokyo" class="w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Departure Date</label>
                        <input type="date" id="date" class="w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="passengers" class="block text-sm font-medium text-gray-700 mb-1">Passengers</label>
                        <input type="number" id="passengers" value="1" min="1" class="w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="lg:col-span-4 flex justify-center">
                        <button type="submit" class="w-full md:w-1/2 lg:w-1/4 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md font-semibold mt-4">Search Flights</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>