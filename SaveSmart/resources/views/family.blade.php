<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Selection</title>
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
    <style>
        body {
            font-family: 'Roboto Condensed', sans-serif;
        }
        .profile-avatar {
            transition: all 0.3s ease;
        }
        .profile-avatar:hover {
            transform: scale(1.05);
            border: 3px solid #00C853;
        }
        .add-profile-button {
            transition: all 0.3s ease;
        }
        .add-profile-button:hover {
            transform: scale(1.05);
            border-color: #00C853;
            color: #00C853;
        }
    </style>
</head>
<body class="bg-gray-50">
<!-- Profile Selection View -->
<div id="profile-selection" class="min-h-screen container mx-auto px-4 py-16">
    <!-- Header -->
    <div class="flex justify-center mb-12">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                PFM
            </div>
            <span class="font-bold text-xl">Profile Selection</span>
        </div>
    </div>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-semibold text-center mb-8">Families profiles</h1>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
            @foreach($families as $family)
                <div id="profile" class="flex flex-col items-center">
                    <button class="group mb-2" onclick="showPasswordForm({{ $family['id'] }})">
                        <div class="profile-avatar w-32 h-32 rounded-md bg-primary flex items-center justify-center text-white text-5xl font-bold mb-2">
                            {{ substr($family['name'], 0, 1) }}
                        </div>
                        <p class="text-center text-gray-700 group-hover:text-primary transition-colors">{{$family['name']}}</p>
                    </button>
                </div>
            @endforeach
            <!-- Add Profile Button -->
            <div class="flex flex-col items-center">
                <button onclick="showAddForm()" class="add-profile-button w-32 h-32 rounded-md border-2 border-dashed border-gray-300 flex items-center justify-center text-gray-400 mb-2">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>
                <p class="text-center text-gray-500">Add Profile</p>
            </div>
        </div>

        <div class="text-center">
            <button class="px-8 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                Manage Profiles
            </button>
        </div>
    </div>
</div>

<!-- Password Form View -->
<div id="password-form" class="min-h-screen container mx-auto px-4 py-16 hidden">
    <!-- Header -->
    <div class="flex justify-center mb-12">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white font-bold">
                PFM
            </div>
            <span class="font-bold text-xl">Enter Password</span>
        </div>
    </div>

    <div class="max-w-md mx-auto bg-white p-8 rounded-lg border border-gray-200">
        <h2 class="text-2xl font-semibold mb-6 text-center">Enter Password</h2>

        <form id="login-form" action="/validateprofile" method="POST">
            @csrf
            <input type="hidden" name="id" id="familyId"/>

            <div class="mb-6">
                <label for="profilePassword" class="block text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="profilePassword" required
                       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                       placeholder="Enter password"/>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-green-600 transition-colors">
                    Login
                </button>
                <button type="button" onclick="hidePasswordForm()" class="px-6 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function showPasswordForm(familyId) {
        document.getElementById('profile-selection').classList.add('hidden');
        document.getElementById('password-form').classList.remove('hidden');

        // Set the family ID in the hidden input field
        document.getElementById('familyId').value = familyId;
    }

    function hidePasswordForm() {
        document.getElementById('profile-selection').classList.remove('hidden');
        document.getElementById('password-form').classList.add('hidden');
    }

    function showAddForm(familyId) {
        document.getElementById('familyId').value = familyId;
        document.getElementById('profile-selection').classList.add('hidden');
        document.getElementById('add-profile-form').classList.remove('hidden');
    }

    function hideAddForm() {
        document.getElementById('profile-selection').classList.remove('hidden');
        document.getElementById('add-profile-form').classList.add('hidden');
    }
</script>
</body>
</html>
