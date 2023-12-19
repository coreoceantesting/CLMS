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

        .logo {
            max-width: 100px; /* Adjust as needed */
        }

        .title {
            text-align: center;
        }
        .container {
            width: 100%;
        }
    </style>
</head>
<body>
    <table class="container">
        <tr>
            <!-- Left Logo -->
            <td style="text-align: left;">
                <img class="logo" src="{{ public_path('/assets/img/avatars/TMC.jpg') }}" alt="Left Logo">
            </td>

            <!-- Center Title -->
            <td class="title">
                <h3>THANE MUNICIPAL CORPORATION</h3>
                <small>DEPARTMENT OF PATHOLOGY</small><br>
                <small>C R WADIA DISPENSARY</small><br>
                <small>THANE</small>
            </td>

            <!-- Right Logo -->
            <td style="text-align: right;">
                <img class="logo" src="{{ public_path('/assets/img/avatars/TMC.jpg') }}" alt="Right Logo">
            </td>
        </tr>
    </table>

    <br>
    
    <div class="card">
        <div class="card-body">
        <table class="table customers">
            <tbody>
                <tr>
                    <th>Name:</th>
                    <td>{{ $patient_details['patient_info']->patient_name }}</td>
                    <th>Mobile Number:</th>
                    <td>{{ $patient_details['patient_info']->patient_mobile_no }}</td>
                </tr>
                <tr>
                    <th>Adharcard No:</th>
                    <td>{{ $patient_details['patient_info']->patient_aadhar_card_no }}</td>
                    <th>Age:</th>
                    <td>{{ $patient_details['patient_info']->age }}</td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td>{{ $patient_details['patient_info']->gender }}</td>
                    <th>Referring Doctor Name:</th>
                    <td>{{ $patient_details['patient_info']->refering_doctor_name }}</td>
                </tr>
            </tbody>
        </table>

        </div>
        <div class="card-header text-center">
            <h3>Report</h3>
        </div>
        <div class="card-body">
            @foreach ($organizedTests as $mainCategory => $subTests)
                <h3 style="text-align: center; padding-top: 15px; text-decoration: underline;">{{ $mainCategory }}</h3>
                <table class="table customers">
                    <thead>
                        <tr>
                            <th>TEST NAME</th>
                            <th>RESULT</th>
                            <th>UNITS</th>
                            <th>BIO.REF INTERVAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subTests as $test)
                            <tr>
                                <td>{{ $test->test_category_name }}</td>
                                <td>{{ $test->result }}</td>
                                <td>{{ $test->test_category_units }}</td>
                                <td>{{ $test->bio_referal_interval }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>