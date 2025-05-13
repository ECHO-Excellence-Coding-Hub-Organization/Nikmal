<x-app-layout>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Customer</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customers.update', $customer->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Add this line to specify the update method -->

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" value="{{ old('name', $customer->name) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email Customer</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email', $customer->email) }}"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone number" value="{{ old('phone', $customer->phone) }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Alamat Customer</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address">{{ old('address', $customer->address) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="identity_type">Jenis Identitas</label>
                                <select class="form-control" id="identity_type" name="identity_type">
                                    <option value="KTP" {{ $customer->identity_type == 'KTP' ? 'selected' : '' }}>KTP
                                    </option>
                                    <option value="SIM" {{ $customer->identity_type == 'SIM' ? 'selected' : '' }}>SIM
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="identity_number">Nomor Identitas</label>
                                <input type="text" class="form-control" id="identity_number" name="identity_number"
                                    value="{{ old('identity_number', $customer->identity_number) }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="identity_file" class="form-label">Upload File Identitas</label>
                                <input type="file" class="form-control" id="identity_file" name="document">
                                @if ($customer->document)
                                    <!-- Display current document if exists -->
                                    <div class="mt-2">
                                        <label>Current Document:</label>
                                        <a href="{{ asset('documents/' . $customer->document) }}" target="_blank">View
                                            Document</a>
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
