<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Labo;
use App\User;

class LaboController extends Controller
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
        $labos=Labo::paginate(5);
        return view("admin.labos.index",['labos' => $labos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::where('admin',false)->where('haslabo',false)->get();
        
        return view("admin.labos.create")->with('users',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'laboName' => 'required|max:255|unique:labos',
            'user_id' => 'required'
        
      ]);
      $labo = new Labo([
        
        'laboName' =>$request->input('laboName'),
        'user_id'=>$request->input('user_id')
       
      ]);

      
      $labo->save();

      User::where('id', $request->input('user_id'))          
                    ->update(['haslabo' => true]);


      return redirect()->route("labos.index")->with('success', 'Labo has been added');

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
        $labo=Labo::find($id);
        
        return view("admin.labos.edit")->with('labo' , $labo)
                                       ->with('users',User::all());
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
        $request->validate([
            'laboName' => 'required|max:255|unique:labos',
            'user_id'     => 'required'
            
      ]);
    
          $labo = Labo::find($id);
          $labo->laboName = $request->input('laboName');
          $labo->user_id = $request->input('user_id');
                 
          $labo->save();
  
          return redirect()->route("labos.index")->with('success', 'labo has been updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $labo = Labo::find($id);
        $labo->delete();

        return redirect()->route("labos.index")->with('success', 'Labo has been deleted Successfully');
     
    }
}
