<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
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
       // $users=User::where('user_id','!=',Auth::user()->id)->get(); 
        $users=User::where("admin",false)->paginate(5);
        return view("admin.users.index",['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
       /*  $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        
      ]);
      $user = new User([
        
        'name' =>$request->input('name'),
        'email'=>$request->input('email')
       
      ]);
      
      $user->save(); */
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
        $user=User::find($id);
        
        return view("admin.users.edit")->with('user' , $user);
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
        
    
          $user = User::find($id);
          $user->aproved = true;
          
                 
          $user->save();
                   
           redirect('/users')->with('success', 'Utilisateur has been Aproved');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $user = User::find($id);
        $user->delete();

      redirect('/users')->with('success', 'Utilisateur has been deleted Successfully');
      
    }
}
