<!DOCTYPE html>
<html>
<head>
    <title>Patient Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        .customers td, .customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        
        .customers tr:nth-child(even){background-color: #f2f2f2;}
        
        .customers tr:hover {background-color: #ddd;}
        
        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #9999ff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="card-header">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="https://thanecity.gov.in/tmc/cache/1/Smart%20City/ESERVICES/TMC.jpg" width="100px" alt="Left Logo">
            </div>
            <div class="col-md-4 text-center py-3">
                <h3>THANE MUNICIPAL CORPORATION</h3>
                <small>DEPARTMENT OF PATHOLOGY</small><br>
                <small>C R WADIA DISPENSARY</small><br>
                <small>THANE</small>
            </div>
            {{-- <div class="col-md-4 text-center">
                <img src="https://thanecity.gov.in/tmc/cache/1/Smart%20City/ESERVICES/TMC.jpg" width="50px" alt="Right Logo">
            </div> --}}
        </div>
    </div>
    <br>
    
    <div class="card">
        <div class="card-body">
            <table class="table customers">
                <thead>
                    <tr>
                        <th>Name:</th>
                        <td>{{ $patient_details['patient_info']->patient_name }}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number:</th>
                        <td>{{$patient_details['patient_info']->patient_mobile_no}}</td>
                    </tr>
                    <tr>
                        <th>Adharcard No:</th>
                        <td>{{$patient_details['patient_info']->patient_aadhar_card_no}}</td>
                    </tr>
                    <tr>
                        <th>Age:</th>
                        <td>{{$patient_details['patient_info']->age}}</td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td>{{$patient_details['patient_info']->gender}}</td>
                    </tr>
                    <tr>
                        <th>Refering Doctor Name</th>
                        <td>{{$patient_details['patient_info']->refering_doctor_name}}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card-header text-center">
            <h3>Report</h3>
        </div>
        <div class="card-body">
            <table class="table customers" >
                <thead>
                    <tr>
                        <th>TEST NAME</th>
                        <th>RESULT</th>
                        <th>UNITS</th>
                        <th>BIO.REF INTERVAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patient_details['test_report'] as $test)
                        <tr>
                            <td>{{ $test->test_category_name }}</td>
                            <td>{{ $test->result }}</td>
                            <td>{{ $test->test_category_units }}</td>
                            <td>{{ $test->bio_referal_interval }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>