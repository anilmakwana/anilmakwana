<?php

namespace App\Http\Controllers;

use App\Models\Adminlogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminloginController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   public function logout()
    {
        Auth::guard('adminlogin')->logout();
        return redirect()->route('loginform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $res=new Adminlogin;
        $res->name=$input['name'];
        $res->password=Hash::make($input['password']);
        $res->email=$input['email'];
        $res->save();
        return redirect()->route('loginform');
    }
    public function signup()
    {
        return view('login.signup');
    }   
     public function loginform()
    {
        return view('login.login');
    }

     public function login(Request $request)
     {
         if (Auth::guard('adminlogin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route('productList');
        }
        $request->session()->flash('msg','invalid Credinital');
        return back()->withInput($request->only('email', 'remember'));
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adminlogin  $adminlogin
     * @return \Illuminate\Http\Response
     */
    public function show(Adminlogin $adminlogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adminlogin  $adminlogin
     * @return \Illuminate\Http\Response
     */
    public function edit(Adminlogin $adminlogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adminlogin  $adminlogin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adminlogin $adminlogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adminlogin  $adminlogin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adminlogin $adminlogin)
    {
        //
    }
}
