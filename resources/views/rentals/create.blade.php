<x-app-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="card-title mb-0">Daftar Kendaraan yang Tersedia</p>
                            {{-- <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm">
                                <i class="ti-plus"></i>
                                Tambah Kendaraan
                            </a> --}}
                        </div>
                        <div class="row">
                            @foreach ($vehicles as $vehicle)
                                <div class="col-md-4">
                                    <div class="card mb-4 shadow-sm border-0">
                                        <img src="{{ asset('images/vehicles/' . $vehicle->image) }}"
                                            class="card-img-top rounded-top"
                                            alt="{{ $vehicle->name }} vehicle displayed in a clean and professional setting. The vehicle is showcased with a focus on its design and features, conveying a sense of reliability and style.">
                                        <div class="card-body">
                                            <h5 class="card-title text-center font-weight-bold">{{ $vehicle->name }}
                                            </h5>
                                            <p class="card-text text-center text-muted">
                                                Harga Sewa: <span
                                                    class="text-primary">Rp.{{ number_format($vehicle->price_per_day, 0, ',', '.') }}</span>
                                            </p>
                                            <p class="card-text text-center">
                                                <span
                                                    class="badge {{ $vehicle->status === 'Available' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $vehicle->status }}
                                                </span>
                                            </p>
                                            <div class="d-flex justify-content-center mt-3">
                                                <button type="button" class="btn btn-success btn-sm px-4"
                                                    data-toggle="modal" data-target="#rentalModal-{{ $vehicle->id }}">
                                                    <i class="ti-car"></i> Sewakan
                                                </button>
                                            </div>

                                            <!-- Rental Modal -->
                                            <div class="modal fade" id="rentalModal-{{ $vehicle->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="rentalModalLabel-{{ $vehicle->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="rentalModalLabel-{{ $vehicle->id }}">Form Penyewaan
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('customers.vehicles.rentals.store', [$customer, $vehicle]) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <!-- Pickup Type -->
                                                                <div class="form-group">
                                                                    <label for="pickup_type">Pickup Type</label>
                                                                    <select name="pickup_type" id="pickup_type"
                                                                        class="form-control" required>
                                                                        <option value="in-store"
                                                                            {{ old('pickup_type') == 'in-store' ? 'selected' : '' }}>
                                                                            In-store</option>
                                                                        <option value="delivery"
                                                                            {{ old('pickup_type') == 'delivery' ? 'selected' : '' }}>
                                                                            Delivery</option>
                                                                    </select>
                                                                    @error('pickup_type')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>

                                                                <!-- Start Date -->
                                                                <div class="form-group">
                                                                    <label for="start_date">Start Date</label>
                                                                    <input type="date" name="start_date"
                                                                        id="start_date" class="form-control"
                                                                        value="{{ old('start_date') }}" required>
                                                                    @error('start_date')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>

                                                                <!-- End Date -->
                                                                <div class="form-group">
                                                                    <label for="end_date">End Date</label>
                                                                    <input type="date" name="end_date" id="end_date"
                                                                        class="form-control"
                                                                        value="{{ old('end_date') }}" required>
                                                                    @error('end_date')
                                                                        <small
                                                                            class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Sewa</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const vehicleSelect = document.getElementById('vehicle_id');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const totalPriceInput = document.getElementById('total_price');

            function calculateTotalPrice() {
                const pricePerDay = vehicleSelect.options[vehicleSelect.selectedIndex].dataset.price;
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (pricePerDay && startDate && endDate) {
                    const timeDiff = endDate - startDate;
                    const daysDiff = timeDiff / (1000 * 3600 * 24); // Convert ms to days

                    if (daysDiff >= 1) {
                        const totalPrice = daysDiff * pricePerDay;
                        totalPriceInput.value = totalPrice.toFixed(2);
                    }
                }
            }

            startDateInput.addEventListener('change', calculateTotalPrice);
            endDateInput.addEventListener('change', calculateTotalPrice);
            vehicleSelect.addEventListener('change', calculateTotalPrice);
        });
    </script>
</x-app-layout>
