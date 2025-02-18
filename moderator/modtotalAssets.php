<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center fixed w-full top-0 z-50">
        <h1 class="text-lg font-bold">Hyper Future <br>
            <span class="italic text-sm">Information Technology Solutions</span>
        </h1>
    </div>
    <div class="flex h-screen pt-[80px]"> <!-- Added pt-[80px] to prevent overlap with navbar -->
        <div class="bg-blue-700 text-white w-64 fixed h-full top-[75px] p-4">
            <nav>
                <a href="mod dashboard.php" class="block py-2 px-4 hover:bg-blue-500 rounded">Dashboard</a>
                <div class="relative">
                    <button class="w-full text-left py-2 px-4 hover:bg-blue-500 rounded">Product List ▾</button>
                    <div class="hidden flex-col pl-6 mt-1" id="productList">
                        <a href="modtotalAssets.php" class="block py-2 px-4 hover:bg-blue-500 rounded">Total
                            Assets</a>
                        <a href="#" class="block py-1 px-4 hover:bg-blue-500 rounded">Distributed</a>
                        <a href="#" class="block py-1 px-4 hover:bg-blue-500 rounded">Available Assets</a>
                        <a href="#" class="block py-1 px-4 hover:bg-blue-500 rounded">Broken Assets</a>
                        <a href="#" class="block py-1 px-4 hover:bg-blue-500 rounded">Scraps</a>
                    </div>
                </div>
            </nav>
        </div>

        <main id="dashboardMod" class="flex-1 p-6 ml-64"> <!-- Added ml-64 to give space for sidebar -->
            <nav class="text-gray-600 text-sm mb-4">
                <a href="#" class="hover:underline">Dashboard</a> >
                <a href="#" class="hover:underline">Product List</a> >
                <span class="font-bold">Total Assets</span>
            </nav>

            <!-- Title -->
            <h2 class="text-2xl font-bold bg-white p-4 shadow rounded-lg mb-4">Total Assets</h2>

            <!-- Asset List -->
            <div class="space-y-4">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-4">
                    <!-- Item 1 -->
                    <div class="bg-white p-4 shadow-lg border-2 border-gray-800 rounded-lg text-center w-full">
                        <div class="flex items-center justify-between space-x-4">
                            <img src="laptop.jpg" alt="Item"
                                class="w-16 h-16 object-cover rounded-md border-2 border-gray-300">
                            <div class="flex-1">
                                <p class="text-lg font-semibold text-gray-800">Laptop</p>
                            </div>
                            <p class="text-gray-600 font-medium text-lg">Quantity: 122</p>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="bg-white p-4 shadow-lg border-2 border-gray-800 rounded-lg text-center w-full">
                        <div class="flex items-center justify-between space-x-4">
                            <img src="laptop.jpg" alt="Item"
                                class="w-16 h-16 object-cover rounded-md border-2 border-gray-300">
                            <div class="flex-1">
                                <p class="text-lg font-semibold text-gray-800">Laptop</p>
                            </div>
                            <p class="text-gray-600 font-medium text-lg">Quantity: 122</p>
                        </div>
                    </div>
                </div>


        </main>
    </div>

    <script>
        document.querySelector('button').addEventListener('click', function () {
            document.getElementById('productList').classList.toggle('hidden');
        });
    </script>
</body>

</html>