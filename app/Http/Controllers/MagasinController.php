<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Magasin;
use App\Labo;

class MagasinController extends Controller
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
        $magasins=Magasin::paginate(5);
        return view("admin.magasins.index",['magasins' => $magasins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labo = Labo::where('hasmagasin',false)->get();
        return view("admin.magasins.create")->with('labos',$labo);
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
            'magasinName' => 'required|max:255|unique:magasins',
            'labo_id' => 'required'
        
      ]);
      $magasin = new Magasin([
        
        'magasinName' =>$request->input('magasinName'),
        'labo_id'=>$request->input('labo_id')
       
      ]);
      
      $magasin->save();

      Labo::where('id', $request->input('labo_id'))          
                         ->update(['hasmagasin' => true]);

     return redirect()->route('magasins.index')->with('success', 'Magasin has been added Successfully');
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
        $magasin=Magasin::find($id);
        
        return view("admin.magasins.edit")->with('magasin' , $magasin)
                                          ->with('labos',Labo::all());
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
            'magasinName' => 'required|max:255|unique:magasins',
            'labo_id'     => 'required'
            
      ]);
    
          $magasin = Magasin::find($id);
          $magasin->magasinName = $request->input('magasinName');
          $magasin->labo_id = $request->input('labo_id');
                 
          $magasin->save();
         
         return  redirect()->route('magasins.index')->with('success', 'Magasin has been updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magasin = Magasin::find($id);
        $magasin->delete();

      redirect('/magasins')->with('success', 'Magasin has been deleted Successfully');
     
    }
}
