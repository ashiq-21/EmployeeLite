@extends('employees.layout')

@section('content')
    <div class="mb-4">
        <!-- Search Section -->
        <form method="GET" action="{{ route('employees.index') }}" class="grid grid-cols-4 gap-4 items-center mb-4">
            <!-- Search by Name -->
            <div class="flex flex-col">
                <input type="text" name="search_name" id="search_name" value="{{ request('search_name') }}"
                    placeholder="Full Name"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Search by Date of Birth -->
            <div class="flex flex-col relative">
                <input type="text" name="search_dob" id="dob" value="{{ request('search_dob') }}"
                    placeholder="Date of Birth"
                    class="pr-10 px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                <img src="https://img.icons8.com/ios-filled/24/000000/calendar.png" alt="Date"
                    class="absolute right-3 top-2.5">
            </div>

            <!-- Search by Email -->
            <div class="flex flex-col">
                <input type="email" name="search_email" id="search_email" value="{{ request('search_email') }}"
                    placeholder="Email"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Search by Mobile -->
            <div class="flex flex-col">
                <input type="text" name="search_mobile" id="search_mobile" value="{{ request('search_mobile') }}"
                    placeholder="Mobile"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>


            <!-- Search Button -->
            <div class="col-span-4 mt-2 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 focus:outline-none flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 20a8 8 0 100-16 8 8 0 000 16zm12 0l-5-5" />
                    </svg>
                    <!-- No text here -->
                </button>
            </div>

        </form>
    </div>

    <!-- Employee Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-blue-100 text-left">
                    <th class="p-4 border-b border-gray-200">Photo</th>
                    <th class="p-4 border-b border-gray-200">
                        <span class="flex items-center">
                            Full Name
                            <a href="{{ route('employees.index', ['sort_by' => 'full_name', 'order' => request('order', 'asc') === 'asc' ? 'desc' : 'asc']) }}"
                                class="ml-1">
                                @if (request('sort_by') == 'full_name')
                                    @if (request('order') == 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-gray-400 hover:text-blue-600 cursor-pointer" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                @endif
                            </a>
                        </span>
                    </th>
                    <th class="p-4 border-b border-gray-200">
                        <span class="flex items-center">
                            Email
                            <a href="{{ route('employees.index', ['sort_by' => 'email', 'order' => request('order', 'asc') === 'asc' ? 'desc' : 'asc']) }}"
                                class="ml-1">
                                @if (request('sort_by') == 'email')
                                    @if (request('order') == 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-gray-400 hover:text-blue-600 cursor-pointer" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                @endif
                            </a>
                        </span>
                    </th>
                    <th class="p-4 border-b border-gray-200">
                        <span class="flex items-center">
                            Mobile
                            <a href="{{ route('employees.index', ['sort_by' => 'mobile', 'order' => request('order', 'asc') === 'asc' ? 'desc' : 'asc']) }}"
                                class="ml-1">
                                @if (request('sort_by') == 'mobile')
                                    @if (request('order') == 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-gray-400 hover:text-blue-600 cursor-pointer" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                @endif
                            </a>
                        </span>
                    </th>
                    <th class="p-4 border-b border-gray-200">
                        <span class="flex items-center">
                            Date of Birth
                            <a href="{{ route('employees.index', ['sort_by' => 'dob', 'order' => request('order', 'asc') === 'asc' ? 'desc' : 'asc']) }}"
                                class="ml-1">
                                @if (request('sort_by') == 'dob')
                                    @if (request('order') == 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 15l7-7 7 7" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-blue-600 hover:text-blue-900 cursor-pointer"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    @endif
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 text-gray-400 hover:text-blue-600 cursor-pointer" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7" />
                                    </svg>
                                @endif
                            </a>
                        </span>
                    </th>
                    <th class="p-4 border-b border-gray-200">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($employees as $employee)
                    <tr class="border-b">
                        <td class="p-4">
                            <img src="{{ $employee->photo ? asset('storage/' . $employee->photo) : 'https://via.placeholder.com/50' }}"
                                alt="Employee Photo" class="w-10 h-10 rounded-full object-cover">
                        </td>
                        <td class="p-4">{{ $employee->full_name }}</td>
                        <td class="p-4">{{ $employee->email }}</td>
                        <td class="p-4">{{ $employee->mobile }}</td>
                        <td class="p-4">{{ \Carbon\Carbon::parse($employee->dob)->format('d/n/Y') }}</td>

                        <td class="p-4">
                            <a href="{{ route('employees.edit', $employee->id) }}"
                                class="inline-flex items-center text-blue-600 hover:text-blue-900">
                                <!-- Edit Icon (SVG) -->
                                <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232a1 1 0 011.415 0l2.536 2.536a1 1 0 010 1.415l-11.086 11.086a2 2 0 01-1.121.586H5a1 1 0 01-1-1v-2.682a2 2 0 01.586-1.121l11.086-11.086z" />
                                </svg>

                            </a>
                            <!-- Delete Button -->
                            <button type="button" class="inline-flex items-center text-red-600 hover:text-red-900 ml-2"
                                onclick="openModal('{{ $employee->id }}')">
                                <!-- Delete Icon (SVG) -->
                                <svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center">No employees found.</td>
                    </tr>
                @endforelse
                <!-- Delete Confirmation Modal -->
                <div id="deleteModal"
                    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                        <h2 class="text-lg font-semibold mb-4">Confirm Deletion</h2>
                        <p>Are you sure, you want to delete this?</p>
                        <div class="mt-4 flex justify-end">
                            <button onclick="closeModal()"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2">No</button>
                            <form id="deleteForm" action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 textwhite px-4 py-2 rounded-md">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $employees->links() }}
    </div>
    <script>
        function openModal(employeeId) {
            // Set the action of the delete form to the correct route
            document.getElementById('deleteForm').action = '/employees/' + employeeId;
            // Display the modal
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeModal() {
            // Hide the modal
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>

@endsection
