<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00C853',
                        secondary: '#F5F5F5',
                        danger: '#FF4444',
                        sidebar: '#1A1A1A',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'></head>
<body class="bg-gray-50 font-['Roboto_Condensed',sans-serif]">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 fixed h-full">
        <!-- Logo -->
        <div class="p-4 border-b border-gray-200">
            <div class="flex items-center gap-2">
                <img src="assets/logo.png" alt="logo" class="w-10">
                <span class="font-bold text-xl">PFM</span>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-4 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gray-200 rounded-full"></div>
                <div>
                    <h3 class="font-medium">My Family</h3>
                    <p class="text-sm text-gray-500">Free Plan • 2 Member</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="p-4">
            <div class="mb-4">
                <h4 class="text-xs font-semibold text-gray-500 mb-2">GENERAL</h4>
                <ul class="space-y-1">
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 text-primary bg-green-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                            Inbox
                            <span class="ml-auto bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded-full">12</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Master Section -->
            <div class="mb-4">
                <h4 class="text-xs font-semibold text-gray-500 mb-2">MASTER</h4>
                <ul class="space-y-1">
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Financial Statements
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Logout -->
        <div class="absolute bottom-0 w-full p-4 border-t border-gray-200">
            <button class="flex items-center gap-3 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg w-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-8">
        <div class="flex justify-between items-center mb-6">
            <h3>/Home</h3>
            <div class="flex items-center gap-4">
                <img class="rounded-lg w-8 h-8" src="assets/logo.png" alt="home">
                <button class=" bg-gray-100 px-4 py-2 rounded-sm border border-gray-300" >Share</button>
            </div>
        </div>
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">Overview dashboard</h1>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg w-64">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <button class="px-4 py-2 bg-primary text-white rounded-lg"><i class='bx bxs-file-pdf text-xl'></i> Export</button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Revenue -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500">Total Revenue</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-2xl font-semibold mb-2">12.450.000 DH</p>
                <div class="flex items-center text-sm">
                    <span class="text-primary">↑ 7%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <!-- Total Expenses -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500">Total Expenses</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-2xl font-semibold mb-2">9.300.000 DH</p>
                <div class="flex items-center text-sm">
                    <span class="text-danger">↓ 4%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <!-- Net Profit/Loss -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500">Net Profit/Loss</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-2xl font-semibold mb-2">3.150.000 DH</p>
                <div class="flex items-center text-sm">
                    <span class="text-primary">↑ 3%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>
        </div>

        <!-- Accounts Overview -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold">Accounts Overview</h2>
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                    </svg>
                </button>
            </div>

            <!-- Accounts Payable -->
            <div class="mb-6">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-gray-700">Accounts Payable</h3>
                    <span class="text-gray-500">IDR 1.800.000</span>
                </div>
                <div class="h-2 bg-gray-100 rounded-full">
                    <div class="h-full w-3/4 bg-primary rounded-full"></div>
                </div>
            </div>

            <!-- Accounts Receivable -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-gray-700">Accounts Receivable</h3>
                    <span class="text-gray-500">IDR 2.500.000</span>
                </div>
                <div class="h-2 bg-gray-100 rounded-full">
                    <div class="h-full w-1/2 bg-yellow-400 rounded-full"></div>
                </div>
            </div>
        </div>

        <!-- Tax Liabilities -->
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold">Tax Liabilities</h2>
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                    </svg>
                </button>
            </div>

            <!-- Progress Bar -->
            <div class="h-2 bg-gray-100 rounded-full mb-6">
                <div class="h-full flex rounded-full overflow-hidden">
                    <div class="w-[80.4%] bg-primary"></div>
                    <div class="w-[11.6%] bg-blue-500"></div>
                    <div class="w-[8%] bg-yellow-400"></div>
                </div>
            </div>

            <!-- Tax Types -->
            <div class="space-y-4">
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-primary"></div>
                    <span class="text-sm text-gray-600">Value Added Tax</span>
                    <span class="text-sm text-gray-400 ml-auto">80.4%</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                    <span class="text-sm text-gray-600">Employee Income Tax</span>
                    <span class="text-sm text-gray-400 ml-auto">11.6%</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                    <span class="text-sm text-gray-600">Tax on Services</span>
                    <span class="text-sm text-gray-400 ml-auto">8.0%</span>
                </div>
            </div>

            <!-- Tax Table -->
            <div class="mt-6">
                <table class="w-full">
                    <thead>
                    <tr class="text-sm text-gray-500">
                        <th class="text-left font-medium">TAX TYPE</th>
                        <th class="text-left font-medium">AMOUNT</th>
                        <th class="text-left font-medium">DATE</th>
                        <th class="text-left font-medium">STATUS</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-sm">
                        <td class="py-3">Value Added Tax</td>
                        <td>IDR 1.000.000</td>
                        <td>Due : Sep 15</td>
                        <td>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-yellow-50 text-yellow-600">
                                        Not Paid
                                    </span>
                        </td>
                        <td class="text-right">
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</body>
</html>
