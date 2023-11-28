@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Create Lab</strong> <a class="btn btn-sm btn-primary" style="float: right" href="{{route('lab_list')}}">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('store_lab') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="labname" class="form-label">Lab Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="labname"
                            placeholder="Enter Lab Name"
                            name="labname"
                            aria-describedby="labname"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="initial" class="form-label">Initial</label>
                        <input
                            type="text"
                            class="form-control"
                            id="initial"
                            name="initial"
                            placeholder="Enter Initial"
                            aria-describedby="initial"
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