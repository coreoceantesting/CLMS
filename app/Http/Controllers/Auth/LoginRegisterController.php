<?php

namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;
use DB;

class LoginRegisterController extends Controller
{
   /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('Auth.Login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('Auth.register');
    }

    public function user_registration()
    {
        $users = User::where('is_deleted','=','0')->get();
        return view('Masters.Users_registration.user_list',compact('users'));
    }

    public function create_user()
    {
        $lab_list = DB::table('lab_master')->where('is_deleted','0')->orderBy('lab_id','desc')->get();
        return view('Masters.Users_registration.create_user',compact('lab_list'));
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user && !$user->is_deleted && Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("/")->withSuccess('Oppes! You have entered invalid credentials or the account has been deleted.');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request): RedirectResponse
    {  
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'user_type' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        // Auth::login($check);

        return redirect()->route('user_list')
        ->withSuccess('Great! You have Successfully registered');
    }

    public function edit_user(Request $request,$id)
    {
        $user_detail = User::find($id);
        $lab_list = DB::table('lab_master')->where('is_deleted','0')->orderBy('lab_id','desc')->get();
        return view('Masters.Users_registration.edit_user',compact('user_detail','lab_list'));
    }

    public function update_user(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required',
            // 'email' => 'required|email|unique:users',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'user_type' => 'required',
        ]);

        if($request->input('user_type') == 'Superadmin')
        {
            $role = 'Superadmin';
            $lab_id = null;
        }else if($request->input('user_type') == 'Health Center')
        {
            $role = 'HealthCenter';
            $lab_id = null;
        }else{
            $role = 'Lab';
            $lab_id = $request->input('lab_id');
        }

        $user->update([
            'name' =>$request->input('fname') .' '.$request->input('lname'),
            'first_name' => $request->input('fname'),
            'middle_name' => $request->input('mname'),
            'last_name' => $request->input('lname'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'role' => $role,
            'lab_id' => $lab_id,
            'usertype' => $request->input('user_type'),
            'username' => $request->input('username'),
            'password' =>Hash::make($request->input('password')) ,
            'actual_password' => $request->input('password')
        ]);

        return redirect()->route('user_list')
        ->withSuccess('Great! You have Successfully Update');

    }

    public function softDeleteUser($id)
    {
        $user = User::find($id);
        
        if ($user) {
            $user->update(['is_deleted' => 1]);
            return redirect()->route('user_list')
                ->withSuccess('Great! You have Successfully Deleted');
        }

        return redirect()->route('user_list')
        ->withSuccess('User Not Found');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard(): mixed
    {
        if(Auth::check()){
            if(Auth::user()->role == 'Lab'){
                $total_patient = DB::table('patient_details')->where('lab_id',Auth::user()->lab_id)->count();
                $total_pending_patient = DB::table('patient_details')->where('lab_id',Auth::user()->lab_id)->where('status','pending')->count();
                $total_completed_patient = DB::table('patient_details')->where('lab_id',Auth::user()->lab_id)->where('status','completed')->count();
            }else{
                $total_patient = DB::table('patient_details')->count();
                $total_pending_patient = DB::table('patient_details')->where('status','pending')->count();
                $total_completed_patient = DB::table('patient_details')->where('status','completed')->count();      
            }
        
            return view('Admin.dashboard',compact('total_patient','total_pending_patient','total_completed_patient')); // Assuming you have a dashboard view
        }
  
        return redirect("/")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {

        if($data['user_type'] == 'Superadmin')
        {
            $role = 'Superadmin';
        }else if($data['user_type'] == 'Health Center')
        {
            $role = 'HealthCenter';
        }else{
            $role = 'Lab';
        }

      return User::create([
        'name' =>$data['fname'] .' '.$data['lname'],
        'first_name' => $data['fname'],
        'middle_name' => $data['mname'],
        'last_name' => $data['lname'],
        'address' => $data['address'],
        'email' => $data['email'],
        'usertype' => $data['user_type'],
        'role' => $role,
        'lab_id' => $data['lab_id'],
        'username' => $data['username'],
        'password' => Hash::make($data['password']),
        'actual_password' => $data['password']
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
  
        return redirect()->route('login');;
    }
}
