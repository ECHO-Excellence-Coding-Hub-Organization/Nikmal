<x-app-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0">Daftar Penyewa</h5>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Penyewa</th>
                                            <th>Biaya Sewa</th>
                                            <th>Nomor kendaraan</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rentals as $rental)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rental->vehicle->name }}</td>
                                                <td>Rp.{{ number_format($rental->total_price, 0, ',', '.') }}</td>
                                                <td>{{ $rental->vehicle->plate_number }}</td>
                                                {{-- <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('rentals.show', $rental->id) }}" class="btn btn-info btn-sm me-2">
                                                            Detail
                                                        </a>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data penyewa.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
