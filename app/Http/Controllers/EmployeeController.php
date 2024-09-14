<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    // Display a listing of the employees
    public function index(Request $request)
    {
        // Start a query on the Employee model
        $employees = Employee::query();

        // Handle individual search fields
        if ($request->has('search_name') && $request->search_name != '') {
            $employees->where('full_name', 'like', '%' . $request->search_name . '%');
        }

        if ($request->has('search_email') && $request->search_email != '') {
            $employees->where('email', 'like', '%' . $request->search_email . '%');
        }

        if ($request->has('search_mobile') && $request->search_mobile != '') {
            $employees->where('mobile', 'like', '%' . $request->search_mobile . '%');
        }

        if ($request->has('search_dob') && $request->search_dob != '') {
            $employees->where('dob', 'like', '%' . $request->search_dob . '%');
        }

        // Handle sorting
        if ($request->has('sort_by')) {
            $employees->orderBy($request->sort_by, $request->get('order', 'asc'));
        } else {
            // Default to show latest employees first
            $employees->orderBy('created_at', 'desc'); // Adjust the field name if necessary
        }


        // Paginate and pass the employees to the view
        $employees = $employees->paginate(10);

        // Add only necessary fields to the pagination links
        $employees->appends([
            'search_name' => $request->get('search_name'),
            'search_email' => $request->get('search_email'),
            'search_mobile' => $request->get('search_mobile'),
            'search_dob' => $request->get('search_dob'),
            'sort_by' => $request->get('sort_by'),
            'order' => $request->get('order'),
        ]);

        return view('employees.index', compact('employees'));

    }


    // Show the form for creating a new employee
    public function create()
    {
        return view('employees.create');
    }

    // Store a newly created employee in storage
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'mobile' => 'required|string|max:20',
            'dob' => 'required|date',
        ]);
        $validated['full_name'] = $validated['first_name'] . ' ' . $validated['last_name'];
        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        // Create the employee
        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Show the form for editing the specified employee
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // Update the specified employee in storage
    public function update(Request $request, Employee $employee)
    {
        // Validate the request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'mobile' => 'required|string|max:20',
            'dob' => 'required|date',
        ]);
        $validated['full_name'] = $validated['first_name'] . ' ' . $validated['last_name'];
        // Handle the photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($employee->photo && Storage::disk('public')->exists($employee->photo)) {
                Storage::disk('public')->delete($employee->photo);
            }
            // Store the new photo
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        // Update the employee
        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Remove the specified employee from storage
    public function destroy(Employee $employee)
    {
        // Delete the photo if it exists
        if ($employee->photo && Storage::disk('public')->exists($employee->photo)) {
            Storage::disk('public')->delete($employee->photo);
        }

        // Delete the employee
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}

