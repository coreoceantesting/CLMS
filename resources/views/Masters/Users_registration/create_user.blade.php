@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Create Users</strong> <a class="btn btn-sm btn-primary" style="float: right" href="{{route('user_list')}}">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="fname" class="form-label">First Name</label>
                        <input
                            type="text"
                            class="form-control @error('fname') is-invalid @enderror"
                            id="fname"
                            placeholder="Enter First Name"
                            name="fname"
                            aria-describedby="fname"
                            required
                        />
                        @error('fname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="mname" class="form-label">Middle Name</label>
                        <input
                            type="text"
                            class="form-control @error('mname') is-invalid @enderror"
                            id="mname"
                            name="mname"
                            placeholder="Enter middle Name"
                            aria-describedby="mname"
                            required
                        />
                        @error('mname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="lname" class="form-label">Last Name</label>
                            <input
                              type="text"
                              class="form-control @error('lname') is-invalid @enderror"
                              id="lname"
                              name="lname"
                              placeholder="Enter Last Name"
                              aria-describedby="lname"
                              required
                            />
                            @error('lname')
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
                        <label for="email" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control @error('email') is-invalid @enderror"
                              id="email"
                              name="email"
                              placeholder="Enter Email"
                              aria-describedby="email"
                              required
                            />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="user_type" class="form-label">User Types</label>
                        <select class="form-select @error('user_type') is-invalid @enderror" id="user_type" name="user_type" aria-label="Default select example" required>
                            <option value="">Select User Types</option>
                            <option value="Superadmin">Superadmin</option>
                            <option value="Health Center">Health Center</option>
                            <option value="Lab">Lab</option>
                        </select>
                        @error('user_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12" id="labDropdownWrapper" style="display: none;">
                        <label for="lab_id" class="form-label">Lab List</label>
                        <select class="form-select @error('lab_id') is-invalid @enderror" id="lab_id" name="lab_id" aria-label="Default select example">
                            <option value="" selected>Select Lab</option>
                            @foreach($lab_list as $list)
                                <option value="{{ $list->lab_id }}">{{ $list->lab_name }}</option>
                            @endforeach
                        </select>
                        @error('lab_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="username" class="form-label">Username</label>
                        <input
                            type="text"
                            class="form-control @error('username') is-invalid @enderror"
                            id="username"
                            name="username"
                            placeholder="Enter Username"
                            aria-describedby="username"
                            required
                        />
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12 form-password-toggle">
                        <label class="form-label" for="basic-default-password32">Password</label>
                        <div class="input-group input-group-merge">
                            <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="basic-default-password32"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password"
                            required
                            />
                            <span class="input-group-text cursor-pointer" id="basic-default-password"
                            ><i class="bx bx-hide"></i
                            ></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 py-2">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var userTypeDropdown = document.getElementById('user_type');
        var labDropdownWrapper = document.getElementById('labDropdownWrapper');

        userTypeDropdown.addEventListener('change', function () {
            if (this.value === 'Lab') {
                labDropdownWrapper.style.display = 'block';
            } else {
                labDropdownWrapper.style.display = 'none';
            }
        });
    });
</script>
@endsection

@push('js')
@endpush