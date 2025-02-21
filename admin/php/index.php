<?php 
include 'sidebar/sidebar.php'; 
include 'header/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-200">
    <!-- Main Content -->
    <div class="ml-64 mt-[80px] p-6">
        <!-- Dashboard -->
        <div id="dashboardSection" class="p-6 hidden">
            <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 flex-wrap">
                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px]">
                    <h3 class="text-2xl font-bold">124</h3>
                    <p class="text-gray-600">Total Users</p>
                </div>

                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px]">
                    <h3 class="text-2xl font-bold">1234</h3>
                    <p class="text-gray-600">Total Assets</p>
                </div>

                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px]">
                    <h3 class="text-2xl font-bold">1087</h3>
                    <p class="text-gray-600">Available Stocks</p>
                </div>

                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px]">
                    <h3 class="text-2xl font-bold">1012</h3>
                    <p class="text-gray-600">Deployed Stocks</p>
                </div>

                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px]">
                    <h3 class="text-2xl font-bold">23</h3>
                    <p class="text-gray-600">Broken Items</p>
                </div>

                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px]">
                    <h3 class="text-2xl font-bold">0</h3>
                    <p class="text-gray-600">Scrap Items</p>
                </div>
            </div>
        </div>
        <!-- User Management -->
        <div id="userManagementSection" class="p-6 hidden">
            <h2 class="text-2xl font-bold mb-4">User Management</h2>
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <button onclick="openModal('userModal')" class="bg-gray-700 text-white px-4 py-2 rounded mb-4">
                    ➕ Add User
                </button>
                <div class="overflow-x-auto">
                    <table class="w-full border min-w-[600px]">
                        <thead>
                            <tr class="bg-gray-700 text-white">
                                <th class="p-2 border">User</th>
                                <th class="p-2 border">Role</th>
                                <th class="p-2 border">Password</th>
                                <th class="p-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-100">
                                <td class="p-2 border">AdminUser</td>
                                <td class="p-2 border">Admin</td>
                                <td class="p-2 border">******</td>
                                <td class="p-2 border"><button class="text-red-600">❌ Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Assets Types -->
        <div id="assetsSection" class="p-6 hidden">
            <div class="flex justify-between items-center text-center space-x-2 mb-4">
                <h2 class="text-2xl font-bold">Assets</h2>
                <div class="text-sm text-gray-400">Total: 601</div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px] cursor-pointer hover:scale-105 transition-transform duration-200"
                    onclick="openAssetTable('Laptop')">
                    <h3 class="text-2xl font-bold">203</h3>
                    <p class="text-gray-600">Laptop</p>
                </div>

                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px] cursor-pointer hover:scale-105 transition-transform duration-200"
                    onclick="openAssetTable('Keyboard')">
                    <h3 class="text-2xl font-bold">257</h3>
                    <p class="text-gray-600">Keyboard</p>
                </div>

                <div class="bg-white p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px] cursor-pointer hover:scale-105 transition-transform duration-200"
                    onclick="openAssetTable('Mouse')">
                    <h3 class="text-2xl font-bold">289</h3>
                    <p class="text-gray-600">Mouse</p>
                </div>

                <div onclick="openModal('assetModal')"
                    class="bg-black bg-opacity-20 p-4 shadow rounded-lg text-center flex flex-col justify-center items-center w-40 h-40 min-w-[100px] cursor-pointer hover:scale-105 transition-transform duration-200">
                    <h3 class="text-2xl text-gray-600 font-bold">&#43;</h3>
                    <p class="text-gray-600">Add Asset</p>
                </div>
            </div>
        </div>
        <!-- Asset Management -->
        <div id="assetTypeSection" class="p-6 hidden">
                    <h2 class="text-2xl font-bold mb-4" id="assetName">Laptop</h2>
                    <div class="bg-white shadow-md rounded-lg p-6 mb-6" >
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-blue-600 text-white">
                                <th class="p-2 border">Serial No.</th>
                                <th class="p-2 border">Assigned To</th>
                                <th class="p-2 border">Deployed</th>
                                <th class="p-2 border">Status</th>
                                <th class="p-2 border">Action</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-100">
                                <td class="p-2 border">23HTGSLKF</td>
                                <td class="p-2 border">Not Assigned</td>
                                <td class="p-2 border">Yes</td>
                                <td class="p-2 border">Functional</td>
                                <td class="p-2 border"><button class="text-red-600">❌ Remove</button></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
        </div>
        <!-- Broken Items -->
        <div id="brokenItemsSection" class="p-6 hidden">
            <h2 class="text-2xl font-bold mb-4">Broken Items</h2>
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <div class="overflow-hidden">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full border">
                            <thead>
                                <tr class="bg-gray-700 text-white">
                                    <th class="p-2 border whitespace-nowrap">Product Name</th>
                                    <th class="p-2 border whitespace-nowrap">Serial No.</th>
                                    <th class="p-2 border whitespace-nowrap">Reason</th>
                                    <th class="p-2 border whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-100">
                                    <td class="p-2 border">Laptop</td>
                                    <td class="p-2 border">123</td>
                                    <td class="p-2 border">Deadboot</td>
                                    <td class="p-2 border"><button class="text-red-600">❌ Remove</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scrap Items -->
        <div id="scrapItemsSection" class="p-6 hidden">
            <h2 class="text-2xl font-bold mb-4">Scrap Items</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="overflow-hidden">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full border">
                            <thead>
                                <tr class="bg-gray-700 text-white">
                                    <th class="p-2 border whitespace-nowrap">Product Name</th>
                                    <th class="p-2 border whitespace-nowrap">Serial No.</th>
                                    <th class="p-2 border whitespace-nowrap">Reason</th>
                                    <th class="p-2 border whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-gray-100">
                                    <td class="p-2 border">Laptop</td>
                                    <td class="p-2 border">123</td>
                                    <td class="p-2 border">Dead</td>
                                    <td class="p-2 border"><button class="text-red-600">❌ Remove</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Template -->
      <div id="userModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-lg w-1/3">
            <h2 class="text-lg font-bold mb-4">Add User</h2>
            <input type="text" placeholder="Role" class="w-full p-2 border rounded mb-2">
            <input type="text" placeholder="Username" class="w-full p-2 border rounded mb-2">
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
            <h2 class="text-lg font-bold mb-4">Add Asset</h2>
            <input type="text" placeholder="Asset Name" class="w-full p-2 border rounded mb-2">
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

<script src="js/index.js" defer></script>

</body>

</html>