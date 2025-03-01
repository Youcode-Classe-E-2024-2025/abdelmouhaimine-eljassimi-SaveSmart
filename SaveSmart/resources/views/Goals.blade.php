<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Objectives</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
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
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="p-4">
            <div class="mb-4">
                <h4 class="text-xs font-semibold text-gray-500 mb-2">GENERAL</h4>
                <ul class="space-y-1">
                    <li>
                        <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg">
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
                        <a href="#" class="flex items-center gap-3 px-3 py-2 text-primary bg-green-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Personal Objectives
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Logout -->
        <div class="absolute bottom-0 w-full p-4 border-t border-gray-200">
            <a href="/logoutprofile" class="flex items-center gap-3 px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg w-full">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-8">
        <div class="flex justify-between items-center mb-6">
            <h3>/Personal Objectives</h3>
            <div class="flex items-center gap-4">
                <img class="rounded-lg w-8 h-8" src="assets/logo.png" alt="home">
                <button class="bg-gray-100 px-4 py-2 rounded-sm border border-gray-300">Share</button>
            </div>
        </div>

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold">My Objectives</h1>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text" placeholder="Search objectives" class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg w-64">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <select class="px-4 py-2 border border-gray-200 rounded-lg" id="filter-objectives">
                    <option value="all">All Objectives</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                    <option value="at-risk">At Risk</option>
                </select>
                <button id="SavingGoal" class="px-4 py-2 bg-primary text-white rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Objective
                </button>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Objectives -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Total Objectives</p>
                        <p class="text-2xl font-semibold mt-1">{{$goals->count()}}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- In Progress -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">In Progress</p>
                        <p class="text-2xl font-semibold mt-1">4</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Completed</p>
                        <p class="text-2xl font-semibold mt-1">1</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- At Risk -->
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">At Risk</p>
                        <p class="text-2xl font-semibold mt-1">1</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- Objectives Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Objective Card 1 -->
            @foreach($goals as $goal)
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-2 bg-primary"></div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="font-medium text-lg">{{$goal->name}}</h3>
                        </div>
                        <p class="text-gray-600 mb-4 text-sm">{{$goal->description}}</p>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-1">
                                @php
                                    $currentAmount = $goal->current_amount ?? 0;
                                    $targetAmount = $goal->target_amount ?? 1;
                                    $percentage = min(($currentAmount / max($targetAmount, 1)) * 100, 100);
                                @endphp
                                <span>Progress</span>
                                <span>{{$percentage}}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-primary h-2 rounded-full" style="width: {{$percentage}}%"></div>
                            </div>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <div>
                                <p class="font-medium">Current: {{$goal->current_amount}} DH</p>
                                <p>Target: {{$goal->target_amount}} DH</p>
                            </div>
                            <div class="text-right">
                                <p>Target Date:</p>
                                <p>{{$goal->target_date}}</p>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 mt-4">
                            <a href="#" id="editGoal" class="editGoal p-2 text-gray-500 hover:text-primary rounded-full" data-id="{{ $goal->id }}" data-name="{{ $goal->name }}" data-description="{{ $goal->description }}" data-target="{{ $goal->target_amount }}" data-current="{{ $goal->current_amount }}" data-date="{{ $goal->target_date }}" data-completed="{{ $goal->is_completed }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </a>
                            <a href="{{ route('goal.delete', $goal->id) }}" class="p-2 text-gray-500 hover:text-danger rounded-full">                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-between">
            <h1 class="text-2xl font-semibold">Optimization </h1>
            <button id="optimisation" class="px-4 py-2 bg-primary text-white rounded-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add Budget
            </button>
        </div>

        <!-- Budget Display Section -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 mb-8">
            <h2 class="text-xl font-semibold mb-4">Your Budget</h2>
            <div class="flex items-center justify-between">
                <p class="text-gray-600">Current Budget: <span class="font-semibold">5000 DH</span></p>
                <button id="applyOptimization" class="px-4 py-2 bg-primary text-white rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Apply Optimization
                </button>
            </div>
        </div>

        <!-- Optimization Results Section -->
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-xl font-semibold mb-4">Optimization Results</h2>
            <div id="optimizationResults" class="text-gray-600">
                <!-- Results will be displayed here -->
                <p>No optimization results yet. Click "Apply Optimization" to see the results.</p>
            </div>
        </div>

    </main>
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

        <form action="/SavingPersonalGoal" method="POST" id="add-money-form">
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
<div id="SavingGoal-edit" class="min-h-screen container mx-auto px-4 py-16 hidden">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6">Edit Saving Goal</h2>

        <form action="/EditSavingGoal" method="POST" id="add-money-form">
            @csrf
            <input type="hidden" id="goal_id" name="goal_id" value="">
            <!-- Goal Name -->
            <div class="mb-4">
                <label for="goalName" class="block text-gray-700 mb-2">Goal Name</label>
                <input type="text" name="name" id="goalNameEdit" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter goal name" required/>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 mb-2">Description</label>
                <textarea name="description" id="descriptionEdit" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Describe your goal" rows="3"></textarea>
            </div>

            <!-- Target Amount -->
            <div class="mb-4">
                <label for="targetAmount" class="block text-gray-700 mb-2">Target Amount (DH)</label>
                <input type="number" name="target_amount" id="targetAmountEdit" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter target amount" required min="1"/>
            </div>

            <!-- Current Amount -->
            <div class="mb-4">
                <label for="currentAmount" class="block text-gray-700 mb-2">Current Amount (DH)</label>
                <input type="number" name="current_amount" id="currentAmountEdit" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter current amount" min="0"/>
            </div>

            <!-- Target Date -->
            <div class="mb-4">
                <label for="targetDate" class="block text-gray-700 mb-2">Target Date</label>
                <input type="date" name="target_date" id="targetDateEdit" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" required/>
            </div>

            <!-- Is Completed -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="is_completed" id="isCompletedEdit" class="mr-2">
                <label for="isCompleted" class="text-gray-700">Mark as Completed</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-green-600 transition-colors">
                    Edit Saving Goal
                </button>

                <button type="button" onclick="hideAddMoneyForm()" class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
