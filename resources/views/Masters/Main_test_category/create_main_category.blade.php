@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Create Main Test Category</strong> <a class="btn btn-sm btn-primary" style="float: right" href="{{route('main_test_category_list')}}">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('store_main_test_category') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="name" class="form-label">Main Category Name</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Enter Main Category Name"
                            name="name"
                            aria-describedby="name"
                            required
                        />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="initial" class="form-label">Initial</label>
                        <input
                            type="text"
                            class="form-control @error('initial') is-invalid @enderror"
                            id="initial"
                            name="initial"
                            placeholder="Enter Initial"
                            aria-describedby="initial"
                            required
                        />
                        @error('initial')
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