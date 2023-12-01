@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Update Users <a class="btn btn-sm btn-primary" style="float: right" href="{{route('user_list')}}">Back</a></strong>
        </div>
        <div class="card-body">
            <form action="{{ route('update_user', $user_detail->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="fname" class="form-label">First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="fname"
                            value="{{$user_detail->first_name}}"
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
                            value="{{$user_detail->middle_name}}"
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
                              value="{{$user_detail->last_name}}"
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
                        >{{$user_detail->address}}</textarea>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="email" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control"
                              id="email"
                              name="email"
                              value="{{ $user_detail->email }}"
                              placeholder="Enter Email"
                              aria-describedby="email"
                              required
                            />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="user_type" class="form-label">User Types</label>
                        <select class="form-select" id="user_type" name="user_type" aria-label="Default select example" required>
                            <option value="">Select User Types</option>
                            <option @if($user_detail->usertype == 'Superadmin') selected @endif value="Superadmin">Superadmin</option>
                            <option @if($user_detail->usertype == 'Health Center') selected @endif value="Health Center">Health Center</option>
                            <option @if($user_detail->usertype == 'Lab') selected @endif value="Lab">Lab</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12" id="labDropdownWrapper" @if($user_detail->usertype == 'Lab') style="display: block;" @else style="display: none;" @endif>
                        <label for="lab_id" class="form-label">Lab List</label>
                        <select class="form-select" id="lab_id" name="lab_id" aria-label="Default select example">
                            <option value="" selected>Select Lab</option>
                            @foreach($lab_list as $list)
                                <option @if($user_detail->lab_id == $list->lab_id) selected @endif value="{{ $list->lab_id }}">{{ $list->lab_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="username" class="form-label">Username</label>
                        <input
                            type="text"
                            class="form-control"
                            id="username"
                            name="username"
                            value="{{$user_detail->username}}"
                            placeholder="Enter Username"
                            aria-describedby="username"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12 form-password-toggle" style="display: none">
                        <label class="form-label" for="basic-default-password32">Password</label>
                        <div class="input-group input-group-merge">
                            <input
                            type="password"
                            class="form-control"
                            id="basic-default-password32"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="basic-default-password"
                            />
                            <span class="input-group-text cursor-pointer" id="basic-default-password"
                            ><i class="bx bx-hide"></i
                            ></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 py-4">
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