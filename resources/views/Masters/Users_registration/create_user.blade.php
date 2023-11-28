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
                            class="form-control"
                            id="fname"
                            placeholder="Enter First Name"
                            name="fname"
                            aria-describedby="fname"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="mname" class="form-label">Middle Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="mname"
                            name="mname"
                            placeholder="Enter middle Name"
                            aria-describedby="mname"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="lname" class="form-label">Last Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="lname"
                              name="lname"
                              placeholder="Enter Last Name"
                              aria-describedby="lname"
                              required
                            />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea 
                        class="form-control" 
                        id="address"
                        name="address"
                        rows="3"
                        required
                        ></textarea>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="email" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Enter Email"
                              aria-describedby="email"
                              required
                            />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="user_type" class="form-label">User Types</label>
                        <select class="form-select" id="user_type" name="user_type" aria-label="Default select example" required>
                            <option selected>Select User Types</option>
                            <option value="Superadmin">Superadmin</option>
                            <option value="Health Center">Health Center</option>
                            <option value="Lab">Lab</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="username" class="form-label">Username</label>
                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            name="username"
                            placeholder="Enter Username"
                            aria-describedby="username"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12 form-password-toggle">
                        <label class="form-label" for="basic-default-password32">Password</label>
                        <div class="input-group input-group-merge">
                            <input
                            type="password"
                            class="form-control"
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



@endsection

@push('js')
@endpush