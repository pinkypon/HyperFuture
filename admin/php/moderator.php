<!-- DI PA NA OPTIMIZED CODE -->

<?php 
include 'sidebar/sidebar2.php'; 
include 'header/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/sidebar.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <!-- Main Content -->
    <div class="ml-64 mt-[80px] p-6">
        <!-- Dashboard -->
        <div id="dashboardSection" class="p-6 hidden">
            <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">

                <div class="bg-white p-4 shadow rounded-lg text-center">
                    <h3 class="text-2xl font-bold">124</h3>
                    <p class="text-gray-600">Users</p>
                    <button onclick="location.href='#userManagement'"
                        class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
                </div>
    
                <!-- Total Assets -->
                <div class=" bg-white p-4 shadow rounded-lg text-center">
                    <h3 class="text-2xl font-bold">1234</h3>
                    <p class="text-gray-600">Total Assets</p>
                    <button class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
                </div>
                <div class="bg-white p-4 shadow rounded-lg text-center">
                    <h3 class="text-2xl font-bold">1087</h3>
                    <p class="text-gray-600">Available stocks</p>
                    <button onclick="openModal('moderatorsModal')"
                        class="bg-blue-600 text-white px-4 py-2 rounded mb-4">View
                    </button>
                </div>
                <div class="bg-white p-4 shadow rounded-lg text-center">
                    <h3 class="text-2xl font-bold">1012</h3>
                    <p class="text-gray-600">Deployed stocks</p>
                    <button onclick="openModal('moderatorsModal')"
                        class="bg-blue-600 text-white px-4 py-2 rounded mb-4">View
                    </button>
                </div>


                <!-- Broken Assets -->
                <div class="bg-white p-4 shadow rounded-lg text-center">
                    <h3 class="text-2xl font-bold">23</h3>
                    <p class="text-gray-600">Broken Items</p>
                    <button class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
                </div>


                <div class="bg-white p-4 shadow rounded-lg text-center">
                    <h3 class="text-2xl font-bold">0</h3>
                    <p class="text-gray-600">Scrap Items</p>
                    <button class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
                </div>
            </div>
        </div>
        <!-- Assets Management -->
        <div id="assetsSection" class="bg-white shadow-md rounded-lg p-6 mb-6 hidden">
            <h2 class="text-xl font-bold mb-4">Assets Management</h2>
            <button onclick="openModal('assetModal')" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">➕ Add
                Asset</button>
            <table class="w-full border">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="p-2 border">Product Name</th>
                        <th class="p-2 border">Serial No.</th>
                        <th class="p-2 border">Available</th>
                        <th class="p-2 border">Deployed</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-100">
                        <td class="p-2 border">laptop</td>
                        <td class="p-2 border">123</td>
                        <td class="p-2 border">1</td>
                        <td class="p-2 border">1</td>
                        <td class="p-2 border"><button class="text-red-600">❌ Remove</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Broken Items -->
        <div id="brokenItemsSection" class="bg-white shadow-md rounded-lg p-6 mb-6 hidden">
            <h2 class="text-xl font-bold mb-4">Broken Items</h2>
            <button onclick="openModal('brokenModal')" class="bg-red-600 text-white px-4 py-2 rounded mb-4">➕ Add
                Broken Item</button>
            <table class="w-full border">
                <thead>
                    <tr class="bg-red-600 text-white">
                        <th class="p-2 border">Product Name</th>
                        <th class="p-2 border">Serial No.</th>
                        <th class="p-2 border">Reason</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <td class="p-2 border">laptop</td>
                    <td class="p-2 border">123</td>
                    <td class="p-2 border">Deadboot</td>
                    <td class="p-2 border"><button class="text-red-600">❌ Remove</button></td>
                </tbody>
            </table>
        </div>

        <!-- Scrap Items -->
        <div id="scrapItemsSection" class="bg-white shadow-md rounded-lg p-6 hidden">
            <h2 class="text-xl font-bold mb-4">Scrap Items</h2>
            <button onclick="openModal('scrapModal')" class="bg-red-600 text-white px-4 py-2 rounded mb-4">➕ Add Scrap
                Item</button>
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-700 text-white">
                        <th class="p-2 border">Product Name</th>
                        <th class="p-2 border">Serial No.</th>
                        <th class="p-2 border">Reason</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <td class="p-2 border">laptop</td>
                    <td class="p-2 border">123</td>
                    <td class="p-2 border">dead </td>
                    <td class="p-2 border"><button class="text-red-600">❌ Remove</button></td>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Template -->
      <div id="userModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-lg font-bold mb-4">Add User</h2>
            <input type="text" placeholder="Username" class="w-full p-2 border rounded mb-2">
            <input type="text" placeholder="Role" class="w-full p-2 border rounded mb-2">
            <input type="password" placeholder="Password" class="w-full p-2 border rounded mb-2">
            <div class="flex justify-end">
                <button onclick="closeModal('userModal')"
                    class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded ml-2">Save</button>
            </div>
        </div>
        </div> 
     <div id="scrapModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-lg font-bold mb-4">Add Scrap Item</h2>
            <input type="text" placeholder="Product Name" class="w-full p-2 border rounded mb-2">
            <input type="text" placeholder="Serial No." class="w-full p-2 border rounded mb-2">
            <div class="flex justify-end">
                <button onclick="closeModal('scrapModal')"
                    class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded ml-2">Save</button>
            </div>
        </div>
        </div> 
        <div id="brokenModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-lg font-bold mb-4">Add Broken Item</h2>
            <input type="text" placeholder="Product Name" class="w-full p-2 border rounded mb-2">
            <input type="text" placeholder="Serial No." class="w-full p-2 border rounded mb-2">

            <div class="flex justify-end">
                <button onclick="closeModal('brokenModal')"
                    class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded ml-2">Save</button>
            </div>
        </div>
        </div> 

     <div id="assetModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-lg font-bold mb-4">Add Broken Item</h2>
            <input type="text" placeholder="Product Name" class="w-full p-2 border rounded mb-2">
            <input type="text" placeholder="Serial No." class="w-full p-2 border rounded mb-2">

            <div class="flex justify-end">
                <button onclick="closeModal('assetModal')"
                    class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <button class="bg-blue-600 text-white px-4 py-2 rounded ml-2">Save</button>
            </div>
        </div>
    </div> 
    <div id="moderatorsModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-lg font-bold mb-4">Moderators List</h2>

            <!-- Moderators List -->
            <ul class="space-y-2">
                <li class="bg-gray-100 p-3 rounded flex justify-between items-center">
                    <span>John Doe</span>
                    <button class="text-red-600 hover:text-red-800 font-semibold">❌ Remove</button>
                </li>
                <li class="bg-gray-100 p-3 rounded flex justify-between items-center">
                    <span>Jane Smith</span>
                    <button class="text-red-600 hover:text-red-800 font-semibold">❌ Remove</button>
                </li>
                <li class="bg-gray-100 p-3 rounded flex justify-between items-center">
                    <span>Michael Johnson</span>
                    <button class="text-red-600 hover:text-red-800 font-semibold">❌ Remove</button>
                </li>
            </ul>

            <div class="flex justify-end mt-4">
                <button onclick="closeModal('moderatorsModal')"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-5 py-2 rounded-lg shadow-md transition duration-300 ease-in-out">
                    ✖ Close
                </button>
            </div>
        </div>
    </div>  


    <script>
        function openModal(modalId) { document.getElementById(modalId).classList.remove('hidden'); }
        function closeModal(modalId) { document.getElementById(modalId).classList.add('hidden'); }
    </script>

<script src="js/moderator.js"></script>

</body>

</html>