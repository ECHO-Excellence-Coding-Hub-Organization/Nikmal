<x-app-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="card-title mb-0">Daftar Kendaraan</p>
                            <a href="{{ route('vehicles.create') }}" class="btn btn-primary btn-sm">
                                <i class="ti-plus"></i>
                                Tambah Kendaraan
                            </a>
                        </div>
                        <div class="row">
                            @foreach ($vehicles as $vehicle)
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <img src="{{ asset('images/vehicles/' . $vehicle->image) }}"
                                            class="card-img-top"
                                            alt="{{ $vehicle->name }} vehicle displayed in a clean and professional setting. The vehicle is showcased with a focus on its design and features, conveying a sense of reliability and style.">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $vehicle->name }}</h5>
                                            <p class="card-text">
                                                Harga Sewa: Rp.{{ number_format($vehicle->price_per_day, 0, ',', '.') }}
                                            </p>
                                            <p class="card-text">
                                                Status: {{ $vehicle->status }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('vehicles.show', $vehicle->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    Detail
                                                </a>
                                                <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>
                                                <form action="{{ route('vehicles.destroy', $vehicle->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
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
</x-app-layout>
