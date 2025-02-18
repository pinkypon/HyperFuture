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
        <nav class="text-sm">
            <a href="mod dashboard.php" class="hover:underline">Dashboard</a>
            <span> > </span>
        </nav>
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
            <div class="container mx-auto">
                <h2 class="text-2xl font-bold mb-4">Dashboard Overview</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    <div class="bg-white p-4 shadow-lg border-2 border-gray-800 rounded-lg text-center">
                        <h3 class="text-2xl font-bold">124</h3>
                        <p class="text-gray-600">Total Assets</p>
                        <button onclick="location.href='#userManagement'"
                            class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
                    </div>
                    <div class="bg-white p-4 shadow-lg border-2 border-gray-800 rounded-lg text-center">
                        <h3 class="text-2xl font-bold">1087</h3>
                        <p class="text-gray-600">Distributed Items</p>
                        <button onclick="openModal('moderatorsModal')"
                            class="bg-blue-600 text-white px-4 py-2 rounded mb-4">View</button>
                    </div>
                    <div class="bg-white p-4 shadow-lg border-2 border-gray-800 rounded-lg text-center">
                        <h3 class="text-2xl font-bold">1234</h3>
                        <p class="text-gray-600">Available Items</p>
                        <button class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
                    </div>
                    <div class="bg-white p-4 shadow-lg border-2 border-gray-800 rounded-lg text-center">
                        <h3 class="text-2xl font-bold">23</h3>
                        <p class="text-gray-600">Broken Items</p>
                        <button class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
                    </div>
                    <div class="bg-white p-4 shadow-lg border-2 border-gray-800 rounded-lg text-center">
                        <h3 class="text-2xl font-bold">0</h3>
                        <p class="text-gray-600">Scrap Items</p>
                        <button class="mt-2 bg-blue-600 text-white px-4 py-1 rounded">View</button>
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