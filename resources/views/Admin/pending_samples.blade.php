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
                <table id="pending_list" class="display dataTable">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient Mobile No</th>
                            <th>Patient Age</th>
                            <th>Patient Gender</th>
                            <th>Refering Doctor Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patient_list as $list)
                        <tr>
                            <td>{{$list->patient_name}}</td>
                            <td>{{$list->patient_mobile_no}}</td>
                            <td>{{$list->age}}</td>
                            <td>{{$list->gender}}</td>
                            <td>{{$list->refering_doctor_name}}</td>
                            <td>
                                <a href="{{route('view',$list->id )}}" class="btn btn-sm btn-info text-white">View</a>
                                <a href="{{route('edit',$list->id )}}" class="btn btn-sm btn-warning text-white">Edit</a>
                                <a href="{{route('edit_report',$list->id )}}" class="btn btn-sm btn-primary text-white">Create report</a>
                            </td>
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