@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Create Test Category</strong> <a class="btn btn-sm btn-primary" style="float: right" href="{{route('test_category_list')}}">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('store_test_category') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="tname" class="form-label">Test Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="tname"
                            placeholder="Enter Test Name"
                            name="tname"
                            aria-describedby="tname"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="units" class="form-label">Units</label>
                        <input
                            type="text"
                            class="form-control"
                            id="units"
                            name="units"
                            placeholder="Enter Units"
                            aria-describedby="units"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="bioreferal" class="form-label">BIO.REF Interval</label>
                            <input
                              type="text"
                              class="form-control"
                              id="bioreferal"
                              name="bioreferal"
                              placeholder="Enter BIO.REF Interval"
                              aria-describedby="bioreferal"
                              required
                            />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="maincategory" class="form-label">Main Category</label>
                        <select class="form-select @error('maincategory') is-invalid @enderror" id="maincategory" name="maincategory" aria-label="Default select example" required>
                            <option selected>Select Main Category</option>
                            @foreach($main_category_list as $list)
                                <option value="{{$list->main_test_categories_id}}">{{$list->main_test_categories_name}}</option>
                            @endforeach
                        </select>
                        @error('maincategory')
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