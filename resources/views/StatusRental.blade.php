<x-app-layout>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>Detail Rental</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Penyewa</th>
                                <td>{{ $rental->customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Mobil</th>
                                <td>{{ $rental->vehicle->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <td>{{ $rental->start_date }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Selesai</th>
                                <td>{{ $rental->end_date }}</td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>{{ $rental->total_price }}</td>
                            </tr>
                        </table>
                    </div>

                    {{-- kembali --}}
                    <div class="card-footer">
                        <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
