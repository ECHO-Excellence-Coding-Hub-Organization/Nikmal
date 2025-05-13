<x-app-layout>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <p class="card-title mb-0">Daftar Customer</p>
                            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">
                                <i class="ti-plus"></i>
                                Tambah Customer
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example" class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#NO</th>
                                                <th>Nama</th>
                                                <th>ALamat</th>
                                                <th>No Telepon</th>
                                                <th>Jenis Identitas</th>
                                                <th>File</th>
                                                <th>Nik</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($costemers as $customer)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $customer->name }}</td>
                                                    <td>{{ $customer->address }}</td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>{{ $customer->identity_type }}</td>
                                                    <td>
                                                        @if ($customer->document)
                                                            <a href="{{ asset('documents/' . $customer->document) }}"
                                                                target="_blank">Lihat File</a>
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{ $customer->identity_number }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-sm">View</a>
                                                        <a href="{{ route('customers.edit', $customer->id) }}"
                                                            class="btn btn-success btn-sm">Edit</a>
                                                        <form action="{{ route('customers.destroy', $customer->id) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                                                        </form>

                                                        <a href="{{ route('customers.rentals.create', $customer) }}"
                                                            class="btn btn-info btn-sm">Sewakan Kendaraan</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
