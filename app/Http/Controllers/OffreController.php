<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Offre;
use App\Produit;
use App\Magasin;
use App\ResponseEchange;
use App\ResponseDon;
use Auth;
class OffreController extends Controller
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
        $all_produits = Produit::where('id','>',1)->where('user_id','!=',Auth::user()->id)->get();
        $offres=Offre::where('user_id','!=',Auth::user()->id)->where('confirm',false)->when($request->searchProduitName,function($query1) use ($request){
                                return $query1->where('produit_id','like','%'.$request->searchProduitName. '%' );
                              })
                            ->when($request->searchTypeOffre,function($query2) use ($request){
                                return $query2->where('typeOffre','like','%'.$request->searchTypeOffre. '%' );
                              })
                            ->when($request->searchTypeEnonce,function($query3) use ($request){
                                return $query3->where('typeEnonce','like','%'.$request->searchTypeEnonce. '%' );
                              })->paginate(8);

        return view("offre.index",['offres' => $offres,'all_produits'=>$all_produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laboID    = DB::table('labos')->where('user_id',Auth::user()->id)
                                                    ->where('hasmagasin',true)->first();
        if($laboID==null){
            dd(" votre enregistrement n est pas comple");
        }
        $magasinID = DB::table('magasins') ->where('labo_id',$laboID->id)->first();

        // pour selectionner les produits de l utilisateur
       // $laboID = DB::table('labos')->where('user_id',Auth::user()->id)->first();;     
       //$produits=Magasin::where('labo_id',$laboID->id)->first()->produits; 
       $produits=Produit::where('user_id',Auth::user()->id)->get();

        return view("offre.create")
                                   ->with('magasinID',$magasinID)
                                   ->with('produits',$produits);
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
                'quantite'        => 'required',
                'typeOffre'       => 'required',
                'typeEnonce'      => 'required',
                'image'           => 'required',
                'description'     => 'required',
                'user_id'         => 'required',
                'produit_id'      => 'required'
               
          ]);

          $image = $request->file('image');
          $image_new_name = time().$image->getClientOriginalName();
          $image->move('uploads/offres',$image_new_name);

          $offre = new Offre([
            
            'quantite'    =>$request->input('quantite'),
            'typeOffre'   =>$request->input('typeOffre'),
            'typeEnonce'  =>$request->input('typeEnonce'),
            'image'       =>'uploads/offres/'.$image_new_name,
            'description' =>$request->input('description'),
            'user_id'     =>$request->input('user_id'),
            'produit_id'  =>$request->input('produit_id')

          ]);
          $offre->save();


           $produitMagasin =  DB::update('update  magasin_produit set quantite = quantite-? where produit_id=? and magasin_id=? ', 
             [$request->input('quantite'),$request->input('produit_id'),$request->input('magasinID')] );

          return redirect()->route('offre.index')->with('success', 'Stock has been added');
        


           

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offre=Offre::find($id);
        
        // pour selectionner les produits de l utilisateur
        $laboID = DB::table('labos')->where('user_id',Auth::user()->id)->first();;     
       $produits=Magasin::where('labo_id',$laboID->id)->first()->produits;

        return view("offre.edit")
                                ->with('offre',$offre)
                                ->with('produits',$produits);
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
            'quantite'        => 'required',
            'typeOffre'       => 'required',
            'typeEnonce'      => 'required',
            'image'           => 'required|image',
            'description'     => 'required',
            'user_id'         => 'required',
            'produit_id'      => 'required'
           
      ]);
          
            $image = $request->file('image');
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/offres',$image_new_name);      

          $offre = Offre::find($id);
          $offre->quantite = $request->input('quantite');
          $offre->typeOffre = $request->input('typeOffre');
          $offre->typeEnonce = $request->input('typeEnonce');
          $offre->image = 'uploads/offres/'.$image_new_name;
          $offre->description = $request->input('description');
          $offre->user_id = $request->input('user_id');
          $offre->produit_id = $request->input('produit_id');
          
    
          $offre->save();
    
           return  redirect()->route('offre.index')->with('success', 'Stock has been updated');
  
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offre = Offre::find($id);
        $offre->delete();

      redirect()->route('offre.index')->with('success', 'Stock has been deleted Successfully');
      
    }


    /**
     * Display the specified resource by publisher.
     *
     * @param  int  $publisher_id
     * @return \Illuminate\Http\Response
     */
    public function showoffre(Request $request,$userid)
    {
         // $offrespulisher = DB::select('select * from offres where user_id = ?', [$userid]);
         //$offrespulisher = Offre::where('user_id',$userid)->paginate(5); 
         $produits = Produit::where('user_id',Auth::user()->id)->get();

         $offrespulisher = Offre::where('user_id',$userid)->where('confirm',false)->when($request->searchProduitName,function($query1) use ($request){
            return $query1->where('produit_id','like','%'.$request->searchProduitName. '%' );
          })
        ->when($request->searchTypeOffre,function($query2) use ($request){
            return $query2->where('typeOffre','like','%'.$request->searchTypeOffre. '%' );
          })
        ->when($request->searchTypeEnonce,function($query3) use ($request){
            return $query3->where('typeEnonce','like','%'.$request->searchTypeEnonce. '%' );
          })->paginate(2);
         
         
       // $offrespulisher=Offre::find($userid);
        return view ("offre.showoffre", ['offrespulisher' => $offrespulisher,'produits'=>$produits]);
    }
    public function showoffredetails($offreid)
    {
         $offre = Offre::find($offreid); 
     
        return view ("offre.showoffredetails")->with('offre',$offre);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reponse($id)
    {
            // pour selectionner les produits de l utilisateur
               // $laboID = DB::table('labos')->where('user_id',Auth::user()->id)->first();;     
                //$produits=Magasin::where('labo_id',$laboID->id)->first()->produits;
                $produits=Produit::where('user_id',Auth::user()->id)->get();

        $offre=Offre::find($id);
        if($offre->typeEnonce == "Don"){

            return view ("offre.don")->with('offre',$offre);
        }else{
            return view ("offre.echange")->with('offre',$offre)->with('produits',$produits);
        }
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function echangestore(Request $request)
    {

        $request->validate([
            'produitEchangeID'=> 'required',
            'quantite'        => 'required',
            'description'     => 'required',
            'user_id'         => 'required',
            'offre_id'        => 'required'
           
      ]);
    
      DB::table('response_echanges')->insert([        
        'produitEchangeID'=>$request->input('produitEchangeID') ,
        'quantite'=>$request->input('quantite'),
        'description'=>$request->input('description'),
        'user_id'=>$request->input('user_id'),
        'offre_id'=>$request->input('offre_id')             
      ]);
    
         
        return redirect()->route('offre.index')->with('success', 'Reponse has been added');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donstore(Request $request)
    {
        $request->validate([           
            'description'      => 'required',
            'user_id'           => 'required',
            'offre_id'           => 'required'
           
      ]);
    
      DB::table('response_dons')->insert([        
        'description'=>$request->input('description'),
        'user_id'=>$request->input('user_id'),
        'offre_id'=>$request->input('offre_id')             
      ]);
         
        return redirect()->route('offre.index')->with('success', 'Reponse has been added');
    }

    
    public function confirmresponsedon($respid)
    {

        $resp = ResponseDon::find($respid);

        $offre_id = $resp->offre_id;
        $user_id_resp = $resp->user_id;
        //
        $laboIDresp    = DB::table('labos')->where('user_id',$user_id_resp)->first();
        $magasinIDresp = DB::table('magasins')->where('labo_id',$laboIDresp->id)->first()->id;

        

        $offre = Offre::find($resp->offre_id);
        $produit_id_offre = $offre->produit_id;
        $user_id_offre = $offre->user_id;
        $quantite_offre = $offre->quantite;
        //
        $laboIDoffre    = DB::table('labos')->where('user_id',$user_id_offre)->first();
        $magasinIDoffre = DB::table('magasins')->where('labo_id',$laboIDoffre->id)->first()->id;

        Offre::where('id', $offre_id)          
                    ->update(['confirm' => true]);
        // 
        DB::table('magasin_produit')->insert([        
            'produit_id'=>$produit_id_offre ,
            'magasin_id'=>$magasinIDresp,
            'quantite'=>$quantite_offre            
          ]);
        //
        DB::update('update  magasin_produit set quantite = quantite-? where produit_id=? and magasin_id=? ', 
             [$quantite_offre,$produit_id_offre,$magasinIDoffre] );

        //dd($magasinIDresp);
       
      
    }
    public function confirmresponseechange($respid)
    {
        $resp = ResponseEchange::find($respid);
        
        $offre_id = $resp->offre_id;
        $produit_id_echange = $resp->produitEchangeID;
        $quantite_resp = $resp->quantite;
        $laboIDresp    = DB::table('labos')->where('user_id',$resp->user_id)->first();
        $magasinIDresp = DB::table('magasins')->where('labo_id',$laboIDresp->id)->first()->id;


        $offre = Offre::find($resp->offre_id);
        $produit_id_offre = $offre->produit_id;
        $quantite_offre = $offre->quantite;
        $laboIDoffre    = DB::table('labos')->where('user_id',$offre->user_id)->first();
        $magasinIDoffre = DB::table('magasins')->where('labo_id',$laboIDoffre->id)->first()->id;
       
        //
        Offre::where('id', $offre_id)          
                    ->update(['confirm' => true]);
        //
        DB::table('magasin_produit')->insert([        
            'produit_id'=>$produit_id_offre ,
            'magasin_id'=>$magasinIDresp,
            'quantite'=>$quantite_offre            
          ]);

        DB::update('update  magasin_produit set quantite = quantite-? where produit_id=? and magasin_id=? ', 
             [$quantite_offre,$produit_id_offre,$magasinIDoffre] );

        //
        DB::table('magasin_produit')->insert([        
            'produit_id'=>$produit_id_echange ,
            'magasin_id'=>$magasinIDoffre,
            'quantite'=>$quantite_resp            
          ]);

        DB::update('update  magasin_produit set quantite = quantite-? where produit_id=? and magasin_id=? ', 
             [$quantite_resp,$produit_id_echange,$magasinIDresp] );

       // dd($magasinIDresp);
        
    }


    
}
