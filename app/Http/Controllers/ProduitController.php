<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produit;
use App\Category;
use App\Labo;
use App\Magasin;
use App\Magasin_produit;
use Auth;

class ProduitController extends Controller
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
    public function index(Request $request)
    {
       $laboID = DB::table('labos')->where('user_id',Auth::user()->id)
                                        ->where('hasmagasin',true)->first();;
     // $magasinID= DB::table('magasins')->where('labo_id',$laboID->id)->first();;
     
        if($laboID==null){
            dd(" votre enregistrement n est pas comple ");
        }
        
        
      // $produits=Magasin::where('labo_id',$laboID->id)->first()->produits()->paginate(5);     
       $all_produits=Produit::where('user_id',Auth::user()->id)->get();
       
        $produits=Magasin::where('labo_id',$laboID->id)->first()->produits()
                            ->when($request->searchProduitName,function($query1) use ($request){
                                return $query1->where('produitName','like','%'.$request->searchProduitName. '%' );
                              })
                            ->when($request->searchCategory,function($query2) use ($request){
                                return $query2->where('category_id','like','%'.$request->searchCategory. '%' );
                              })
                            ->when($request->search,function($query3) use ($request){
                                return $query3->where('formuleChimique','like','%'.$request->search. '%' );
                              })->paginate(2); 
        
    // $produits=Magasin::where('labo_id',$laboID->id)->first()->produits();
            

      
       return view("produit.index",['produits' => $produits,'all_produits'=>$all_produits,'categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $produitID = DB::table('produits')->latest()->first();
        
        
        $laboID    = DB::table('labos')->where('user_id',Auth::user()->id)
                                            ->where('hasmagasin',true)->first();
        if($laboID==null){
            dd(" votre enregistrement n est pas comple ");
        }

        $magasinID = DB::table('magasins')->where('labo_id',$laboID->id)->first();

      

        return view("produit.create")
                    ->with('magasinID',$magasinID)
                    ->with('produitID',$produitID)
                    ->with('categories',Category::all());
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
            'produitName' => 'required',
            'formuleChimique' => 'required',
            'unite' => 'required',
            'dateExp' => 'required|date',            
            'quantite' =>'required',
            'user_id' =>'required',
            'category_id'=>'required'
            
            
      ]);
      $produit = new Produit([
        
        'produitName' =>$request->input('produitName'),
        'formuleChimique'=>$request->input('formuleChimique'),
        'unite' =>$request->input('unite'),
        'dateExp' =>$request->input('dateExp'),
        'user_id' =>$request->input('user_id'),
        'category_id' =>$request->input('category_id')
       
      ]);
      
      $produit->save();
    /*
      $produitMagasin = new Magasin_produit([        
        'produit_id'=>$request->input('produitID') ,
        'magasin_id'=>$request->input('magasinID'),
        'quantite'=>$request->input('quantite')             
      ]);
      $produitMagasin->save();
*/
        DB::table('magasin_produit')->insert([        
            'produit_id'=>$request->input('produitID') ,
            'magasin_id'=>$request->input('magasinID'),
            'quantite'=>$request->input('quantite')             
          ]);
     

      return redirect()->route('produit.index')->with('success', 'Stock has been added');
    
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

        $produit=Produit::find($id);

        $laboID = DB::table('labos')->where('user_id',Auth::user()->id)->first();
        $magasinID= DB::table('magasins')->where('labo_id',$laboID->id)->first();;

        
        return view("produit.edit")
                            ->with('produit' , $produit)
                            ->with('magasinID',$magasinID)
                            ->with('categories',Category::all());
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
            'produitName'     => 'required',
            'formuleChimique' => 'required',
            'unite'           => 'required',
            'dateExp'         => 'required',
            'quantite'        => 'required',
            'category_id'     => 'required'
            
      ]);
    
          $produit = Produit::find($id);
          $produit->produitName = $request->input('produitName');
          $produit->formuleChimique = $request->input('formuleChimique');
          $produit->unite = $request->input('unite');
          $produit->dateExp = $request->input('dateExp');
          $produit->category_id = $request->input('category_id');
         
          
          $produit->save();
        
          $produitMagasin = DB::table('magasin_produit')->where([
            ['produit_id', $id],['magasin_id',  $request->input('magasinID')]
        ])->update(['quantite' => $request->input('quantite')]);

    
          return redirect()->route('produit.index')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);
        $produit->delete();

     return redirect()->route('produit.index')->with('success', 'Stock has been deleted Successfully');
      
    }
}
