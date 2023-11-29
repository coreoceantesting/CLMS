@extends('Layouts.master')

@section('content')

    <div class="container py-4">
        <div class="card">
            <div class="card-header">
               <h1 class="text-center"><strong>Patient Details</strong></h1> 
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name:</th>
                            <td>{{$patient_detail->patient_name}}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number:</th>
                            <td>{{$patient_detail->patient_mobile_no}}</td>
                        </tr>
                        <tr>
                            <th>Adharcard No:</th>
                            <td>{{$patient_detail->patient_aadhar_card_no}}</td>
                        </tr>
                        <tr>
                            <th>Age:</th>
                            <td>{{$patient_detail->age}}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{$patient_detail->gender}}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-header">
                <h1 class="text-center"><strong>Sample Details</strong></h1> 
             </div>
             <div class="card-body">
                <form action="{{ route('store_results',$patient_detail->id) }}" method="POST">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>TEST NAME</th>
                                    <th>RESULT</th>
                                    <th>UNITS</th>
                                    <th>BIO.REF INTERVAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                        <td>{{ $test->test_category_name }}</td>
                                        <td>
                                            <input type="hidden" name="results[{{ $loop->index }}][test_id]" value="{{ $test->test_category_id }}">
                                            <input type="text" class="form-control" name="results[{{ $loop->index }}][result]" required>
                                        </td>
                                        <td>{{ $test->test_category_units }}</td>
                                        <td>{{ $test->bio_referal_interval }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
             </div>
        </div>
    </div>

@endsection

@push('js')

@endpush