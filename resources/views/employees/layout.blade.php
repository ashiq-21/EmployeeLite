<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EmployeeLite</title>

    <!-- Tailwind CSS CDN -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body class="bg-gray-100">

    <!-- Main Container -->
    <div class="min-h-screen flex flex-col md:flex-row">

        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-blue-900 text-white flex flex-col">
            <div class="flex items-center justify-center h-20 bg-blue-800">
                <h1 class="text-xl font-bold">EmployeeLite</h1>
            </div>

            <nav class="flex-1 px-2 py-4">
                <ul>
                    <li class="mb-2">
                        <a href=""
                            class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <img src="https://img.icons8.com/material-outlined/24/ffffff/home.png" alt="Home"
                                class="mr-2 h-6 w-6" />
                            Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('employees.index') }}"
                            class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <img src="https://img.icons8.com/ios-filled/24/ffffff/businessman.png" alt="Employees"
                                class="mr-2 h-6 w-6" />
                            Employees
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('employees.create') }}"
                            class="flex items-center py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">
                            <img src="https://img.icons8.com/material-outlined/24/ffffff/add-user-male.png"
                                alt="Add Employee" class="mr-2 h-6 w-6" />
                            Add Employee
                        </a>
                    </li>
                </ul>

            </nav>
        </aside>

        <!-- Content -->
        <div class="flex-1 bg-gray-100 p-6">
            <div class="bg-white p-6 rounded shadow-sm">
                <!-- Page Content -->
                @yield('content')
            </div>
        </div>

    </div>

    <!-- Copyright Footer -->
    <footer class="bg-blue-900 text-white text-center py-4">
        <p class="text-sm">© {{ date('Y') }} EmployeeLite. All rights reserved.</p>
    </footer>

    <!-- Scripts (if needed) -->
    <script>
        flatpickr("#dob", {
            dateFormat: "Y-m-d", // Change format as needed
            maxDate: new Date(), // Prevent future dates
            onReady: function(selectedDates, dateStr, instance) {},
        });
    </script>

</body>

</html>
