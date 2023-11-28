@extends('Layouts.master')

@section('content')

<div class="container py-3">
    <div class="card">
        <div class="card-header">
            <strong>Update Lab</strong> <a class="btn btn-sm btn-primary" style="float: right" href="{{route('lab_list')}}">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('update_lab',$lab_detail->lab_id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="labname" class="form-label">Lab Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="labname"
                            placeholder="Enter Lab Name"
                            value="{{$lab_detail->lab_name}}"
                            name="labname"
                            aria-describedby="labname"
                            required
                        />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="units" class="form-label">Initial</label>
                        <input
                            type="text"
                            class="form-control"
                            id="initial"
                            name="initial"
                            value="{{$lab_detail->lab_initial}}"
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