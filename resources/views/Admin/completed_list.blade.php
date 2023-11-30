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
            <strong>Patient List</strong>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="completed_list" class="display dataTable">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient Mobile No</th>
                            <th>Refering Doctor Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient_list as $list)
                        <tr>
                            <td>{{$list->patient_name}}</td>
                            <td>{{$list->patient_mobile_no}}</td>
                            <td>{{$list->refering_doctor_name}}</td>
                            <td><a href="{{ route('generate.pdf', ['userId' => $list->id]) }}" target="_blank" class="btn btn-sm btn-primary text-white">View Report</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')

@endpush