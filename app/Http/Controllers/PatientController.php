<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Http\RedirectResponse;

class PatientController extends Controller
{
   public function register_patient()
   {
        return view('Admin.patient_registration');
   }

   public function store_patient(Request $request): RedirectResponse
   {
        $request->validate([
            'fullname' => 'required',
            'mobno' => 'required|min:10',
            'aadharno' => 'required|min:12',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'test' => 'required',
            'lab' => 'required',
            'doctor' => 'required',
            'date' => 'required',
        ]);
        
        DB::table('patient_details')->insert([
            'patient_name' => $request->input('fullname'),
            'patient_mobile_no' => $request->input('mobno'),
            'patient_aadhar_card_no' => $request->input('aadharno'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'selected_tests' => $request->input('test'),
            'lab_id' => $request->input('lab'),
            'refering_doctor_name' => $request->input('doctor'),
            'date' => $request->input('date'),
            'address' => $request->input('address'),
            'created_by' =>  Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('register_patient')
        ->withSuccess('Great! You have Successfully Register Patient');
   }
}
