@extends('layouts.master')

@section('content')
<div class="container">


        <div class="row">
            <a  href="{{route('produit.create')}}" class="btn btn-primary col-sm-offset-10 col-sm-2">Ajouter Un Produit</a>            
        </div>
        <hr>
        
        <div class="row">
        
            <div class="col-sm-6">
                <input type="text" class="form-control" id="quantite" placeholder="ref ,Nom...">
            </div>
       
        
            <div class="col-sm-2">
                <select class="form-control" >
                    <option>1</option>
                    <option>2</option>
                    
                </select>
            </div>
       

            <div class="col-sm-2">
                
                <select class="form-control" id="refProduit">
                    <option>Type Enoncer</option>
                    <option>2</option>
                    
                </select>
            </div>
        
        
            <div class="col-sm-2">
               <button class="btn btn-default">Chercher</button>
            </div>
        

        </div>
        <hr>
        <br>
    
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tr>  
                        <td> Reference</td>
                        <td>Designation</td>
                        <td>Formule Chimique</td>
                        <td>Quantite</td>
                        <td>Unite</td>
                        <td>Category</td>

                        <td>Action</td>
                  </tr>
                  @foreach($produits as $produit)
                        <tr>
                            <td>{{$produit->id}}</td>
                            <td>{{$produit->produitName}}</td>
                            <td>{{$produit->formuleChimique}}</td>
                            <td>{{$produit->pivot->quantite}}</td>
                            <td>{{$produit->unite}}</td>
                            <td>{{$produit->category->categoryName}}</td>
                            
                            <td>
                                <a href="{{route('produit.edit',$produit->id)}}">Edit</a>
                               
                                <form action="{{route('produit.destroy',$produit->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                  @endforeach
                </table>
            </div> 
            
                
            
            
                    
                   
            
            
            

        </div>
    
    {{ $produits->links() }}


</div>
@endsection