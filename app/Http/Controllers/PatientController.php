<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use PDF;
use Illuminate\Http\RedirectResponse;

class PatientController extends Controller
{
   public function register_patient()
   {
        $test_list = DB::table('test_category')->where('is_deleted','0')->get();
        return view('Admin.patient_registration',compact('test_list'));
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

        $tests = implode(',', $request->input('test'));
        
        DB::table('patient_details')->insert([
            'patient_name' => $request->input('fullname'),
            'patient_mobile_no' => $request->input('mobno'),
            'patient_aadhar_card_no' => $request->input('aadharno'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'selected_tests' => $tests,
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

  // pending samples
   public function patient_pending_list(Request $request)
   {
        $patient_list = DB::table('patient_details')->where('status','pending')->orderby('id','desc')->get();
        return view('Admin.pending_samples', compact('patient_list'));
   }

    public function edit_report(Request $request,$id)
    {
        $patient_detail = DB::table('patient_details')->where('id',$id)->first();
        $selected_tests = explode(',',$patient_detail->selected_tests);
        $tests = DB::table('test_category')->whereIn('test_category_id',$selected_tests)->get();
        // dd($tests);
        return view('Admin.update_report',compact('patient_detail','tests'));
    }

    public function storeResults(Request $request,$id)
    {
        $patient_details = DB::table('patient_details')->where('id',$id)->first();
        // dd($request->results);
        // Validation
        $request->validate([
            'results.*.test_id' => 'required|exists:test_category,test_category_id',
            'results.*.result' => 'required',
        ]);

        // Store in the database
        foreach ($request->results as $result) {
            DB::table('test_result')->insert([
                'patient_id' => $id,
                'test_id' => $result['test_id'],
                'result' => $result['result'],
                'generated_date' => date('Y-m-d'),
                'created_by' =>  Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        DB::table('patient_details')->where('id',$id)->update([
            'status' => 'completed',
            'updated_by' =>  Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('patient_pending_list')->with('success', 'Test results have been stored successfully!');
    }

    public function patient_completed_list()
    {
        $patient_list = DB::table('patient_details')->where('status','completed')->orderby('id','desc')->get();
        return view('Admin.completed_list', compact('patient_list'));
    }
    
    // generate pdf

    public function generatePDF($userId)
    {
        $patient_details['patient_info'] = DB::table('patient_details')->where('id',$userId)->first();
        $patient_details['test_report'] = DB::table('test_result')
        ->join('test_category', 'test_result.test_id', '=', 'test_category.test_category_id')
        ->select('test_result.*', 'test_category.test_category_name', 'test_category.test_category_units', 'test_category.bio_referal_interval')
        ->where('test_result.patient_id', $userId)
        ->get();
        // dd($patient_details);

        if (!$patient_details['patient_info']) {
            abort(404);
        }

        $pdf = PDF::loadView('Admin.report', ['patient_details' => $patient_details]);

        return $pdf->stream( $patient_details['patient_info']->patient_name.'('.date('Y-m-d').')'.'.pdf');
    }

}
