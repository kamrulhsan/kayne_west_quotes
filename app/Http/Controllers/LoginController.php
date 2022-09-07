<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function check(Request $request)
    {
        $request->validate([
            'user_login_email' => 'required|exists:users,email',
            'user_login_password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->user_login_email, 'password' => $request->user_login_password])) {
            
                // $request->session()->put('loggeduser', Auth::user()->name);
                // $request->session()->put('loggeduser_id', Auth::user()->id);

                $token = Auth::user()->createToken('Token Name')->accessToken;
            
                return response()->json([
                    'token' => $token,
                    'user' => auth()->user(),
                    'message' => 'Login successful'
                ], 200);
            
        } else {
            return redirect()->back()->with('fail', 'Incorrect Credential');
        }
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate(
            [
                'user_register_name' => 'required',
                'user_register_email' => 'required|unique:users,email',
                'user_register_pass' => 'required|unique:users,email',
                'user_register_confirm_pass' => 'required|min:5|max:30|same:user_register_pass',
            ],
            [
                'user_register_name.required' => 'Please Provide Your Name',
                'user_register_email.required' => 'Please Provide Your Email',
                'user_register_pass.required' => 'Please Provide Password For Security',
                'user_register_confirm_pass.required' => 'Please Provide Password Again',
                'user_register_confirm_pass.same' => 'The Password Confirmation Didnt Match The Given Password',
                'user_register_confirm_pass.min' => 'Password Have to be Minimum 5 Character',
            ]
            
        );
        // dd($request);
        $user = User::create(
            [
                'name' => $request->user_register_name,
                'email' => $request->user_register_email,
                'password' => Hash::make($request->user_register_pass),
            ],
        );

       
        if ($user) {
            return redirect()->back()->with('success', 'Account Created Succesfully');
        } else {
            return redirect()->back()->with('fail', 'Creating Account unsuccessful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
