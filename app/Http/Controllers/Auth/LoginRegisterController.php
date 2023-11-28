<?php

namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Http\RedirectResponse;

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
        return view('Masters.Users_registration.create_user');
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
        return view('Masters.Users_registration.edit_user',compact('user_detail'));
    }

    public function update_user(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|min:6',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'user_type' => 'required',
        ]);

        $user->update([
            'name' =>$request->input('fname') .' '.$request->input('lname'),
            'first_name' => $request->input('fname'),
            'middle_name' => $request->input('mname'),
            'last_name' => $request->input('lname'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'usertype' => $request->input('user_type'),
            'username' => $request->input('username')
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
            return view('Admin.dashboard'); // Assuming you have a dashboard view
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
      return User::create([
        'name' =>$data['fname'] .' '.$data['lname'],
        'first_name' => $data['fname'],
        'middle_name' => $data['mname'],
        'last_name' => $data['lname'],
        'address' => $data['address'],
        'email' => $data['email'],
        'usertype' => $data['user_type'],
        'username' => $data['username'],
        'password' => Hash::make($data['password'])
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
