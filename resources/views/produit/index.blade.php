@extends('layouts.master')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Magasin
        
      </h1>
      
</section>
<br>
<div class="container">
<div class="panel panel-default">
          <div class="panel-body">

        <div class="row">
            <a  href="{{route('produit.create')}}" class="btn btn-primary col-sm-offset-10 col-sm-2">Ajouter Un Produit</a>            
        </div>
        <hr>
        
        <div class="row">
          <form class="form-horizontal" role="form" action="{{route('produit.index')}}" method="GET">
        
            <div class="col-sm-6">
                <input type="text" class="form-control" name="search" value="" placeholder="Formule Chimique">
            </div>
       
        
            <div class="col-sm-2">
                <select class="form-control" name="searchCategory" >
                <option ></option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                @endforeach
                </select>
            </div>
       

            <div class="col-sm-2">
                
                <select class="form-control" name="searchProduitName">
                @foreach($all_produits as $all_produit)
                <option value="{{$all_produit->id}}">{{$all_produit->produitName}}</option>
                @endforeach
                    
                </select>
            </div>
        
        
            <div class="col-sm-2">
             
               <button type="submit" class="btn btn-default">Chercher</button>
             
            </div>
        
            </form>
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
                            </td>
                            <td>
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
    
    {{ $produits->appends(request()->query())->links()  }}
</div>
</div>

</div>
@endsection