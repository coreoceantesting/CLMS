@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header">
            <strong>
                Patient Registration
            </strong>
        </div>
        <div class="card-body">
            <form action="{{ route('store_patient') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="fullname" class="form-label">Patient Full Name</label>
                        <input
                            type="text"
                            class="form-control @error('fullname') is-invalid @enderror"
                            id="fullname"
                            placeholder="Enter Patient Full Name"
                            name="fullname"
                            aria-describedby="fullname"
                            required
                        />
                        @error('fullname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="mobno" class="form-label">Mobile Number</label>
                        <input
                            type="number"
                            class="form-control @error('mobno') is-invalid @enderror"
                            id="mobno"
                            placeholder="Enter Mobile Number"
                            name="mobno"
                            aria-describedby="mobno"
                            required
                        />
                        @error('mobno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="aadharno" class="form-label">Aadhar Card Number</label>
                        <input
                            type="number"
                            class="form-control @error('aadharno') is-invalid @enderror"
                            id="aadharno"
                            placeholder="Enter Aadhar Card Number"
                            name="aadharno"
                            aria-describedby="aadharno"
                            required
                        />
                        @error('aadharno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="age" class="form-label">Age</label>
                        <input
                            type="number"
                            class="form-control @error('age') is-invalid @enderror"
                            id="age"
                            placeholder="Enter Age"
                            name="age"
                            aria-describedby="age"
                            required
                        />
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" aria-label="Default select example" required>
                            <option selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea 
                        class="form-control @error('address') is-invalid @enderror" 
                        id="address"
                        name="address"
                        rows="3"
                        required
                        ></textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="test" class="form-label">Select Test</label>
                        <select class="form-select @error('test') is-invalid @enderror" id="test" name="test" aria-label="Default select example" required>
                            <option selected>Select test</option>
                            <option value="1">Test 1</option>
                            <option value="2">Test 2</option>
                        </select>
                        @error('test')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="lab" class="form-label">Lab</label>
                        <select class="form-select @error('lab') is-invalid @enderror" id="lab" name="lab" aria-label="Default select example" required>
                            <option selected>Select Lab</option>
                            <option value="1">Lab 1</option>
                            <option value="2">Lab 2</option>
                        </select>
                        @error('lab')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="doctor" class="form-label">Refering Doctor Name</label>
                        <input
                            type="text"
                            class="form-control @error('doctor') is-invalid @enderror"
                            id="doctor"
                            placeholder="Enter Doctor Name"
                            name="doctor"
                            aria-describedby="doctor"
                            required
                        />
                        @error('doctor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="date" class="form-label">Date</label>
                        <input
                            type="date"
                            class="form-control @error('date') is-invalid @enderror"
                            id="date"
                            name="date"
                            aria-describedby="date"
                            required
                        />
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12 py-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush