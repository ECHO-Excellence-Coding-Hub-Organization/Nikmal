<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $costemers = auth()->user()->customers;

        $costemers = Customer::all();
        return view('customers.index', compact('costemers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'identity_number' => 'nullable|string|max:20',
            'identity_type' => 'nullable|in:KTP,SIM',
            'document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Create a new customer record
        $customer = Customer::create($validated);

        // If you have a file upload, handle it here
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);
            $customer->document = $filename;
            $customer->save();
        }

        // Redirect back with a success message
        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        // Retrieve the customer by ID
        // $customer = Customer::findOrFail($id);

        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
            'identity_number' => 'nullable|string|max:20',
            'identity_type' => 'nullable|in:KTP,SIM',
            'document' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Update customer record with validated data
        $customer->update($validated);

        // If a new file is uploaded, handle it
        if ($request->hasFile('document')) {
            // Delete old document if it exists
            if ($customer->document && file_exists(public_path('documents/' . $customer->document))) {
                unlink(public_path('documents/' . $customer->document));
            }

            // Store the new file
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);

            // Update the document field with the new filename
            $customer->document = $filename;
            $customer->save();
        }

        // Redirect back with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
