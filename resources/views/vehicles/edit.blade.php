<x-app-layout>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Kendaraan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('vehicles.update', $vehicle) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Tells Laravel to use the PUT method -->

                            <!-- Vehicle Name -->
                            <div class="form-group">
                                <label for="name">Vehicle Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $vehicle->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Vehicle Type -->
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="mobil" {{ old('type', $vehicle->type) == 'mobil' ? 'selected' : '' }}>Mobil</option>
                                    <option value="motor" {{ old('type', $vehicle->type) == 'motor' ? 'selected' : '' }}>Motor</option>
                                </select>
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Plate Number -->
                            <div class="form-group">
                                <label for="plate_number">Plate Number</label>
                                <input type="text" name="plate_number" id="plate_number" class="form-control"
                                    value="{{ old('plate_number', $vehicle->plate_number) }}" required>
                                @error('plate_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Price Per Day -->
                            <div class="form-group">
                                <label for="price_per_day">Price Per Day</label>
                                <input type="number" name="price_per_day" id="price_per_day" class="form-control"
                                    value="{{ old('price_per_day', $vehicle->price_per_day) }}" required>
                                @error('price_per_day')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="available"
                                        {{ old('status', $vehicle->status) == 'available' ? 'selected' : '' }}>Available
                                    </option>
                                    <option value="rented"
                                        {{ old('status', $vehicle->status) == 'rented' ? 'selected' : '' }}>Rented
                                    </option>
                                    <option value="maintenance"
                                        {{ old('status', $vehicle->status) == 'maintenance' ? 'selected' : '' }}>
                                        Maintenance</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="image">Vehicle Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($vehicle->image)
                                    <p>Current Image: <img src="{{ asset('images/vehicles/' . $vehicle->image) }}"
                                            alt="Vehicle Image" width="100"></p>
                                @endif
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>
