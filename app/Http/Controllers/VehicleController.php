<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all vehicles from the database
        $vehicles = Vehicle::all();

        // Return a view to display the vehicles
        return view('vehicles.index', compact('vehicles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'plate_number' => 'required|string|max:20|unique:vehicles,plate_number',
            'price_per_day' => 'required|numeric',
            'status' => 'required|in:available,rented,maintenance',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Create the vehicle record in the database
        $vehicle = Vehicle::create($validated);

        // If there's an image, handle the upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/vehicles'), $filename);
            $vehicle->image = $filename;
            $vehicle->save();
        }

        // Redirect with success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the specific vehicle
        $vehicle = Vehicle::findOrFail($id);

        // Return the view to display the vehicle details
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        // Retrieve the specific vehicle
        // $vehicle = Vehicle::findOrFail($id);

        // Return the view to edit the vehicle
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Retrieve the vehicle to be updated
        $vehicle = Vehicle::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'plate_number' => 'required|string|max:20|unique:vehicles,plate_number,' . $vehicle->id,
            'price_per_day' => 'required|numeric',
            'status' => 'required|in:available,rented,maintenance',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update the vehicle record in the database
        $vehicle->update($validated);

        // If there's a new image, handle the upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($vehicle->image && file_exists(public_path('images/vehicles/' . $vehicle->image))) {
                unlink(public_path('images/vehicles/' . $vehicle->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/vehicles'), $filename);
            $vehicle->image = $filename;
            $vehicle->save();
        }

        // Redirect with success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the vehicle to be deleted
        $vehicle = Vehicle::findOrFail($id);

        // If the vehicle has an image, delete it from the server
        if ($vehicle->image && file_exists(public_path('images/vehicles/' . $vehicle->image))) {
            unlink(public_path('images/vehicles/' . $vehicle->image));
        }

        // Delete the vehicle record
        $vehicle->delete();

        // Redirect with success message
        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully!');
    }
}
