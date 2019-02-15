<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Labo;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
        return view('profiles.profile')->with('user',Auth::user());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view("profiles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
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
        $request->validate([
            'avatar' => '',
            'about'  => 'required|max:255'
        
      ]);
      $user = Auth::user();
     
      if($request->hasFile('avatar')){

        $avatar = $request->file('avatar');
        $image_new_name = time().$avatar->getClientOriginalName();
        $avatar->move('uploads/avatar',$image_new_name);
        $user->profile->avatar = 'uploads/avatar/'.$image_new_name;
       
        $user->profile->save();
      }
      $user->profile->about=$request->about;

      $user->profile->save();
      
      
      
     
      return redirect()->back();

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
