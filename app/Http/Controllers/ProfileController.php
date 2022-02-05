<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile  ;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user() ;
        $id = Auth::id() ;
        if ($user->profile == null)
        {
            $profile = Profile::create([
                'province'=>'ok',
                'user_id'=>$id  ,
                'gender'=>'male',
                'bio'=>'hello',
                'facebook' => 'www.facebook.com'
            ]) ;
        }
        return view('users.profile')->with('user', $user) ;
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
    public function update(Request $request)
    {
        //
            $this->validate($request , [
                'name'=>'required' ,
                'province'=>'required',
                'gender'=>'required',
                'bio'=>'required',
                'facebook' => 'required'
            ]) ;

            $user = Auth::user() ;
            $user->name = $request->name ;
            $user->profile->province = $request->province ;
            $user->profile->gender = $request->gender ;
            $user->profile->bio = $request->bio ;
            $user->profile->facebook = $request->facebook ;

            $user->profile->save() ;

            if($request->has('password'))
            {
                $user->password = bcrypt($request->password) ;

                $user->profile->save() ;
            }
            return redirect()->back() ;
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
