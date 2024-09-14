@extends('employees.layout')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold mb-6 text-blue-600 text-center">Edit Employee</h2>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- First Name and Last Name (Same Row) -->
            <div class="mb-4 flex space-x-4">
                <!-- First Name -->
                <div class="w-1/2">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" id="first_name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
                        @error('first_name') border-red-500 @enderror"
                        value="{{ old('first_name', $employee->first_name) }}" required>
                    @error('first_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="w-1/2">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" id="last_name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
                        @error('last_name') border-red-500 @enderror"
                        value="{{ old('last_name', $employee->last_name) }}" required>
                    @error('last_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="mb-4 w-1/2 inline-block">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
        @error('email') border-red-500 @enderror"
                    value="{{ old('email', isset($employee) ? $employee->email : '') }}" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Mobile -->
            <div class="mb-4 w-1/2 inline-block">
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                <input type="text" name="mobile" id="mobile"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
        @error('mobile') border-red-500 @enderror"
                    value="{{ old('mobile', isset($employee) ? $employee->mobile : '') }}" required>
                @error('mobile')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <!-- Date of Birth -->
            <div class="mb-4 relative">
                <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input type="text" id="dob" name="dob" placeholder="Select Date of Birth"
                    class="pl-2 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
                    @error('dob') border-red-500 @enderror"
                    value="{{ old('dob', $employee->dob) }}">
                @error('dob')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Photo -->
            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>

                <!-- Display previous photo if exists -->
                @if ($employee->photo)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo"
                            class="h-24 w-24 rounded-full object-cover">
                    </div>
                @endif

                <input type="file" name="photo" id="photo"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500
        @error('photo') border-red-500 @enderror">
                @error('photo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>



            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500 transition duration-200">
                    Update Employee
                </button>
            </div>
        </form>
    </div>
@endsection
