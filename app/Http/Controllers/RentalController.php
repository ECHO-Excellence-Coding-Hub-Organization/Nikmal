<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rental;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $rentals = Rental::with(['customer', 'vehicle'])->get();
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        $vehicles = Vehicle::where('status', 'available')->get();
        return view('rentals.create', compact('customer', 'vehicles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer, Vehicle $vehicle)
    {
        // Validate incoming request data
        $validated = $request->validate([
            // 'customer_id' => 'required|exists:customers,id',
            // 'vehicle_id' => 'required|exists:vehicles,id',
            'pickup_type' => 'required|in:in-store,delivery',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $pricePerDay = $vehicle->price_per_day;

        // Calculate the number of days between the start and end date
        $startDate = \Carbon\Carbon::parse($validated['start_date']);
        $endDate = \Carbon\Carbon::parse($validated['end_date']);
        $duration = $startDate->diffInDays($endDate);

        // Calculate total price
        $totalPrice = $duration * $pricePerDay;

        $validated['customer_id'] = $customer->id;
        $validated['vehicle_id'] = $vehicle->id;
        $validated['total_price'] = $totalPrice;

        $rental = Rental::create($validated);

        return redirect()->route('vehicle_rentals.status', ['customer' => $customer, 'vehicle' => $vehicle, 'rental' => $rental])->with('success', 'Rental created successfully!')->with('success', 'Rental created successfully!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    // public function status(Customer $customer, Vehicle $vehicle, Rental $rental)
    // {
    //     $rental = Rental::where('customer_id', $customer->id)
    //         ->where('vehicle_id', $vehicle->id)
    //         ->where('id', $rental->id)
    //         ->get();

    //         // return $rental;
    //     return view('StatusRental', compact('rental'));
    // }

    public function status(Customer $customer, Vehicle $vehicle, Rental $rental)
{
    // Get the first rental matching the customer, vehicle, and rental id
    $rental = Rental::where('customer_id', $customer->id)
        ->where('vehicle_id', $vehicle->id)
        ->where('id', $rental->id)
        ->first(); // Use first() instead of get()

    // Check if rental exists
    if (!$rental) {
        // Handle case where rental is not found, e.g., redirect or show an error message
        return redirect()->route('some.route')->with('error', 'Rental not found');
    }

    // Pass the single rental instance to the view
    return view('StatusRental', compact('rental'));
}

}
