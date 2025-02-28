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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="bg-gray-50 font-['Roboto_Condensed',sans-serif]">
<div id="container" class="flex min-h-screen">
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
                    <h3 class="font-medium">{{ session('family')->name }}</h3>
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
                <button id="addMoney" class="px-4 py-2 bg-primary text-white rounded-lg">add a Transaction</button>
                <button id="SavingGoal" class="px-4 py-2 bg-primary text-white rounded-lg">Add Saving Goal</button>
                <button id="addCategory" class="px-4 py-2 bg-primary text-white rounded-lg">Add Category</button>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Revenue -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500">Total Savings</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-2xl font-semibold mb-2">{{$totalBalance[0]->current_amount?? '0'}} DH</p>
                <div class="flex items-center text-sm">
                    <span class="text-primary">↑ 7%</span>
                    <span class="text-gray-500 ml-2">vs last month</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500">Savings Goal</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-2xl font-semibold mb-2">{{$totalBalance[0]->target_amount?? '0'}} DH</p>
                <div class="flex items-center text-sm">
                    <p class="text-lg font-semibold text-gray-700">
                    @php
                        $currentAmount = $totalBalance[0]->current_amount ?? 0;
                        $targetAmount = $totalBalance[0]->target_amount ?? 1;
                        $percentage = min(($currentAmount / max($targetAmount, 1)) * 100, 100);
                    @endphp
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="h-full bg-primary rounded-full" style="width: {{ $percentage }}%;"></div>
                    </div>
                    </p>

                </div>
            </div>

            <!-- Net Profit/Loss -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500">Last Contribution</h3>
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                        </svg>
                    </button>
                </div>
                <p class="text-2xl font-semibold mb-2">{{$transaction->amount}}</p>
                <div class="flex items-center text-sm">
                    <span class="text-gray-500 ml-2">by {{$transaction->user->name}}, {{$transaction->date}}</span>
                </div>
            </div>
        </div>
    </main>
</div>


<!-- Add Money to Family Savings Form (Hidden by default) -->
<div id="add-money-form" class="min-h-screen container mx-auto px-4 py-16 hidden">
    <!-- Header -->
    <div class="flex justify-center mb-12">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                PFM
            </div>
            <span class="font-bold text-xl">Family Savings</span>
        </div>
    </div>


    <div class="max-w-md mx-auto bg-white p-8 rounded-lg border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6">Add Transaction to Family Savings</h2>

        <form action="/addMoney" method="POST" id="add-money-form">
            @csrf
            <input type="hidden" name="id" value="{{session('family')->id}}">
            <div class="mb-4">
                <label for="contributionAmount" class="block text-gray-700 mb-2">Amount (DH)</label>
                <input type="number" name="amount" id="contributionAmount" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter amount" required min="1"/>
            </div>
            <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary mb-4" name="category_id" id="category_id">
                @foreach($categories as $catgory)
                    <option value="{{$catgory->id}}">{{$catgory->name}}</option>
                @endforeach
            </select>
            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-green-600 transition-colors">
                    Add to Savings
                </button>

                <button type="button" onclick="hideAddMoneyForm()" class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<div id="SavingGoal-form" class="min-h-screen container mx-auto px-4 py-16 hidden">
    <!-- Header -->
    <div class="flex justify-center mb-12">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                PFM
            </div>
            <span class="font-bold text-xl">Family Savings</span>
        </div>
    </div>

    <div class="max-w-md mx-auto bg-white p-8 rounded-lg border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6">Add Saving Goal</h2>

        <form action="/SavingGoal" method="POST" id="add-money-form">
            @csrf
            <input type="hidden" name="family_id" value="{{ session('family')->id }}">

            <!-- Goal Name -->
            <div class="mb-4">
                <label for="goalName" class="block text-gray-700 mb-2">Goal Name</label>
                <input type="text" name="name" id="goalName" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter goal name" required/>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Describe your goal" rows="3"></textarea>
            </div>

            <!-- Target Amount -->
            <div class="mb-4">
                <label for="targetAmount" class="block text-gray-700 mb-2">Target Amount (DH)</label>
                <input type="number" name="target_amount" id="targetAmount" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter target amount" required min="1"/>
            </div>

            <!-- Current Amount -->
            <div class="mb-4">
                <label for="currentAmount" class="block text-gray-700 mb-2">Current Amount (DH)</label>
                <input type="number" name="current_amount" id="currentAmount" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter current amount" min="0"/>
            </div>

            <!-- Target Date -->
            <div class="mb-4">
                <label for="targetDate" class="block text-gray-700 mb-2">Target Date</label>
                <input type="date" name="target_date" id="targetDate" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required/>
            </div>

            <!-- Is Completed -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="is_completed" id="isCompleted" class="mr-2">
                <label for="isCompleted" class="text-gray-700">Mark as Completed</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-green-600 transition-colors">
                    Add to Savings
                </button>

                <button type="button" onclick="hideAddMoneyForm()" class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<div id="add-category-form" class="min-h-screen container mx-auto px-4 py-16 hidden">
    <!-- Header -->
    <div class="flex justify-center mb-12">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                PFM
            </div>
            <span class="font-bold text-xl">Family Savings</span>
        </div>
    </div>

    <div class="max-w-md mx-auto bg-white p-8 rounded-lg border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6">Add New Category</h2>

        <form action="{{route('categories.store')}}" method="POST" id="add-category-form">
            @csrf
            <input type="hidden" name="family_id" value="{{ session('user')->id }}">
            <!-- Category Name -->
            <div class="mb-4">
                <label for="categoryName" class="block text-gray-700 mb-2">Category Name</label>
                <input type="text" name="name" id="categoryName" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter category name" required />
            </div>

            <!-- Category Type (Income or Expense) -->
            <div class="mb-4">
                <label for="categoryType" class="block text-gray-700 mb-2">Category Type</label>
                <select name="type" id="categoryType" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            <!-- Random Color Picker -->
            <div class="mb-4">
                <label for="categoryColor" class="block text-gray-700 mb-2">Category Color</label>
                <input type="color" name="color" id="categoryColor" class="w-full border border-gray-200 rounded-lg" />
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-green-600 transition-colors">
                    Add Category
                </button>

                <button type="button" onclick="hideAddCategoryForm()" class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>


<script>

    let addMoney = document.getElementById('addMoney');
    let addMoneyForm = document.getElementById('add-money-form');
    let container = document.getElementById('container');

    addMoney.addEventListener('click', () => {
        addMoneyForm.classList.remove('hidden');
        container.classList.add('hidden');
    });

    function hideAddMoneyForm() {
        addMoneyForm.classList.add('hidden');
        container.classList.remove('hidden');
        SavingGoalForm.classList.add('hidden');
    }

    let SavingGoal = document.getElementById('SavingGoal');
    let SavingGoalForm = document.getElementById('SavingGoal-form');

    SavingGoal.addEventListener('click', () => {
        console.log('click');
        SavingGoalForm.classList.remove('hidden');
        container.classList.add('hidden');
    });

    let CategoryForm = document.getElementById('add-category-form');
    let addCategory = document.getElementById('addCategory');

    addCategory.addEventListener('click', () => {
        CategoryForm.classList.remove('hidden');
        container.classList.add('hidden');
    });
    function hideAddCategoryForm() {
        CategoryForm.classList.add('hidden');
        container.classList.remove('hidden');
    }

</script>

</body>
</html>
