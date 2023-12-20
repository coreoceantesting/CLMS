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
               View Patient Data
            </strong>
        </div>
        <div class="card-body">
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
                        value = "{{$patient_detail->patient_name}}"
                        readonly
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
                        value = "{{$patient_detail->patient_mobile_no}}"
                        aria-describedby="mobno"
                        readonly
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
                        value = "{{$patient_detail->patient_aadhar_card_no}}"
                        aria-describedby="aadharno"
                        readonly
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
                        value = "{{$patient_detail->age}}"
                        readonly
                        aria-describedby="age"
                        required
                    />
                    @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" aria-label="Default select example" disabled required>
                        <option value="">Select Gender</option>
                        <option @if($patient_detail->gender == 'male') selected @endif value="male">Male</option>
                        <option @if($patient_detail->gender == 'female') selected @endif value="female">Female</option>
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
                    readonly
                    >{{$patient_detail->address}}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="test" class="form-label">Select Test</label>
                    <select class="multiple-select @error('test') is-invalid @enderror" id="test" name="test[]" aria-label="Default select example" required multiple disabled>
                        {{-- Loop through main categories --}}
                        @foreach($mainCategories as $mainCategory)
                            <optgroup label="{{ $mainCategory->main_test_categories_name }}">
                                {{-- Loop through subcategories --}}
                                @foreach($subCategories as $subCategory)
                                    {{-- Check if the current subcategory belongs to the current main category --}}
                                    @if($subCategory->main_test_categories_id === $mainCategory->main_test_categories_id)
                                        {{-- Check if the test category ID is in the selected tests array --}}
                                        <option value="{{ $subCategory->test_category_id }}" @if(in_array($subCategory->test_category_id, $selected_tests)) selected @endif>
                                            {{ $subCategory->test_category_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @error('test')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="lab" class="form-label">Lab</label>
                    <select class="form-select @error('lab') is-invalid @enderror" id="lab" name="lab" aria-label="Default select example" required disabled>
                        <option value="">Select Lab</option>
                        @foreach($lab_list as $list)
                            <option @if($patient_detail->lab_id == $list->lab_id) selected @endif value="{{ $list->lab_id }}">{{ $list->lab_name }}</option>
                        @endforeach
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
                        value = "{{$patient_detail->refering_doctor_name}}"
                        aria-describedby="doctor"
                        readonly
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
                        value = "{{$patient_detail->date}}"
                        aria-describedby="date"
                        required
                        readonly
                    />
                    @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-12 py-4">
                    <a href="{{route('patient_pending_list')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
@endpush