@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Update Main Category</strong> <a class="btn btn-sm btn-primary" style="float: right" href="{{route('main_test_category_list')}}">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('update_main_test_category',$category_detail->main_test_categories_id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="name" class="form-label">Main Category Name</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            placeholder="Enter Main Category"
                            value="{{$category_detail->main_test_categories_name}}"
                            name="name"
                            aria-describedby="name"
                            required
                        />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="units" class="form-label">Initial</label>
                        <input
                            type="text"
                            class="form-control @error('initial') is-invalid @enderror"
                            id="initial"
                            name="initial"
                            value="{{$category_detail->main_test_categories_initial}}"
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