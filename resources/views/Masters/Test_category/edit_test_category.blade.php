@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Update Test Category</strong> <a class="btn btn-sm btn-primary" style="float: right" href="{{route('test_category_list')}}">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('update_test_category',$test_category_details->test_category_id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="tname" class="form-label">Test Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="tname"
                            placeholder="Enter Test Name"
                            value="{{$test_category_details->test_category_name}}"
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
                            value="{{$test_category_details->test_category_units}}"
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
                              value="{{$test_category_details->bio_referal_interval}}"
                              placeholder="Enter BIO.REF Interval"
                              aria-describedby="bioreferal"
                              required
                            />
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