<div id="optimisation-form" class="min-h-screen container mx-auto px-4 py-16 hidden">
    <div class="max-w-md mx-auto bg-white p-8 rounded-lg border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6">Add Budget</h2>

        <form action="/AddBudget" method="POST" id="add-money-form">
            @csrf

            <div class="mb-4">
                <label for="Budget" class="block text-gray-700 mb-2">Enter Your Budget</label>
                <input type="text" name="Budget" id="Budget" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter goal name" required/>
            </div>
            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-green-600 transition-colors">
                    Edit Saving Goal
                </button>

                <button type="button" onclick="hideAddMoneyForm()" class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
<script>

    let SavingGoal = document.getElementById('SavingGoal');
    let SavingGoalForm = document.getElementById('SavingGoal-form');
    let SavingGoalEdit = document.getElementById('SavingGoal-edit');

    let optimisation = document.getElementById('optimisation');
    let optimisationForm = document.getElementById('optimisation-form');

    optimisation.addEventListener('click', () => {
        console.log('click');
        optimisationForm.classList.remove('hidden');
        container.classList.add('hidden');
    });

    SavingGoal.addEventListener('click', () => {
        console.log('click');
        SavingGoalForm.classList.remove('hidden');
        container.classList.add('hidden');
    });


    function hideAddMoneyForm() {
        container.classList.remove('hidden');
        SavingGoalEdit.classList.add('hidden');
        SavingGoalForm.classList.add('hidden');
        optimisationForm.classList.add('hidden');
    }

    document.querySelectorAll('.editGoal').forEach(btn => {
        btn.addEventListener('click', function () {
            const goalId = this.dataset.id;
            const goalName = this.dataset.name;
            const goalDesc = this.dataset.description;
            const targetAmount = this.dataset.target;
            const currentAmount = this.dataset.current;
            const targetDate = this.dataset.date;
            const isCompleted = this.dataset.completed;

            console.log(goalName); // ✅ Just to check if data is working

            // Show the form before filling the data
            document.getElementById('SavingGoal-edit').classList.remove('hidden');
            container.classList.add('hidden');

            // Fill the form
            document.getElementById('goal_id').value = goalId;
            document.getElementById('goalNameEdit').value = goalName;
            document.getElementById('descriptionEdit').value = goalDesc;
            document.getElementById('targetAmountEdit').value = targetAmount;
            document.getElementById('currentAmountEdit').value = currentAmount;
            document.getElementById('targetDateEdit').value = targetDate;
            document.getElementById('isCompletedEdit').checked = isCompleted == 1 ? true : false;
        });
    });

    // Add event listener for the "Apply Optimization" button
    document.getElementById('applyOptimization').addEventListener('click', function () {
        // Placeholder for optimization logic
        const optimizationResults = document.getElementById('optimizationResults');
        optimizationResults.innerHTML = `
            <p class="text-green-600">Optimization applied successfully!</p>
            <p class="mt-2">Here are the suggested allocations:</p>
            <ul class="list-disc list-inside mt-2">
                <li>Objective 1: 2000 DH</li>
                <li>Objective 2: 1500 DH</li>
                <li>Objective 3: 1000 DH</li>
                <li>Savings: 500 DH</li>
            </ul>
        `;
    });

</script>
</body>
</html>
