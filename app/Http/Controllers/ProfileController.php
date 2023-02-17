<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::get();
        $departments = Department::get();
        return view('profile.show' , compact('users','departments')); 
    }

    public function empSettingShow()
    {
        //
        $users = User::where('user_id', Auth::id());
        $departments = Department::get();
        return view('empSetting.show' , compact('users' , 'departments')); 
    }

    public function mngSettingShow()
    {
        //
        $users = User::where('user_id', Auth::id());
        $departments = Department::get();
        return view('mngSetting.show' , compact('users' , 'departments')); 
    }

    public function spoSettingShow()
    {
        //
        $users = User::where('user_id', Auth::id());
        $departments = Department::get();
        return view('spoSetting.show' , compact('users' , 'departments')); 
    }

    public function dirSettingShow()
    {
        //
        $users = User::where('user_id', Auth::id());
        $departments = Department::get();
        return view('dirSetting.show' , compact('users' , 'departments')); 
    }

    public function SettingShow()
    {
        //
        $users = User::where('user_id', Auth::id());
        $departments = Department::get();
        return view('Setting.show' , compact('users' , 'departments')); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
