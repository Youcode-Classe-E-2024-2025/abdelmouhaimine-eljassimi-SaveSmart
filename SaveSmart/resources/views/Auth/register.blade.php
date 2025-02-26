<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
<body class="bg-secondary font-['Roboto_Condensed', sans-serif]">

<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
        <h2 class="text-3xl font-semibold text-center text-sidebar mb-6">Create Your Account</h2>

        <form action="/register" method="POST">
            @csrf
            <!-- Full Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-sidebar">Full Name</label>
                <input type="text" id="name" name="name" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-sidebar">Email Address</label>
                <input type="email" id="email" name="email" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-sidebar">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-sidebar">Password</label>
                <input type="password" id="password" name="password_confirmation" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" required>
            </div>

            <!-- Terms and Conditions -->
            <div class="mb-6">
                <label for="terms" class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="mr-2 text-primary" required>
                    <span class="text-sm text-sidebar">I agree to the <a href="#" class="text-primary hover:underline">terms and conditions</a>.</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-primary text-white p-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-primary">
                Register
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-sidebar">Already have an account? <a href="/login" class="text-primary hover:underline">Login here</a>.</p>
        </div>
    </div>
</div>
</body>
</html>
